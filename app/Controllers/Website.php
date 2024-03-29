<?php

namespace App\Controllers;

use Dompdf\Options;
use TCPDF;

class Website extends BaseController
{
    public function index()
    {
        $session = session();
        $session->destroy();
        // dd($data);
        return view('website/petunjuk');
    }

    public function username()
    {
        return view('website/index');
    }

    public function pilih_waktu()
    {
        if ($this->request->getVar('submit') == 'pilih_waktu') {
            $username = $this->request->getVar('username');
            $login = $this->db->table('user')->where('username', $username)->get()->getRowArray();
            if (empty($login)) {
                session()->setFlashdata('pesan', 'Username Salah');
                return redirect()->to(base_url('/website/username'));
            }
            $log = [
                'username' => $this->request->getVar('username')
            ];
            $this->session->set($log);
            // dd($data);
            return view('website/pilih_waktu');
        }
    }

    public function data()
    {
        // dd(session('username'));
        $log = [
            'waktu' => $this->request->getVar('waktu')
        ];
        $this->session->set($log);
        return view('website/data');
    }

    public function mulai()
    {
        if ($this->request->getVar('submit')) {

            // dd(session('waktu'));
            $mulai = date('Y-m-d H:i:s');
            $selesai = date('Y-m-d H:i:s', strtotime('+' . session('waktu') . ' minutes +4 seconds', strtotime($mulai)));
            $this->db->table('tes')
                ->set('username', session('username'))
                ->set('mulai', $mulai)
                ->set('selesai', $selesai)
                ->insert();
            $id = $this->db->insertID();
            // dd($id);
            $log = [
                'id' => $id,
                'mulai' => $mulai,
                'selesai' => $selesai
            ];
            $this->session->set($log);
            // dd($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/website/tes'));
        }
    }

    public function tes()
    {
        if (empty(session('selesai'))) {
            return redirect()->to(base_url('/website'));
        }
        $bank_soal = $this->db->table('soal')->select('max(id) as max_soal')->get()->getRowArray();
        $acak_id = mt_rand(1, $bank_soal['max_soal']); //mengacak id

        $soal = $this->db->table('soal')->select('id,angka1,angka2,hasil,jawaban')->where('id', $acak_id)->get()->getRowArray();
        if ($soal > 0) {
            $data['id'] = $soal['id'];
            $data['angka1'] = $soal['angka1'];
            $data['angka2'] = $soal['angka2'];
            $data['hasil'] = $soal['hasil'];
            $data['jawaban'] = $soal['jawaban'];
        } else {
            return redirect()->to(base_url('/website/tes'));
        }
        return view('website/tes', $data);
    }

    public function jawab()
    {
        $this->session->set([
            'kirim' => date("Y-m-d H:i:s")
        ]);
        // if ($this->request->getVar('submit')) {
        $jawab = $this->request->getVar('jawab');
        $jawaban = $this->request->getVar('jawaban');
        // dd($this->request->getVar());
        $tes = $this->db->table('tes')->select('mulai')->where('id', session('id'))->get()->getRowArray();
        $waktustart = strtotime($tes['mulai']);
        $waktunow = strtotime(session('kirim'));
        $selisih = $waktunow - $waktustart;
        $menit = date("i", $selisih);
        // dd($menit);

        if (empty(session('selesai'))) {
            return redirect()->to(base_url('/website'));
        }
        $bank_soal = $this->db->table('soal')->select('max(id) as max_soal')->get()->getRowArray();
        $acak_id = mt_rand(1, $bank_soal['max_soal']); //mengacak id

        $soal = $this->db->table('soal')->select('id,angka1,angka2,hasil,jawaban')->where('id', $acak_id)->get()->getRowArray();
        if ($soal > 0) {
            $data['id'] = $soal['id'];
            $data['angka1'] = $soal['angka1'];
            $data['angka2'] = $soal['angka2'];
            $data['hasil'] = $soal['hasil'];
            $data['jawaban'] = $soal['jawaban'];
        } else {
            return redirect()->to(base_url('/website/tes'));
        }

        if ($jawab == $jawaban) {
            benar(session('id'), $menit);
            // return redirect()->to(base_url('/website/tes'));
            return view('website/new_soal', $data);
        } else {
            salah(session('id'), $menit);
            // return redirect()->to(base_url('/website/tes'));
            return view('website/new_soal', $data);
        }
        // }
    }

    public function hasil_akhir()
    {
        $data['tes'] = $this->db->table('tes')->where('id', session('id'))->get()->getRowArray();
        $data['history'] = $this->db->table('tes')->where('username', session('username'))->get()->getResultArray();
        // dd($data);
        return view('website/hasil_akhir', $data);
    }

    public function history()
    {
        if ($this->request->getVar('tes') == '') {
            $data['tes'] = $this->db->table('tes')->where('id', session('id'))->get()->getRowArray();
        } else {
            $data['tes'] = $this->db->table('tes')->where('id', $this->request->getVar('tes'))->get()->getRowArray();
        }
        // dd($data);
        return view('website/history', $data);
    }

    public function coutdown()
    {

        // dd($data);
        return view('website/coutdown');
    }
}
