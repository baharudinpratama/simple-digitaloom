<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendaFileModel;
use App\Models\CaseAgendaModel;
use App\Models\CaseModel;
use App\Models\CaseObjectModel;
use App\Models\CasePartyModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;

class ReportController extends BaseController
{
    public function index()
    {
        $caseModel = new CaseModel();

        $cases = $caseModel
            ->select('cases.*, case_types.name as case_type_name, case_subjects.name as case_subject_name, users.name as pic_name')
            ->join('case_types', 'case_types.id = cases.case_type_id')
            ->join('case_subjects', 'case_subjects.id = cases.case_subject_id')
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

    public function agenda()
    {
        $caseModel = new CaseModel();
        $caseAgendaModel = new CaseAgendaModel();
        $casePartyModel = new CasePartyModel();
        $caseObjectModel = new CaseObjectModel();
        $agendaFileModel = new AgendaFileModel();

        $logoPath = FCPATH . 'img/logo.png';
        $logoData = base64_encode(file_get_contents($logoPath));
        $logoMime = mime_content_type($logoPath);
        $logoSrc = 'data:' . $logoMime . ';base64,' . $logoData;

        $data['logo'] = $logoSrc;
        $data['caseId'] = $this->request->getPost('caseId');
        $data['case'] = $caseModel
            ->select('cases.*, case_types.name as case_type_name, case_subjects.name as case_subject_name, users.name as pic_name')
            ->join('case_types', 'case_types.id = cases.case_type_id')
            ->join('case_subjects', 'case_subjects.id = cases.case_subject_id')
            ->join('users', 'users.id = cases.pic')
            ->where('cases.id', $data['caseId'])
            ->get()
            ->getRowArray();
        $data['parties'] = $casePartyModel->select('case_parties.*, party_units.name as unit_name')
            ->join('party_units', 'party_units.id = case_parties.unit_id')
            ->where('case_id', $data['caseId'])
            ->orderBy('case_parties.order', 'ASC')
            ->get()
            ->getResultArray();
        $data['objects'] = $caseObjectModel->select('case_objects.*, asset_types.name as asset_type_name, doc_types.name as doc_type_name')
            ->join('asset_types', 'asset_types.id = case_objects.asset_type_id')
            ->join('doc_types', 'doc_types.id = case_objects.doc_type_id')
            ->where('case_id', $data['caseId'])
            ->get()
            ->getResultArray();
        $data['agendas'] = $caseAgendaModel->select('case_agendas.*, case_positions.name as case_position_name')
            ->join('case_positions', 'case_positions.id = case_agendas.position_id')
            ->where('case_id', $data['caseId'])
            ->get()
            ->getResultArray();
        foreach ($data['agendas'] as &$agenda) {
            $agenda['files'] = $agendaFileModel
                ->where('agenda_id', $agenda['id'])
                ->get()
                ->getResultArray();
        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('report/agenda', $data));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("report-agenda-" . $data['caseId'] . ".pdf", ["Attachment" => false]);
    }
}
