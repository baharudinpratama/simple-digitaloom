<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();
        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'is_logged_in' => true,
                'id' => $user['id'],
                'username' => $username,
                'name' => $user['name'],
                'role' => $user['role']
            ]);
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Login berhasil.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
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
