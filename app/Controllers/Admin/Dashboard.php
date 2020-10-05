<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\ArsipModel;
use App\Models\DepartementModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->DepartementModel = new DepartementModel();
        $this->CategoryModel = new CategoryModel();
        $this->ArsipModel = new ArsipModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'setting' => $this->SettingModel->getData(),
            'count_user' => $this->UserModel->getCount(),
            'count_dept' => $this->DepartementModel->getCount(),
            'count_category' => $this->CategoryModel->getCount(),
            'count_arsip' => $this->ArsipModel->getCount(),
        ];
        return view('admin/dashboard', $data);
    }

    //--------------------------------------------------------------------

}
