<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaseModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReportController extends BaseController
{
    public function index()
    {
        $caseModel = new CaseModel();

        $cases = $caseModel
            ->select('cases.*, case_types.name as case_type_name, case_subjects.name as case_subject_name, courts.name as court_name, users.name as pic_name')
            ->join('case_types', 'case_types.id = cases.case_type_id')
            ->join('case_subjects', 'case_subjects.id = cases.case_subject_id')
            ->join('courts', 'courts.id = cases.court_id')
            ->join('users', 'users.id = cases.pic')
            ->get()
            ->getResultArray();

        $data = [
            'page_title' => 'Laporan Daftar Perkara',
            'active_menu' => 'reports',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Laporan Daftar Perkara', 'arrow' => false],
            ],
            'session' => session(),
            'cases' => $cases
        ];

        return view('main/report/index', $data);
    }
}
