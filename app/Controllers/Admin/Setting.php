<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Setting extends BaseController
{
    protected $SettingModel;
    public function index()
    {
        $data = [
            'title' => 'Setting',
            'setting' => $this->SettingModel->getData(),
            'settings' => $this->SettingModel->getAllData(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/setting', $data);
    }

    public function update($id)
    {
        if ($this->validate([
            'name_web' => [
                'label' => 'Name web',
                'rules' => 'required',
            ],
            // 'image' => [
            //     'label' => 'Photo',
            //     'rules' => 'max_size[image,2048]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg,image/gif]',
            // ],
            'version' => [
                'label' => 'Version',
                'rules' => 'required',
            ],
            'link_web' => [
                'label' => 'Link Web',
                'rules' => 'required',
            ],
        ])) {
            // Jika valid
            $fileImage = $this->request->getFile('image');
            if ($fileImage->getError() == 4) {
                $data = [
                    'id_setting' => $id,
                    'name_web' => $this->request->getPost('name_web'),
                    'description' => $this->request->getPost('description'),
                    'version' => $this->request->getPost('version'),
                    'link_web' => $this->request->getPost('link_web'),
                ];
                $this->SettingModel->updateData($data);
            } else {
                // Hapus foto
                $setting = $this->SettingModel->getAllData($id);
                if ($setting['image'] != "") {
                    unlink('assets/img/' . $setting['image']);
                }
                $nameImage = $fileImage->getRandomName();
                $data = [
                    'id_setting' => $id,
                    'name_web' => $this->request->getPost('name_web'),
                    'description' => $this->request->getPost('description'),
                    'version' => $this->request->getPost('version'),
                    'link_web' => $this->request->getPost('link_web'),
                    'image' => $nameImage,
                ];
                $fileImage->move('assets/img', $nameImage);
                $this->SettingModel->updateData($data);
            }
            session()->setFlashdata('message', 'Data has been updated');
            return redirect()->to('/admin/setting');
        } else {
            // Jika tidak valid
            session()->setFlashdata('error', \Config\Services::validation()->listErrors());
            return redirect()->to('/admin/setting');
        }
    }
}
