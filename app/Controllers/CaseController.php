<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssetTypeModel;
use App\Models\CurrencyModel;
use App\Models\CaseClaimModel;
use App\Models\CaseModel;
use App\Models\CasePositionModel;
use App\Models\CaseSubjectModel;
use App\Models\CaseTypeModel;
use App\Models\DocTypeModel;
use App\Models\PartyUnitModel;
use App\Models\ProvinceModel;
use CodeIgniter\Database\RawSql;
use CodeIgniter\HTTP\ResponseInterface;
use Config\DocTypes;

class CaseController extends BaseController
{
    public function index()
    {
        $caseModel = new CaseModel();
        $cases = $caseModel
            ->select('cases.*, case_subjects.name as case_subject_name, courts.name as court_name, users.name as pic_name')
            ->join('case_subjects', 'case_subjects.id = cases.case_subject_id')
            ->join('courts', 'courts.id = cases.court_id')
            ->join('users', 'users.id = cases.pic')
            ->get()
            ->getResultArray();

        $data = [
            'page_title' => 'Daftar Identitas Perkara',
            'active_menu' => 'cases',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Identitas Perkara', 'arrow' => false],
            ],
            'session' => session(),
            'cases' => $cases
        ];

        return view('main/case/index', $data);
    }

    public function create()
    {
        $caseTypeModel = new CaseTypeModel();
        $provinceModel = new ProvinceModel();
        $caseSubjectModel = new CaseSubjectModel();
        $currencyModel = new CurrencyModel();

        $caseTypes = $caseTypeModel->findAll();
        $provinces = $provinceModel->findAll();
        $caseSubjects = $caseSubjectModel->findAll();
        $currencies = $currencyModel->findAll();

        $data = [
            'page_title' => 'Tambah Data Perkara',
            'active_menu' => 'cases',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Identitas Perkara', 'arrow' => true],
                ['title' => 'Tambah Data Perkara', 'arrow' => false],
            ],
            'method' => 'create',
            'session' => session(),
            'case_types' => $caseTypes,
            'provinces' => $provinces,
            'case_subjects' => $caseSubjects,
            'currencies' => $currencies
        ];

        return view('main/case/form', $data);
    }

    public function store()
    {
        $db = db_connect();
        $caseModel = new CaseModel();
        $caseClaimModel = new CaseClaimModel();

        $db->transStart();

        $data = [
            'case_number'           => $this->request->getPost('caseNumber'),
            'case_type_id'          => $this->request->getPost('caseTypeId'),
            'province_id'           => $this->request->getPost('provinceId'),
            'court_id'              => $this->request->getPost('courtId'),
            'case_date'             => $this->request->getPost('caseDate'),
            'case_description'      => $this->request->getPost('caseDescription'),
            'case_subject_id'       => $this->request->getPost('caseSubjectId'),
            'case_summary'          => $this->request->getPost('caseSummary'),
            'compensation_claim'    => $this->request->getPost('compensationClaim'),
            'pic'                   => session()->get('id')
        ];

        $caseModel->insert($data);

        $claims = json_decode($this->request->getPost('claims'), true);
        if (sizeof($claims) > 0) {
            foreach ($claims as $claim) {
                $caseClaimModel->insert([
                    'case_id' => $caseModel->getInsertID(),
                    'currency_id' => $claim['currencyId'],
                    'amount' => $claim['amount']
                ]);
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to create case.'
            ], 500);
        } else {
            session()->set(['flash_message' => '1 Data Perkara berhasil ditambah ke dalam Daftar identitas perkara!!!']);

            return $this->response->setJSON([
                'success' => true,
                'message' => '1 Data Perkara berhasil ditambah ke dalam Daftar identitas perkara!!!'
            ], 200);
        }
    }

    public function show($id)
    {
        $caseModel = new CaseModel();
        $caseClaimsModel = new CaseClaimModel();
        $currencyModel = new CurrencyModel();
        $partyUnitModel = new PartyUnitModel();
        $assetTypeModel = new AssetTypeModel();
        $docTypeModel = new DocTypeModel();
        $casePositionModel = new CasePositionModel();

        $cases = $caseModel
            ->select('cases.*, case_types.name as case_type_name, provinces.name as province_name, courts.name as court_name, case_subjects.name as case_subject_name, users.name as pic_name')
            ->join('case_types', 'case_types.id = cases.case_type_id')
            ->join('provinces', 'provinces.id = cases.province_id')
            ->join('courts', 'courts.id = cases.court_id')
            ->join('case_subjects', 'case_subjects.id = cases.case_subject_id')
            ->join('users', 'users.id = cases.pic')
            ->where('cases.id', $id)
            ->get()
            ->getRowArray();
        $caseClaims = $caseClaimsModel
            ->select('case_claims.*, currencies.symbol as currency_symbol')
            ->join('currencies', 'currencies.id = case_claims.currency_id')
            ->where('case_id', $id)
            ->get()
            ->getResultArray();
        $cases['claims'] = $caseClaims;

        $data = [
            'page_title' => 'Detail Perkara',
            'active_menu' => 'cases',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Identitas Perkara', 'arrow' => true],
                ['title' => 'Detail Perkara', 'arrow' => false],
            ],
            'session' => session(),
            'cases' => $cases,
            'currencies' => $currencyModel->findAll(),
            'party_units' => $partyUnitModel->findAll(),
            'asset_types' => $assetTypeModel->findAll(),
            'doc_types' => $docTypeModel->findAll(),
            'case_positions' => $casePositionModel->findAll()
        ];

        return view('main/case/show', $data);
    }
}
