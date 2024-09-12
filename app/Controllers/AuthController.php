<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AuthController extends BaseController
{

    public function index(): string
    {
        return view('layout/header') . view('login') . view('layout/footer');
    }

    public function profile(): string
    {
        $data = array();

        $data['nama'] = session()->get('fullname');
        $data['username'] = session()->get('username');
        $data['email'] = session()->get('email');
        $data['password'] = session()->get('password');

        return view('layout/header') . view('profile', $data) . view('layout/footer');
    }

    public function handleRegister()
    {
        $userModel = new UserModel();

        $fullname = $this->request->getPost('fullName');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $data = [
            'fullname' => $fullname,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ];

        $checkUser = $userModel->where('username', $username)->first();
        if ($checkUser) {
            return redirect()->to('/register')->with('error', 'Username already exists');
        }

        $checkEmail = $userModel->where('email', $email)->first();
        if ($checkEmail) {
            return redirect()->to('/register')->with('error', 'Email already exists');
        }

        $userModel->insert($data);
        return redirect()->to('/login')->with('success', 'Register success');
    }

    public function handleLogin()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Username not found');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->to('/login')->with('error', 'Password is wrong');
        }

        session()->set([
            'id' => $user['id'],
            'fullname' => $user['fullname'],
            'username' => $user['username'],
            'email' => $user['email'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('/profile')->with('success', 'Login success');
    }

    public function register(): string
    {
        return view('layout/header') . view('register') . view('layout/footer');
    }

    public function handleLogout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
