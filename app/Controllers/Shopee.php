<?php

namespace App\Controllers;

use Dompdf\Options;
use TCPDF;

class Shopee extends BaseController
{
    public function index()
    {
        $data['menu'] = 'Data Shopee';
        $data['tambah'] = 'shopee';
        $data['umum_shopee'] = $this->db->table('umum_shopee')->get()->getResultArray();
        return view('shopee/index', $data);
    }

    public function tambah()
    {
        $data['menu'] = 'Data Shopee';
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('umum_shopee')
                ->set('tgl', $this->request->getVar('tgl'))
                ->set('penjualan', $this->request->getVar('penjualan'))
                ->set('pesanan', $this->request->getVar('pesanan'))
                ->set('jual_perpesanan', $this->request->getVar('jual_perpesanan'))
                ->set('produk_dilihat', $this->request->getVar('produk_dilihat'))
                ->set('total_pengunjung', $this->request->getVar('total_pengunjung'))
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/shopee'));
        }
        return view('shopee/tambah', $data);
    }

    public function hapus($id)
    {
        $this->db->table('umum_shopee')->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/shopee'));
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
        // $this->db->table('umum_shopee')->truncate();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $tgl = $row[0];
            $penjualan = $row[1];
            $pesanan = $row[2];
            $jual_perpesanan = $row[3];
            $produk_dilihat = $row[4];
            $total_pengunjung = $row[5];

            // $cekNis = $this->db->table('siswa')->getWhere(['Nis' => $Nis])->getResult();

            $cekNis = $this->db->table('umum_shopee')->where('id', 0)->get()->getResultArray();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red">Data Gagal di Import NIS ada yang sama</b>');
            } else {
                if (($tgl == '') and ($total_pengunjung == '')) {
                    session()->setFlashdata('pesan', 'Berhasil import excel');

                    return redirect()->to('/shopee');
                }
                $simpandata = [
                    'tgl' => $tgl,
                    'penjualan' => $penjualan,
                    'pesanan' => $pesanan,
                    'jual_perpesanan' => $jual_perpesanan,
                    'produk_dilihat' => $produk_dilihat,
                    'total_pengunjung' => $total_pengunjung
                ];

                // dd($simpandata);
                $this->db->table('umum_shopee')->insert($simpandata);
            }
        }


        return redirect()->to('/shopee');
    }
}
