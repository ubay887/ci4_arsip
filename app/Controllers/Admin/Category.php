<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{
    protected $CategoryModel;
    public function __construct()
    {
        $this->CategoryModel = new CategoryModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Category Data',
            'setting' => $this->SettingModel->getData(),
            'category' => $this->CategoryModel->getAllData(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/category', $data);
    }

    public function create()
    {
        if ($this->validate([
            'name_category' => [
                'label' => 'Category name',
                'rules' => 'required',
            ],
        ])) {
            $data = [
                'name_category' => $this->request->getPost('name_category'),
            ];
            $this->CategoryModel->addData($data);
            session()->setFlashdata('message', 'Data has been successfully');
            return redirect()->to('/admin/category');
        } else {
            session()->setFlashdata('error', \Config\Services::validation()->listErrors());
            return redirect()->to('/admin/category');
        }
    }

    public function update($id)
    {
        $data = [
            'id_category' => $id,
            'name_category' => $this->request->getPost('name_category'),
        ];
        $this->CategoryModel->updateData($data);
        session()->setFlashdata('message', 'Data has been updated');
        return redirect()->to('/admin/category');
    }

    public function delete($id)
    {
        $this->model->deleteData($id);
        session()->setFlashdata('message', 'Data has been deleted.');
        return redirect()->to('/admin/category');
    }
}
