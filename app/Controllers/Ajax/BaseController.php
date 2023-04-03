<?php

namespace App\Controllers\Ajax;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class BaseController extends ResourceController
{

    use ResponseTrait;

    public $respuesta = ['error' => 1, 'mensaje' => [], 'data' => []];
    public $validation;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function respSinError()
    {
        $this->respuesta["error"] = 0;
    }

    //registra un nuevo mensaje de error.
    public function agregarError($mensaje)
    {
        $this->respuesta["mensaje"][] = $mensaje;
    }

    //verifica si hay mensajes de error
    public function existeErrores()
    {
        if (empty($this->respuesta["mensaje"])) {
            return false;
        } else {
            return true;
        }
    }

    public function sendResponse($rcodigo = null)
    {
        return $this->respond($this->respuesta, $rcodigo);
    }

}
