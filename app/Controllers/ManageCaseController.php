<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssetTypeModel;
use App\Models\CaseModel;
use App\Models\CaseClaimModel;
use App\Models\CasePositionModel;
use App\Models\CurrencyModel;
use App\Models\DocTypeModel;
use App\Models\PartyUnitModel;
use CodeIgniter\HTTP\ResponseInterface;

class ManageCaseController extends BaseController
{
    public function index()
    {
        $caseModel = new CaseModel();
        $cases = $caseModel
            ->select('cases.*, case_subjects.name as case_subject_name, users.name as pic_name')
            ->join('case_subjects', 'case_subjects.id = cases.case_subject_id')
            ->join('users', 'users.id = cases.pic')
            ->get()
            ->getResultArray();

        $data = [
            'page_title' => 'Kelola Perkara',
            'active_menu' => 'manage_cases',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Kelola Perkara', 'arrow' => false],
            ],
            'session' => session(),
            'cases' => $cases
        ];

        return view('main/case/index', $data);
    }

    public function show($id)
    {
        $caseModel = new CaseModel();
        $caseClaimModel = new CaseClaimModel();
        $currencyModel = new CurrencyModel();
        $partyUnitModel = new PartyUnitModel();
        $assetTypeModel = new AssetTypeModel();
        $docTypeModel = new DocTypeModel();
        $casePositionModel = new CasePositionModel();

        $cases = $caseModel
            ->select('cases.*, case_types.name as case_type_name, provinces.name as province_name, case_subjects.name as case_subject_name, users.name as pic_name')
            ->join('case_types', 'case_types.id = cases.case_type_id')
            ->join('provinces', 'provinces.id = cases.province_id')
            ->join('case_subjects', 'case_subjects.id = cases.case_subject_id')
            ->join('users', 'users.id = cases.pic')
            ->where('cases.id', $id)
            ->get()
            ->getRowArray();

        $cases['claims'] = $caseClaimModel
            ->select('case_claims.*, currencies.code as currency_code, currencies.symbol as currency_symbol, currencies.name as currency_name')
            ->join('currencies', 'currencies.id = case_claims.currency_id')
            ->where('case_id', $id)
            ->get()
            ->getResultArray();

        $data = [
            'page_title' => 'Ubah Data Perkara',
            'active_menu' => 'manage_cases',
            'breadcrumb' => [
                ['title' => 'Home', 'arrow' => true],
                ['title' => 'Kelola Perkara', 'arrow' => true],
                ['title' => 'Ubah Data Perkara', 'arrow' => false],
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

    public function update()
    {
        $db = db_connect();
        $caseModel = new CaseModel();
        $caseClaimModel = new CaseClaimModel();

        $claims = json_decode($this->request->getPost('claims'), true);

        $db->transStart();

        $caseModel->update($this->request->getPost('id'), [
            'case_date'             => $this->request->getPost('caseDate'),
            'case_description'      => $this->request->getPost('caseDescription'),
            'compensation_claim'    => $this->request->getPost('compensationClaim'),
            'pic'                   => session()->get('id')
        ]);

        $existingClaims = $caseClaimModel->where('case_id', $this->request->getPost('id'))->get()->getResultArray();
        $existingClaimIds = array_column($existingClaims, 'id');
        $submittedClaimIds = [];

        if (sizeof($claims) > 0) {
            foreach ($claims as $claim) {
                if ($claim['id'] === '') {
                    $caseClaimModel->insert([
                        'case_id' => $this->request->getPost('id'),
                        'currency_id' => $claim['currencyId'],
                        'amount' => $claim['amount']
                    ]);
                } else {
                    $submittedClaimIds[] = strval($claim['id']);
                }
            }
        }

        $claimsToDelete = array_diff($existingClaimIds, $submittedClaimIds);

        if (!empty($claimsToDelete)) {
            $caseClaimModel->whereIn('id', $claimsToDelete)->delete();
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Update gagal.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil diperbarui!!!']);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil diperbarui!!!'
            ], 200);
        }
    }
}
