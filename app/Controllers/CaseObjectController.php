<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CaseObjectModel;
use CodeIgniter\HTTP\ResponseInterface;

class CaseObjectController extends BaseController
{
    public function indexByCase($id)
    {
        $caseObjectModel = new CaseObjectModel();

        $caseObjects = $caseObjectModel->select('case_objects.*, asset_types.name as asset_type_name, doc_types.name as doc_type_name')
            ->join('asset_types', 'asset_types.id = case_objects.asset_type_id')
            ->join('doc_types', 'doc_types.id = case_objects.doc_type_id')
            ->where('case_id', $id)
            ->get()
            ->getResult();

        return $this->response->setJSON([
            'success' => true,
            'message' => '',
            'data' => $caseObjects
        ]);
    }

    public function store()
    {
        $db = db_connect();
        $caseObjectModel = new CaseObjectModel();

        $db->transStart();

        $caseObjectModel->insert([
            'case_id'       => $this->request->getPost('caseId'),
            'asset_type_id' => $this->request->getPost('assetTypeId'),
            'area'          => $this->request->getPost('area'),
            'doc_type_id'   => $this->request->getPost('docTypeId'),
            'owner'         => $this->request->getPost('owner'),
            'location'      => $this->request->getPost('location'),
            'summary'       => $this->request->getPost('summary')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal disimpan.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil disimpan!!!']);

            $caseObjects = $caseObjectModel->select('case_objects.*, asset_types.name as asset_type_name, doc_types.name as doc_type_name')
                ->join('asset_types', 'asset_types.id = case_objects.asset_type_id')
                ->join('doc_types', 'doc_types.id = case_objects.doc_type_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil disimpan!!!',
                'data' => $caseObjects
            ], 200);
        }
    }

    public function update()
    {
        $db = db_connect();
        $caseObjectModel = new CaseObjectModel();

        $db->transStart();

        $caseObjectModel->update($this->request->getPost('id'), [
            'case_id'       => $this->request->getPost('caseId'),
            'asset_type_id' => $this->request->getPost('assetTypeId'),
            'area'          => $this->request->getPost('area'),
            'doc_type_id'   => $this->request->getPost('docTypeId'),
            'owner'         => $this->request->getPost('owner'),
            'location'      => $this->request->getPost('location'),
            'summary'       => $this->request->getPost('summary')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal diperbarui.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil diperbarui!!!']);

            $caseObjects = $caseObjectModel->select('case_objects.*, asset_types.name as asset_type_name, doc_types.name as doc_type_name')
                ->join('asset_types', 'asset_types.id = case_objects.asset_type_id')
                ->join('doc_types', 'doc_types.id = case_objects.doc_type_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil diperbarui!!!',
                'data' => $caseObjects
            ], 200);
        }
    }

    public function delete()
    {
        $db = db_connect();
        $caseObjectModel = new CaseObjectModel();

        $db->transStart();

        $caseObjectModel->delete($this->request->getPost('id'));

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal dihapus.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil dihapus!!!']);

            $caseObjects = $caseObjectModel->select('case_objects.*, asset_types.name as asset_type_name, doc_types.name as doc_type_name')
                ->join('asset_types', 'asset_types.id = case_objects.asset_type_id')
                ->join('doc_types', 'doc_types.id = case_objects.doc_type_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil dihapus!!!',
                'data' => $caseObjects
            ], 200);
        }
    }
}
