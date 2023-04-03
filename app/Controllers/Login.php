<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
