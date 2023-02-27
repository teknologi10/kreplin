<?php

namespace App\Controllers;


class User extends BaseController
{
    public function admin()
    {
        $data['menu'] = 'Admin';
        $data['tambah'] = 'admin';
        $data['user'] = $this->db->table('user')->where('status', 3)->get()->getResultArray();
        return view('user/index', $data);
    }

    public function tambah_admin()
    {
        $data['menu'] = 'Admin';
        $data['tambah'] = 'admin';
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('user')
                ->set('nama', $this->request->getVar('nama'))
                ->set('jenis_kelamin', $this->request->getVar('jenis_kelamin'))
                ->set('telpon', $this->request->getVar('telpon'))
                ->set('alamat', $this->request->getVar('alamat'))
                ->set('username', $this->request->getVar('username'))
                ->set('password', $this->request->getVar('password'))
                ->set('status', 3)
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/user/admin'));
        }
        return view('user/tambah', $data);
    }

    public function pegawai()
    {
        $data['menu'] = 'Pegawai';
        $data['tambah'] = 'pegawai';
        $data['user'] = $this->db->table('user')->where('status', 2)->get()->getResultArray();
        return view('user/index', $data);
    }

    public function tambah_pegawai()
    {
        $data['menu'] = 'Pegawai';
        $data['tambah'] = 'pegawai';
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('user')
                ->set('nama', $this->request->getVar('nama'))
                ->set('jenis_kelamin', $this->request->getVar('jenis_kelamin'))
                ->set('telpon', $this->request->getVar('telpon'))
                ->set('alamat', $this->request->getVar('alamat'))
                ->set('username', $this->request->getVar('username'))
                ->set('password', $this->request->getVar('password'))
                ->set('status', 2)
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/user/pegawai'));
        }
        return view('user/tambah', $data);
    }

    public function magang()
    {
        $data['menu'] = 'Magang';
        $data['tambah'] = 'magang';
        $data['user'] = $this->db->table('user')->where('status', 1)->get()->getResultArray();
        return view('user/index', $data);
    }

    public function tambah_magang()
    {
        $data['menu'] = 'Magang';
        $data['tambah'] = 'magang';
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('user')
                ->set('nama', $this->request->getVar('nama'))
                ->set('jenis_kelamin', $this->request->getVar('jenis_kelamin'))
                ->set('telpon', $this->request->getVar('telpon'))
                ->set('alamat', $this->request->getVar('alamat'))
                ->set('username', $this->request->getVar('username'))
                ->set('password', $this->request->getVar('password'))
                ->set('status', 3)
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/user/magang'));
        }
        return view('user/tambah', $data);
    }

    public function hapus($id)
    {
        $user = $this->db->table('user')->where('id', $id)->get()->getRowArray();
        if ($user['status'] == 1) {
            $redirect = 'magang';
        }
        if ($user['status'] == 2) {
            $redirect = 'pegawai';
        }
        if ($user['status'] == 3) {
            $redirect = 'admin';
        }
        $this->db->table('user')->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/user/' . $redirect));
    }
}
