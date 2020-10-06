<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DepartementModel;

class Departement extends BaseController
{
    protected $DepartementModel;
    public function __construct()
    {
        $this->DepartementModel = new DepartementModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Departement Data',
            'setting' => $this->SettingModel->getData(),
            'departement' => $this->DepartementModel->getAllData(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/departement', $data);
    }

    public function create()
    {
        if ($this->validate([
            'name_dept' => [
                'label' => 'Departement name',
                'rules' => 'required',
            ],
        ])) {
            $data = [
                'name_dept' => $this->request->getPost('name_dept'),
            ];
            $this->DepartementModel->addData($data);
            session()->setFlashdata('message', 'Data has been successfully');
            return redirect()->to('/admin/departement');
        } else {
            session()->setFlashdata('error', \Config\Services::validation()->listErrors());
            return redirect()->to('/admin/departement');
        }
    }

    public function update($id)
    {
        $data = [
            'id_dept' => $id,
            'name_dept' => $this->request->getPost('name_dept'),
        ];
        $this->DepartementModel->updateData($data);
        session()->setFlashdata('message', 'Data has been updated');
        return redirect()->to('/admin/departement');
    }

    public function delete($id)
    {
        $this->DepartementModel->deleteData($id);
        session()->setFlashdata('message', 'Data has been deleted.');
        return redirect()->to('/admin/departement');
    }
}
