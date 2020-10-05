<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArsipModel;
use App\Models\CategoryModel;
use App\Models\DepartementModel;

class Arsip extends BaseController
{
    protected $ArsipModel;
    public function __construct()
    {
        $this->ArsipModel = new ArsipModel();
        $this->CategoryModel = new CategoryModel();
        $this->DepartementModel = new DepartementModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Arsip Data',
            'setting' => $this->SettingModel->getData(),
            'arsip' => $this->ArsipModel->getAllData(),
            'category' => $this->CategoryModel->getAllData(),
            'departement' => $this->DepartementModel->getAllData(),
            'count_arsip' => $this->ArsipModel->getCount(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/arsip', $data);
    }

    public function create()
    {
        if ($this->validate([
            'id_category' => [
                'label' => 'Category',
                'rules' => 'required',
            ],
            'id_dept' => [
                'label' => 'Departement',
                'rules' => 'required',
            ],
            'no_arsip' => [
                'label' => 'Number',
                'rules' => 'required',
            ],
            'name_file' => [
                'label' => 'Name File',
                'rules' => 'required',
            ],
            'file' => [
                'label' => 'File',
                'rules' => 'mime_in[file,application/pdf,application/doc,application/docx]',
            ],
        ])) {
            // Jika valid
            $fileDoc = $this->request->getFile('file');
            $nameDoc = $fileDoc->getName();
            $data = [
                'id_category' => $this->request->getPost('id_category'),
                'id_dept' => $this->request->getPost('id_dept'),
                'id_user' => session()->get('id_user'),
                'no_arsip' => $this->request->getPost('no_arsip'),
                'name_file' => $this->request->getPost('name_file'),
                'description' => $this->request->getPost('description'),
                'file' => $nameDoc,
            ];
            $fileDoc->move('assets/file/arsip', $nameDoc);
            $this->ArsipModel->insert($data);
            session()->setFlashdata('message', 'Data has been successfully');
            return redirect()->to('/admin/arsip');
        } else {
            // Jika tidak valid
            session()->setFlashdata('error', \Config\Services::validation()->listErrors());
            return redirect()->to('/admin/arsip');
        }
    }

    public function update($id)
    {
        if ($this->validate([
            'id_category' => [
                'label' => 'Category',
                'rules' => 'required',
            ],
            'id_dept' => [
                'label' => 'Departement',
                'rules' => 'required',
            ],
            'no_arsip' => [
                'label' => 'Number',
                'rules' => 'required',
            ],
            'name_file' => [
                'label' => 'Name File',
                'rules' => 'required',
            ],
            'file' => [
                'label' => 'File',
                'rules' => 'mime_in[file,application/pdf,application/doc,application/docx]',
            ],
        ])) {
            // Jika valid
            $fileDoc = $this->request->getFile('file');
            if ($fileDoc->getError('file') == 4) {
                $nameDoc = $this->request->getFile('oldFile');
            } else {
                // Hapus foto
                $arsip = $this->ArsipModel->getAllData($id);
                if ($arsip['file'] != "") {
                    unlink('assets/file/arsip/' . $arsip['file']);
                }
                $nameDoc = $fileDoc->getName();
                $fileDoc->move('assets/file/arsip', $nameDoc);
            }
            $data = [
                'id_arsip' => $id,
                'id_category' => $this->request->getPost('id_category'),
                'id_dept' => session()->get('id_dept'),
                'id_user' => session()->get('id_user'),
                'no_arsip' => $this->request->getPost('no_arsip'),
                'name_file' => $this->request->getPost('name_file'),
                'description' => $this->request->getPost('description'),
                'file' => $nameDoc,
            ];
            $this->ArsipModel->updateData($data);
            session()->setFlashdata('message', 'Data has been updated');
            return redirect()->to('/admin/arsip');
        } else {
            // Jika tidak valid
            session()->setFlashdata('error', \Config\Services::validation()->listErrors());
            return redirect()->to('/admin/arsip');
        }
    }

    public function delete($id)
    {
        $arsip = $this->ArsipModel->getAllData($id);
        unlink('assets/file/arsip/' . $arsip['file']);

        $this->ArsipModel->deleteData($id);
        session()->setFlashdata('message', 'Data has been deleted.');
        return redirect()->to('/admin/arsip');
    }

    public function excel()
    {
        $data = [
            'arsip' => $this->ArsipModel->getAllData(),
        ];
        return view('report/excel_arsip', $data);
    }
}
