<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LegalCaseModel;
use CodeIgniter\Database\RawSql;
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
            'method' => 'create',
            'session' => session()
        ];

        return view('main/legal_case/form', $data);
    }

    public function store()
    {
        $legalCaseModel = new LegalCaseModel();

        $data = [
            'case_number'           => $this->request->getPost('caseNumber'),
            'case_type'             => $this->request->getPost('caseType'),
            'court_location'        => $this->request->getPost('courtLocation'),
            'court'                 => $this->request->getPost('court'),
            'case_date'             => $this->request->getPost('caseDate'),
            'case_description'      => $this->request->getPost('caseDescription'),
            'case_subject'          => $this->request->getPost('caseSubject'),
            'case_summary'          => $this->request->getPost('caseSummary'),
            'compensation_claim'    => $this->request->getPost('compensationClaim'),
            'pic'                   => session()->get('id')
        ];

        // return $this->response->setJSON([
        //     'status' => '',
        //     'message' => $data
        // ], 200);

        if ($legalCaseModel->allowEmptyInserts()->insert($data)) {
            // if (true) {
            session()->set(['flash_message' => '1 Data Perkara berhasil ditambah ke dalam Daftar identitas perkara!!!']);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => '1 Data Perkara berhasil ditambah ke dalam Daftar identitas perkara!!!'
            ], 200);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to create case.'
            ], 500);
        }
    }

    public function show($id)
    {
        // Get legal case based on id

        // return view('main/legal_case/show', $data);
    }
}
