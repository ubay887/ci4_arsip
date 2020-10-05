<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Users Data',
            'setting' => $this->SettingModel->getData(),
            'users' => $this->UserModel->getAllData(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/users', $data);
    }

    public function create()
    {
        if ($this->validate([
            'name_user' => [
                'label' => 'Name user',
                'rules' => 'required',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[users.email]',
            ],
            'image' => [
                'label' => 'Photo',
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg,image/gif]',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
            ],
            'is_active' => [
                'label' => 'Status',
                'rules' => 'required',
            ],
        ])) {
            // Jika valid
            $fileImage = $this->request->getFile('image');
            if ($fileImage->getError() == 4) {
                // Jika error, maka setting default image
                $nameImage = 'default.png';
            } else {
                // Jika tidak error
                $nameImage = $fileImage->getRandomName();
                // Pindahkan file
                $fileImage->move('assets/img/users', $nameImage);
            }
            $data = [
                'name_user' => $this->request->getPost('name_user'),
                'email' => $this->request->getPost('email'),
                'image' => $nameImage,
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level' => $this->request->getPost('level'),
                'is_active' => $this->request->getPost('is_active'),
            ];
            $this->UserModel->insert($data);
            session()->setFlashdata('message', 'Data has been successfully');
            return redirect()->to('/admin/users');
        } else {
            // Jika tidak valid
            session()->setFlashdata('error', \Config\Services::validation()->listErrors());
            return redirect()->to('/admin/users');
        }
    }

    public function update($id)
    {
        if ($this->validate([
            'name_user' => [
                'label' => 'Name user',
                'rules' => 'required',
            ],
            'image' => [
                'label' => 'Photo',
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg,image/gif]',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
            ],
            'level' => [
                'label' => 'Level',
                'rules' => 'required',
            ],
            'is_active' => [
                'label' => 'Status',
                'rules' => 'required',
            ],
        ])) {
            // Jika valid
            $fileImage = $this->request->getFile('image');
            if ($fileImage->getError() == 4) {
                $data = [
                    'id_user' => $id,
                    'name_user' => $this->request->getPost('name_user'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'is_active' => $this->request->getPost('is_active'),
                ];
                $this->UserModel->updateData($data);
            } else {
                // Hapus foto
                $user = $this->UserModel->getAllData($id);
                if ($user['image'] != "") {
                    unlink('assets/img/users/' . $user['image']);
                }
                $nameImage = $fileImage->getRandomName();
                $data = [
                    'id_user' => $id,
                    'name_user' => $this->request->getPost('name_user'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'is_active' => $this->request->getPost('is_active'),
                    'image' => $nameImage,
                ];
                $fileImage->move('assets/img/users', $nameImage);
                $this->UserModel->updateData($data);
            }
            session()->setFlashdata('message', 'Data has been updated');
            return redirect()->to('/admin/users');
        } else {
            // Jika tidak valid
            session()->setFlashdata('error', \Config\Services::validation()->listErrors());
            return redirect()->to('/admin/users');
        }
    }

    public function delete($id)
    {
        $user = $this->UserModel->getAllData($id);
        unlink('assets/img/users/' . $user['image']);

        $this->UserModel->deleteData($id);
        session()->setFlashdata('message', 'Data has been deleted.');
        return redirect()->to('/admin/users');
    }

    public function excel()
    {
        $data = [
            'users' => $this->UserModel->getAllData(),
        ];
        return view('report/excel_users', $data);
    }
}
