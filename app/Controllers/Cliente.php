<?php

namespace App\Controllers;

use App\Models\Cliente as ModelCliente;

class Cliente extends BaseController
{

    public function index()
    {
        $cliente = new ModelCliente();
        $datos = $cliente->findAll();
        return view('app/page/cliente/listado', ["listado" => $datos]);
    }

    public function crear()
    {
        return view('app/page/cliente/crear', []);
    }

}
