<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendaFileModel;
use App\Models\CaseAgendaModel;
use CodeIgniter\HTTP\ResponseInterface;

class CaseAgendaController extends BaseController
{
    public function indexByCase($id)
    {
        $caseAgendaModel = new CaseAgendaModel();
        $agendaFileModel = new AgendaFileModel();

        $caseAgendas = $caseAgendaModel->select('case_agendas.*, case_positions.name as case_position_name')
            ->join('case_positions', 'case_positions.id = case_agendas.position_id')
            ->where('case_id', $id)
            ->get()
            ->getResult();

        foreach ($caseAgendas as $agenda) {
            $agendaFiles = $agendaFileModel->where('agenda_id', $agenda->id)->get()->getResult();
            $agenda->agenda_files = $agendaFiles;
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => '',
            'data' => $caseAgendas
        ]);
    }

    public function store()
    {
        $db = db_connect();
        $caseAgendaModel = new CaseAgendaModel();
        $agendaFileModel = new AgendaFileModel();

        $db->transStart();

        $caseAgendaId = $caseAgendaModel->insert([
            'case_id'           => $this->request->getPost('caseId'),
            'position_id'       => $this->request->getPost('positionId'),
            'level'             => $this->request->getPost('level'),
            'date'              => $this->request->getPost('date'),
            'officer'           => $this->request->getPost('officer'),
            'outcome'           => $this->request->getPost('outcome'),
            'decision_number'   => $this->request->getPost('decisionNumber'),
            'win_lose'          => $this->request->getPost('winLose')
        ]);

        $files = $this->request->getFiles();

        if (isset($files['files'])) {
            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $originalName = $file->getClientName();
                    $file->move(ROOTPATH . 'public/uploads/agenda_files', $newName);

                    $agendaFileModel->insert([
                        'agenda_id' => $caseAgendaId,
                        'name' => $originalName,
                        'filename'  => $newName
                    ]);
                }
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal disimpan.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil disimpan!!!']);

            $caseAgendas = $caseAgendaModel->select('case_agendas.*, case_positions.name as case_position_name')
                ->join('case_positions', 'case_positions.id = case_agendas.position_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil disimpan!!!',
                'data' => $caseAgendas
            ], 200);
        }
    }

    public function update()
    {
        $db = db_connect();
        $caseAgendaModel = new CaseAgendaModel();
        $agendaFileModel = new AgendaFileModel();

        $db->transStart();

        $caseAgendaModel->update($this->request->getPost('id'), [
            'case_id'           => $this->request->getPost('caseId'),
            'position_id'       => $this->request->getPost('positionId'),
            'level'             => $this->request->getPost('level'),
            'date'              => $this->request->getPost('date'),
            'officer'           => $this->request->getPost('officer'),
            'outcome'           => $this->request->getPost('outcome'),
            'decision_number'   => $this->request->getPost('decisionNumber'),
            'win_lose'          => $this->request->getPost('winLose')
        ]);

        $deletedIds = $this->request->getPost('deletedFileIds');

        if ($deletedIds) {
            foreach ($deletedIds as $id) {
                $fileData = $agendaFileModel->find($id);
                if ($fileData) {
                    $filepath = ROOTPATH . 'public/uploads/agenda_files/' . $fileData['filename'];
                    if (file_exists($filepath)) {
                        unlink($filepath);
                    }
                    $agendaFileModel->delete($id);
                }
            }
        }

        $newFiles = $this->request->getFiles();

        if (isset($newFiles['newFiles'])) {
            foreach ($newFiles['newFiles'] as $newFile) {
                if ($newFile->isValid() && !$newFile->hasMoved()) {
                    $newName = $newFile->getRandomName();
                    $originalName = $newFile->getClientName();
                    $newFile->move(ROOTPATH . 'public/uploads/agenda_files', $newName);

                    $agendaFileModel->insert([
                        'agenda_id' => $this->request->getPost('id'),
                        'name' => $originalName,
                        'filename'  => $newName
                    ]);
                }
            }
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal diperbarui.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil diperbarui!!!']);

            $caseAgendas = $caseAgendaModel->select('case_agendas.*, case_positions.name as case_position_name')
                ->join('case_positions', 'case_positions.id = case_agendas.position_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil diperbarui!!!',
                'data' => $caseAgendas
            ], 200);
        }
    }

    public function delete()
    {
        $db = db_connect();
        $caseAgendaModel = new CaseAgendaModel();
        $agendaFileModel = new AgendaFileModel();

        $db->transStart();

        $agendaFiles = $agendaFileModel->where('agenda_id', $this->request->getPost('id'))->findAll();

        foreach ($agendaFiles as $file) {
            $filepath = ROOTPATH . 'public/uploads/agenda_files/' . $file['filename'];
            if (file_exists($filepath)) {
                unlink($filepath);
            }

            $agendaFileModel->delete($file['id']);
        }

        $caseAgendaModel->delete($this->request->getPost('id'));

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data gagal dihapus.'
            ], 500);
        } else {
            session()->set(['flash_message' => 'Data berhasil dihapus!!!']);

            $caseAgendas = $caseAgendaModel->select('case_agendas.*, case_positions.name as case_position_name')
                ->join('case_positions', 'case_positions.id = case_agendas.position_id')
                ->where('case_id', $this->request->getPost('caseId'))
                ->get()
                ->getResult();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Data berhasil dihapus!!!',
                'data' => $caseAgendas
            ], 200);
        }
    }
}
