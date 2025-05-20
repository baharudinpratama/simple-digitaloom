<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class OperatorController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $operators = $userModel->where('role', 'operator')->get()->getResultArray();

        $data = [
            'page_title' => 'Daftar Akun',
            'active_menu' => 'operators',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Daftar Akun Operator', 'arrow' => false],
            ],
            'session' => session(),
            'operators' => $operators
        ];

        return view('main/operator/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title' => 'Tambah Akun',
            'active_menu' => 'operators',
            'method' => 'create',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Daftar Akun Operator', 'arrow' => true],
                ['title' => 'Tambah Akun', 'arrow' => false],
            ]
        ];

        return view('main/operator/form', $data);
    }

    public function store()
    {
        $db = db_connect();
        $userModel = new UserModel();

        $db->transStart();

        $userModel->insert([
            'username'  => $this->request->getPost('username'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'      => 'operator'
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            $error = $db->error();
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Simpan data gagal: ' . $error['message'],
            ], 500);
        } else {
            session()->set(['flash_message' => 'Simpan data berhasil']);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Simpan data berhasil'
            ], 200);
        }
    }

    public function update()
    {
        $db = db_connect();
        $userModel = new UserModel();

        $db->transStart();

        $userModel->update($this->request->getPost('id'), [
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            $error = $db->error();
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Simpan data gagal: ' . $error['message'],
            ], 500);
        } else {
            session()->set(['flash_message' => 'Simpan data berhasil']);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Simpan data berhasil'
            ], 200);
        }
    }
}
