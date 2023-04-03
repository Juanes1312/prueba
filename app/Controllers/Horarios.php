<?php

namespace App\Controllers;
use App\Models\Horarios as ModelHorarios;

class Horarios extends BaseController
{

    public function index()
    {
        $Horarios = new ModelHorarios();
        $datosHorarios = $Horarios->getHorarios();
        $datos = ["datosHorarios" => $datosHorarios];

        return view('app/page/horarios/crear', $datos);
    }

    public function crear()
    {

    }

}
