<?php

namespace App\Controllers;

use Dompdf\Options;
use TCPDF;

class Tokped extends BaseController
{
    public function index()
    {
        $data['menu'] = 'Data Tokopedia';
        $data['tambah'] = 'tokped';
        $data['umum_tokped'] = $this->db->table('umum_tokped')->get()->getResultArray();
        return view('tokped/index', $data);
    }

    public function tambah()
    {
        $data['menu'] = 'Data Tokped';
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('umum_tokped')
                ->set('tgl', $this->request->getVar('tgl'))
                ->set('pendapatan_bersih', $this->request->getVar('pendapatan_bersih'))
                ->set('produk_dilihat', $this->request->getVar('produk_dilihat'))
                ->set('pesanan_baru', $this->request->getVar('pesanan_baru'))
                ->set('pendapatan_bersih_bebas_ongkir', $this->request->getVar('pendapatan_bersih_bebas_ongkir'))
                ->set('pendapatan_bersih_bukan_bebas_ongkir', $this->request->getVar('pendapatan_bersih_bukan_bebas_ongkir'))
                ->set('pesanan_bebas_ongkir', $this->request->getVar('pesanan_bebas_ongkir'))
                ->set('pesanan_bukan_bebas_ongkir', $this->request->getVar('pesanan_bukan_bebas_ongkir'))
                ->set('pesanan_batal', $this->request->getVar('pesanan_batal'))
                ->set('pesanan_batal_otomatis', $this->request->getVar('pesanan_batal_otomatis'))
                ->set('pesanan_batal_seller', $this->request->getVar('pesanan_batal_seller'))
                ->set('pesanan_batal_pembeli', $this->request->getVar('pesanan_batal_pembeli'))
                ->set('estimasi_pengeluaran', $this->request->getVar('estimasi_pengeluaran'))
                ->set('estimasi_pengeluaran_layanan', $this->request->getVar('estimasi_pengeluaran_layanan'))
                ->set('estimasi_pengeluaran_bebas_ongkir', $this->request->getVar('estimasi_pengeluaran_bebas_ongkir'))
                ->set('estimasi_pengeluaran_topads', $this->request->getVar('estimasi_pengeluaran_topads'))
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/tokped'));
        }
        return view('tokped/tambah', $data);
    }

    public function hapus($id)
    {
        $this->db->table('umum_tokped')->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/tokped'));
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
        // $this->db->table('umum_tokped')->truncate();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $tgl = $row[0];
            $pendapatan_bersih = $row[1];
            $produk_dilihat = $row[2];
            $pesanan_baru = $row[3];
            $pendapatan_bersih_bebas_ongkir = $row[4];
            $pendapatan_bersih_bukan_bebas_ongkir = $row[5];
            $pesanan_bebas_ongkir = $row[6];
            $pesanan_bukan_bebas_ongkir = $row[7];
            $pesanan_batal = $row[8];
            $pesanan_batal_otomatis = $row[9];
            $pesanan_batal_seller = $row[10];
            $pesanan_batal_pembeli = $row[11];
            $estimasi_pengeluaran = $row[12];
            $estimasi_pengeluaran_layanan = $row[13];
            $estimasi_pengeluaran_bebas_ongkir = $row[14];
            $estimasi_pengeluaran_topads = $row[15];

            // $cekNis = $this->db->table('siswa')->getWhere(['Nis' => $Nis])->getResult();

            $cekNis = $this->db->table('umum_tokped')->where('id', 0)->get()->getResultArray();

            if (count($cekNis) > 0) {
                session()->setFlashdata('message', '<b style="color:red">Data Gagal di Import NIS ada yang sama</b>');
            } else {
                if (($tgl == '') and ($estimasi_pengeluaran_topads == '')) {
                    session()->setFlashdata('pesan', 'Berhasil import excel');

                    return redirect()->to('/tokped');
                }
                $simpandata = [
                    'tgl' => $tgl,
                    'pendapatan_bersih' => $pendapatan_bersih,
                    'produk_dilihat' => $produk_dilihat,
                    'pesanan_baru' => $pesanan_baru,
                    'pendapatan_bersih_bebas_ongkir' => $pendapatan_bersih_bebas_ongkir,
                    'pendapatan_bersih_bukan_bebas_ongkir' => $pendapatan_bersih_bukan_bebas_ongkir,
                    'pesanan_bebas_ongkir' => $pesanan_bebas_ongkir,
                    'pesanan_bukan_bebas_ongkir' => $pesanan_bukan_bebas_ongkir,
                    'pesanan_batal' => $pesanan_batal,
                    'pesanan_batal_otomatis' => $pesanan_batal_otomatis,
                    'pesanan_batal_seller' => $pesanan_batal_seller,
                    'pesanan_batal_pembeli' => $pesanan_batal_pembeli,
                    'estimasi_pengeluaran' => $estimasi_pengeluaran,
                    'estimasi_pengeluaran_layanan' => $estimasi_pengeluaran_layanan,
                    'estimasi_pengeluaran_bebas_ongkir' => $estimasi_pengeluaran_bebas_ongkir,
                    'estimasi_pengeluaran_topads' => $estimasi_pengeluaran_topads
                ];

                // dd($simpandata);
                $this->db->table('umum_tokped')->insert($simpandata);
            }
        }


        return redirect()->to('/tokped');
    }
}
