<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'page_title' => 'Dashboard',
            'active_menu' => 'dashboard',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Dashboard', 'arrow' => false],
            ]
        ];

        return view('main/dashboard/index', $data);
    }
}
