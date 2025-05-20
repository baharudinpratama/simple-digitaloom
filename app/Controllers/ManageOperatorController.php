<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class ManageOperatorController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $operators = $userModel->where('role', 'operator')->get()->getResultArray();

        $data = [
            'page_title' => 'Kelola Akun',
            'active_menu' => 'manage_operators',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Kelola Akun Operator', 'arrow' => false],
            ],
            'session' => session(),
            'operators' => $operators
        ];

        return view('main/operator/index', $data);
    }

    public function show($id)
    {
        $userModel = new UserModel();

        $operators = $userModel->where('id', $id)->get()->getRowArray();

        $data = [
            'page_title' => 'Reset Password',
            'active_menu' => 'manage_operators',
            'method' => 'update',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Kelola Akun Operator', 'arrow' => true],
                ['title' => 'Reset Password', 'arrow' => false],
            ],
            'session' => session(),
            'operators' => $operators
        ];

        return view('main/operator/form', $data);
    }
}
