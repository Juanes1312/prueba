<?php

namespace App\Controllers;

class Panel extends BaseController
{

    public function index()
    {
        return view('app/page/panel', []);
    }
}
