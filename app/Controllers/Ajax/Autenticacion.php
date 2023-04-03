<?php

namespace App\Controllers\Ajax;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Usuario;
use App\Models\Horarios as ModelHorarios;
use App\Models\Eventos as ModelEventos;

class Autenticacion extends ResourceController
{

    use ResponseTrait;

    public $respuesta = ['error' => 1, 'mensaje' => [], 'data' => []];

    public function autenticar()
    {
        $Horarios = new ModelHorarios();
        $datosHorarios = $Horarios->getHorarios();

        $eventos = new ModelEventos();
        $email = $this->request->getJsonVar('email');
        $clave = $this->request->getJsonVar('clave');

        helper('apirequest_helper');

        $DataUsuario = ApiRequest("api/autenticacion/autentica", array("usuario" => $email, "clave" => $clave, "ip_actual" => GetRealIP(), "acceso" => 0));

        if ($DataUsuario["error"] == 1) {
            $this->respuesta["mensaje"][] = "usuario o clave incorrecta";
        } else {
            foreach ($datosHorarios as $key => $value) {
                if ($value["dia"] == date('N')) {
                    if (!(strtotime($value["hora_entrada"]) <= strtotime(date("H:i:00",time())) && strtotime($value["hora_salida"]) <= strtotime(date("H:i:00",time())))) {
                        $datos = [
                            "usuario"      => $DataUsuario["data"]["usuario"],
                            "ip" => GetRealIP(),
                            "fecha"  => date('Y-m-d H:i:s'),
                            "evento"  => 'Acceso en horario posterior al permitido'
                        ];
                        $eventos->crear($datos);
                    }
                }
            }
            $this->respuesta["error"] = 0;
            $ses_data = [
                'nombre'     => $DataUsuario["data"]["usuario"],
                'email'      => $DataUsuario["data"]['email'],
                'rol'        => $DataUsuario["data"]['rol'],
                'isLoggedIn' => TRUE
            ];
            $session = session();
            $session->set($ses_data);
        }

        return $this->respond($this->respuesta);
    }
}
