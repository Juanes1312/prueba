<?php

namespace App\Controllers\Ajax;

use App\Controllers\Ajax\BaseController;
use App\Models\Horarios as ModelHorarios;

class Horarios extends BaseController
{

    // para crear nuevo cliente
    public function crear()
    {
        $this->validation->setRules([
            'dia'       => 'required',
            'hora_entrada' => 'required',
            'hora_salida'  => 'required'
        ]);

        if (!$this->validation->run($this->request->getJson(true))) {
            $this->agregarError($this->validation->getErrors());
        } else {
            if (!$this->existeErrores()) {
                $Horarios = new ModelHorarios();
                $datos = [
                    "dia"       => $this->request->getVar("dia"),
                    "hora_entrada" => $this->request->getVar("hora_entrada"),
                    "hora_salida"  => $this->request->getVar("hora_salida")
                ];

                $respuesta = $Horarios->crear($datos);
                if ($respuesta == true) {
                    $this->respSinError();
                }
            }
        }

        return $this->sendResponse();
    }
}
