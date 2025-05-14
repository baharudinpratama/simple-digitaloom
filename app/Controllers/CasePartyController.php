<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CasePartyModel;
use CodeIgniter\HTTP\ResponseInterface;

class CasePartyController extends BaseController
{
    public function indexByCase($id)
    {
        $casePartyModel = new CasePartyModel();

        $caseData = $casePartyModel->select('case_parties.*, party_units.name as unit_name')
            ->join('party_units', 'party_units.id = case_parties.unit_id')
            ->where('case_id', $id)
            ->get()
            ->getResult();

        return $this->response->setJSON([
            'success' => true,
            'message' => '',
            'data' => $caseData
        ]);
    }

    public function store()
    {
        $db = db_connect();
        $casePartyModel = new CasePartyModel();

        $db->transStart();

        $casePartyModel->insert([
            'case_id'   => $this->request->getPost('caseId'),
            'name'      => $this->request->getPost('name'),
            'unit_id'   => $this->request->getPost('unitId'),
            'position'  => $this->request->getPost('position'),
            'address'   => $this->request->getPost('address'),
            'order'     => $this->request->getPost('order')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal disimpan.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil disimpan!!!']);

            $caseParty = $casePartyModel->select('case_parties.*, party_units.name as unit_name')
                ->join('party_units', 'party_units.id = case_parties.unit_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil disimpan!!!',
                'data' => $caseParty
            ], 200);
        }
    }

    public function update()
    {
        $db = db_connect();
        $casePartyModel = new CasePartyModel();

        $db->transStart();

        $casePartyModel->update($this->request->getPost('id'), [
            'case_id'   => $this->request->getPost('caseId'),
            'name'      => $this->request->getPost('name'),
            'unit_id'   => $this->request->getPost('unitId'),
            'position'  => $this->request->getPost('position'),
            'address'   => $this->request->getPost('address'),
            'order'     => $this->request->getPost('order')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal diperbarui.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil diperbarui!!!']);

            $caseParty = $casePartyModel->select('case_parties.*, party_units.name as unit_name')
                ->join('party_units', 'party_units.id = case_parties.unit_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil diperbarui!!!',
                'data' => $caseParty
            ], 200);
        }
    }

    public function delete()
    {
        $db = db_connect();
        $casePartyModel = new CasePartyModel();

        $db->transStart();

        $casePartyModel->delete($this->request->getPost('id'));

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal dihapus.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil dihapus!!!']);

            $caseParty = $casePartyModel->select('case_parties.*, party_units.name as unit_name')
                ->join('party_units', 'party_units.id = case_parties.unit_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil dihapus!!!',
                'data' => $caseParty
            ], 200);
        }
    }
}
