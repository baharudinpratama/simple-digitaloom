<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaseAgendaModel;
use App\Models\CaseModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $caseModel = new CaseModel();
        $caseAgendaModel = new CaseAgendaModel();

        $cases = $caseModel
            ->select('cases.*, case_types.name as case_type_name')
            ->join('case_types', 'case_types.id = cases.case_type_id')
            ->get()
            ->getResultArray();
        foreach ($cases as &$case) {
            $case['last_agenda'] = $caseAgendaModel->select('case_agendas.*, case_positions.name as case_position_name')
                ->join('case_positions', 'case_positions.id = case_agendas.position_id')
                ->where('case_id', $case['id'])
                ->orderBy('date', 'DESC')
                ->get()
                ->getRowArray();
        }

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
