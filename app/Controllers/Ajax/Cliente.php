<?php

namespace App\Controllers\Ajax;

use App\Controllers\Ajax\BaseController;
use App\Models\Cliente as ModelCliente;

class Cliente extends BaseController
{

    public function crear()
    {
        $this->validation->setRules([
            'documento' => 'required',
            'email'     => 'required|valid_email',
            'nombre'    => 'required'
        ]);
        $this->validation->run($this->request->getJson(true));

        if (!$this->existeErrores()) {
            $cliente = new ModelCliente();
            $cliente->save([
                "documento" => $this->request->getVar("documento"),
                "email"     => $this->request->getVar("email"),
                "nombre"    => $this->request->getVar("nombre")
            ]);
            $this->respSinError();
        }

        return $this->sendResponse();
    }

    public function actualizar()
    {
        helper(['form', 'url']);

        $input = $this->validate([
            'nombre' => 'required',
            'email'  => 'required|valid_email',
        ]);
        $id_usuario = $this->request->getVar("id");
        $formModel = new Usuario();

        if (!$input) {
            $this->respuesta["mensaje"] = "datos invalidos";
            return $this->respond($this->respuesta);
        } else {
            $formModel->actualizar([
                "nombre" => $this->request->getVar("nombre"),
                "email"  => $this->request->getVar("email"),
                "rol"    => $this->request->getVar("rol"),
                    ], $id_usuario
            );
            $this->respuesta["error"] = 0;
            return $this->respond($this->respuesta);
        }
    }

    public function eliminar()
    {
        // $mensaje = session('mensaje');
        $id_usuario = $this->request->getVar('id');

        $formModel = new Usuario();
        $data = ["id_usuario" => $id_usuario];

        $respuesta = $formModel->eliminar($data);

        if ($respuesta == 0) {
            // return redirect()->with('mensaje','1');
            $this->respuesta["mensaje"][] = "Ready";
        }
    }

}
