<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{

    public function index()
    {
        return view('layout/header').view('login').view('layout/footer');
    }

    public function profile()
    {
        $data = array();

        $data['nama'] = "MUHAMMAD HAZIQ IZZAT BIN ALIAS";
        $data['username'] = "izzat";
        $data['email'] = "haziqizzat89@gmail.com";
        $data['password'] = "abc123";

        return view('layout/header').view('profile', $data).view('layout/footer');
    }

    public function register()
    {
        return view('layout/header').view('register').view('layout/footer');
    }
}
