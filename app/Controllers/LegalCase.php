<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LegalCase extends BaseController
{
    public function index()
    {
        $data = [
            'page_title' => 'Daftar Identitas Perkara',
            'active_menu' => 'legal_cases',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Identitas Perkara', 'arrow' => false],
            ]
        ];

        return view('main/legal_case/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title' => 'Tambah Data Perkara',
            'active_menu' => 'legal_cases',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Identitas Perkara', 'arrow' => true],
                ['title' => 'Tambah Data Perkara', 'arrow' => false],
            ],
            'method' => 'create'
        ];

        return view('main/legal_case/form', $data);
    }

    public function show($id)
    {
        // Get legal case based on id

        // return view('main/legal_case/show', $data);
    }
}
