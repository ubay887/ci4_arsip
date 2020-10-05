<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'setting' => $this->SettingModel->getData(),
        ];
        return view('auth/login', $data);
    }

    public function doLogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
            ],
        ])) {
            // Jika valid
            $table = 'tb_user';
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $row = $this->AuthModel->getLogin($email, $table);

            if (password_verify($password, $row->password)) {
                // Jika datanya cocok
                $data = [
                    'loggedIn' => TRUE,
                    'id_user' => $row->id_user,
                    'name_user' => $row->name_user,
                    'email' => $row->email,
                    'level' => $row->level,
                    'image' => $row->image,
                    'id_dept' => $row->id_dept,
                ];
                session()->set($data);
                return redirect()->to('/admin');
            } else {
                // Jika tidak cocok
                session()->setFlashdata('message', 'Login Failed! check your email or password!');
                return redirect()->to('/auth');
            }
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/auth');
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'setting' => $this->SettingModel->getData(),
        ];
        return view('auth/register', $data);
    }

    public function doRegister()
    {
        if ($this->validate([
            'name_user' => [
                'label' => 'Full name',
                'rules' => 'required',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[tb_user.email]',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
            ],
            'retypePassword' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
            ],
        ])) {
            $data = [
                'name_user' => $this->request->getPost('name_user'),
                'email' => $this->request->getPost('email'),
                'image' => 'default.png',
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level' => 1,
                'is_active' => 2, //di database 1; karena enum 1 = aktif
            ];
            $this->AuthModel->insert($data);
            session()->setFlashdata('message', 'Account registration is successful.');
            return redirect()->to('/auth');
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/auth/register');
        }
    }

    public function logout()
    {
        $session =  session();
        $session->destroy();
        session()->setFlashdata('message', 'Logout successful.');
        return redirect()->to('/');
    }
}
