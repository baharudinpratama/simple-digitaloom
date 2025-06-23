<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user['deleted_at'] !== null) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Akun anda tidak aktif.'
            ]);
        }

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'is_logged_in' => true,
                'id' => $user['id'],
                'username' => $username,
                'name' => $user['name'],
                'role' => $user['role']
            ]);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Login berhasil.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Username atau password salah.'
            ]);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
