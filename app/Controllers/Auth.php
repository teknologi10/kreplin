<?php

namespace App\Controllers;


class Auth extends BaseController
{
    public function index()
    {

        return view('login');

        // echo view('admin/footer');
    }

    public function registrasi()
    {

        return view('register');

        // echo view('admin/footer');
    }

    public function verif()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $login = $this->db->table('user')->where('username', $username)->where('password', $password)->get()->getRowArray();
        // $this->session->set($login);       

        if (!empty($login)) {

            $this->session->set($login);
            return redirect()->to(base_url('/dashboard'));
        } else {
            session()->setFlashdata('pesan', 'Kombinasi Username dan Password Salah');
            return redirect()->to('/')->withInput();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        // session_destroy();
        return redirect()->to(base_url());
    }
}
