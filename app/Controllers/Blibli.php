<?php

namespace App\Controllers;

use Dompdf\Options;
use TCPDF;

class Blibli extends BaseController
{
    public function index()
    {
        $data['menu'] = 'Data Blibli';
        $data['tambah'] = 'blibli';
        $data['umum_blibli'] = $this->db->table('umum_blibli')->get()->getResultArray();
        return view('blibli/index', $data);
    }

    public function tambah()
    {
        $data['menu'] = 'Data Blibli';
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('umum_blibli')
                ->set('tgl', $this->request->getVar('tgl'))
                ->set('penjualan', $this->request->getVar('penjualan'))
                ->set('produk_terjual', $this->request->getVar('produk_terjual'))
                ->set('pesanan', $this->request->getVar('pesanan'))
                ->set('pelanggan', $this->request->getVar('pelanggan'))
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/blibli'));
        }
        return view('blibli/tambah', $data);
    }

    public function hapus($id)
    {
        $this->db->table('umum_blibli')->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/blibli'));
    }

    public function simpanExcel()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        // $this->db->table('umum_blibli')->truncate();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $date = $row[0];
            $sales = $row[1];
            $sold = $row[2];
            $order = $row[3];
            $customer = $row[4];

            // $cekNis = $this->db->table('siswa')->getWhere(['Nis' => $Nis])->getResult();

            $cekNis = $this->db->table('umum_blibli')->where('id', 0)->get()->getResultArray();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red">Data Gagal di Import NIS ada yang sama</b>');
            } else {
                if (($date == '') and ($customer == '')) {
                    session()->setFlashdata('pesan', 'Berhasil import excel');

                    return redirect()->to('/blibli');
                }
                $simpandata = [
                    'tgl' => $date,
                    'penjualan' => $sales,
                    'produk_terjual' => $sold,
                    'pesanan' => $order,
                    'pelanggan' => $customer
                ];

                // dd($simpandata);
                $this->db->table('umum_blibli')->insert($simpandata);
            }
        }


        return redirect()->to('/blibli');
    }
}
