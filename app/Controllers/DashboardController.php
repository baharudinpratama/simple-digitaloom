<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaseModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $caseModel = new CaseModel();
        $cases = $caseModel
            ->select('cases.*, case_types.name as case_type_name')
            ->join('case_types', 'case_types.id = cases.case_type_id')
            ->get()
            ->getResultArray();

        $data = [
            'page_title' => 'Dashboard',
            'active_menu' => 'dashboard',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Dashboard', 'arrow' => false],
            ],
            'cases' => $cases
        ];

        return view('main/dashboard/index', $data);
    }
}
