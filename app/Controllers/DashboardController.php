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
        foreach ($cases as $index => $case) {
            $cases[$index]['last_agenda'] = $caseAgendaModel->select('case_agendas.*, case_positions.name as case_position_name')
                ->join('case_positions', 'case_positions.id = case_agendas.position_id')
                ->where('case_id', $case['id'])
                ->orderBy('date', 'DESC')
                ->get()
                ->getRowArray();
        }

        $casesToday = [];
        $casesThisWeek = [];
        if (session('role') === 'operator') {
            $today = date('Y-m-d');
            $startOfWeek = date('Y-m-d', strtotime('monday this week'));
            $endOfWeek = date('Y-m-d', strtotime('sunday this week'));

            foreach ($cases as $case) {
                $caseDate = $case['case_date'];

                if ($caseDate === $today) {
                    $casesToday[] = $case;
                }

                if ($caseDate >= $startOfWeek && $caseDate <= $endOfWeek) {
                    $casesThisWeek[] = $case;
                }

                $agendas = $caseAgendaModel
                    ->select('cases.*, case_agendas.*, case_positions.name as case_position_name, case_types.name as case_type_name')
                    ->join('cases', 'cases.id = case_agendas.case_id')
                    ->join('case_types', 'case_types.id = cases.case_type_id')
                    ->join('case_positions', 'case_positions.id = case_agendas.position_id')
                    ->where('case_id', $case['id'])
                    ->orderBy('date', 'DESC')
                    ->get()
                    ->getResultArray();

                if (sizeof($agendas) > 0) {
                    foreach ($agendas as $agenda) {
                        $agendaDate = $agenda['date'];

                        if ($agendaDate === $today) {
                            $casesToday[] = $agenda;
                        }

                        if ($agendaDate >= $startOfWeek && $agendaDate <= $endOfWeek) {
                            $casesThisWeek[] = $agenda;
                        }
                    }
                }
            }
        }

        // dd($casesThisWeek[0]['case_position_name']);

        $data = [
            'page_title' => 'Dashboard',
            'active_menu' => 'dashboard',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Dashboard', 'arrow' => false],
            ],
            'cases' => $cases,
            'cases_today' => $casesToday,
            'cases_this_week' => $casesThisWeek
        ];

        return view('main/dashboard/index', $data);
    }
}
