<?php

namespace App\Controllers\Ajax;

use App\Controllers\Ajax\BaseController;
use App\Models\Eventos as ModelEventos;

class Eventos extends BaseController
{

    public function crear()
    {
        $this->validation->setRules([
            'nombre'       => 'required',
            'hora_entrada' => 'required',
            'hora_salida'  => 'required'
        ]);

        //$this->agregarError($this->validation->getErrors());//para obtener los errores

        if (!$this->validation->run($this->request->getJson(true))) {
            $this->agregarError($this->validation->getErrors());
        } else {
            if (!$this->existeErrores()) {
                $horarios = new ModelEventos();
                $horarios->save([
                    "nombre"       => $this->request->getVar("nombre"),
                    "hora_entrada" => $this->request->getVar("hora_entrada"),
                    "hora_salida"  => $this->request->getVar("hora_salida")
                ]);
                $this->respSinError();
            }
        }

        return $this->sendResponse();
    }

}
