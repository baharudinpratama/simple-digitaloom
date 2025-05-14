<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaseDataModel;
use CodeIgniter\HTTP\ResponseInterface;

class CaseDataController extends BaseController
{
    public function indexByCase($id)
    {
        $caseDataModel = new CaseDataModel();

        $caseData = $caseDataModel->where('case_id', $id)->get()->getResult();

        return $this->response->setJSON([
            'success' => true,
            'message' => '',
            'data' => $caseData
        ]);
    }

    public function store()
    {
        $db = db_connect();
        $caseDataModel = new CaseDataModel();

        $db->transStart();

        $caseDataModel->insert([
            'case_id'           => $this->request->getPost('caseId'),
            'asset_type'        => $this->request->getPost('assetType'),
            'asset_location'    => $this->request->getPost('assetLocation'),
            'asset_owner'       => $this->request->getPost('assetOwner'),
            'ownership_proof'   => $this->request->getPost('ownershipProof')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal disimpan.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil disimpan!!!']);

            $caseData = $caseDataModel->where('case_id', $this->request->getPost('caseId'))->get()->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil disimpan!!!',
                'data' => $caseData
            ], 200);
        }
    }

    public function update()
    {
        $db = db_connect();
        $caseDataModel = new CaseDataModel();

        $db->transStart();

        $caseDataModel->update($this->request->getPost('id'), [
            'case_id'           => $this->request->getPost('caseId'),
            'asset_type'        => $this->request->getPost('assetType'),
            'asset_location'    => $this->request->getPost('assetLocation'),
            'asset_owner'       => $this->request->getPost('assetOwner'),
            'ownership_proof'   => $this->request->getPost('ownershipProof')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal diperbarui.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil diperbarui!!!']);

            $caseDataModel->where('case_id', $this->request->getPost('caseId'))->get()->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil diperbarui!!!',
                'data' => $caseDataModel
            ], 200);
        }
    }

    public function delete()
    {
        $db = db_connect();
        $caseDataModel = new CaseDataModel();

        $db->transStart();

        $caseDataModel->delete($this->request->getPost('id'));

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal dihapus.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil dihapus!!!']);

            $caseDataModel->where('case_id', $this->request->getPost('caseId'))->get()->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil dihapus!!!',
                'data' => $caseDataModel
            ], 200);
        }
    }
}
