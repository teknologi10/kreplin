<?php

namespace App\Controllers;

use Dompdf\Options;
use TCPDF;

class Admin extends BaseController
{
    public function index()
    {
        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        if ($this->request->getVar('submit')) {
            $lhp = $this->db->table('lhp')
                ->select('sum(ra_pro) as ra, sum(ri_pro) as ri, tgl_produksi')
                ->where('month(tgl_produksi)', $bulan)
                ->where('year(tgl_produksi)', $tahun)
                ->groupBy('tgl_produksi')
                ->get()->getResultArray();
            $date = $tahun . '-' . $bulan . '-' . '01';
        } else {
            $lhp = $this->db->table('lhp')
                ->select('sum(ra_pro) as ra, sum(ri_pro) as ri, tgl_produksi')
                ->where('month(tgl_produksi)', date('m'))
                ->groupBy('tgl_produksi')
                ->get()->getResultArray();
            $date = date('Y-m-d');
        }
        $data['tahun'] = $this->db->table('lhp')
            ->select('year(tgl_produksi) as tahun')
            ->groupBy('year(tgl_produksi)')
            ->get()->getResultArray();
        $data['lhp'] = $lhp;
        $data['date'] = $date;
        // dd($data);
        return view('admin/body', $data);
    }

    public function user()
    {
        $user = $this->db->table('user')->get()->getResultArray();
        $data['user'] = $user;
        return view('admin/user', $data);
    }

    public function tambah_user()
    {
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('user')
                ->set('nama', $this->request->getVar('nama'))
                ->set('username', $this->request->getVar('username'))
                ->set('password', $this->request->getVar('password'))
                ->set('bagian', $this->request->getVar('bagian'))
                ->set('level', $this->request->getVar('level'))
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/admin/user'));
        }
        $data['bagian'] = $this->db->table('bagian')->get()->getResultArray();
        $data['level'] = $this->db->table('level')->get()->getResultArray();
        return view('admin/tambah_user', $data);
    }

    public function edit_user($id)
    {
        $user = $this->db->table('user')->where('id', $id)->get()->getRowArray();
        $data['user'] = $user;
        $data['bagian'] = $this->db->table('bagian')->get()->getResultArray();
        $data['level'] = $this->db->table('level')->get()->getResultArray();
        if ($this->request->getVar()) {
            // dd($this->request->getVar());
            $this->db->table('user')
                ->set('nama', $this->request->getVar('nama'))
                ->set('username', $this->request->getVar('username'))
                ->set('password', $this->request->getVar('password'))
                ->set('bagian', $this->request->getVar('bagian'))
                ->set('level', $this->request->getVar('level'))
                ->where('id', $id)
                ->update();
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
            return redirect()->to(base_url('/admin/user'));
        }

        return view('admin/edit_user', $data);
    }

    public function hapus_user($id)
    {
        $this->db->table('user')->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/admin/user'));
    }

    public function pmo()
    {
        $pmo = $this->db->table('pmo')->get()->getResultArray();
        $data['pmo'] = $pmo;
        return view('admin/pmo', $data);
    }

    public function tambah_pmo()
    {
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('pmo')
                ->set('tgl_pmo', $this->request->getVar('tgl'))
                ->set('area', $this->request->getVar('area'))
                ->set('no_pmo', $this->request->getVar('nopmo'))
                ->set('nama_pelanggan', $this->request->getVar('pelanggan'))
                ->set('no_sales', $this->request->getVar('noorder'))
                ->set('nama_proyek', $this->request->getVar('proyek'))
                ->set('ket', $this->request->getVar('ket'))
                ->set('plant', $this->request->getVar('plant'))
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/admin/pmo'));
        }

        return view('admin/tambah_pmo');
    }

    public function edit_pmo($id)
    {
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('pmo')
                ->set('tgl_pmo', $this->request->getVar('tgl'))
                ->set('area', $this->request->getVar('area'))
                ->set('no_pmo', $this->request->getVar('nopmo'))
                ->set('nama_pelanggan', $this->request->getVar('pelanggan'))
                ->set('no_sales', $this->request->getVar('noorder'))
                ->set('nama_proyek', $this->request->getVar('proyek'))
                ->set('ket', $this->request->getVar('ket'))
                ->set('plant', $this->request->getVar('plant'))
                ->where('id', $id)
                ->update();
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
            return redirect()->to(base_url('/admin/pmo'));
        }
        $pmo = $this->db->table('pmo')->where('id', $id)->get()->getRowArray();
        $data['pmo'] = $pmo;
        $data['id'] = $id;
        return view('admin/edit_pmo', $data);
    }

    public function hapus_pmo($id)
    {
        $this->db->table('pmo')->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/admin/pmo'));
    }

    public function tambah_item_pmo($id)
    {
        $data['id'] = $id;
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('item_pmo')
                ->set('kode_material', $this->request->getVar('kode'))
                ->set('jenis_produk', $this->request->getVar('jenis'))
                ->set('tipe_produk', $this->request->getVar('tipe'))
                ->set('satuan', $this->request->getVar('satuan'))
                ->set('volume', $this->request->getVar('volume'))
                ->set('ket', $this->request->getVar('ket'))
                ->set('id_pmo', $id)
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/admin/detail_pmo/' . $id));
        }
        $data['jenis'] = $this->db->table('jenis_produk')->get()->getResultArray();
        $data['satuan'] = $this->db->table('satuan')->get()->getResultArray();
        return view('admin/tambah_item_pmo', $data);
    }

    public function edit_item_pmo($pmo, $item)
    {
        $data['pmo'] = $pmo;
        $data['item'] = $item;
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $this->db->table('item_pmo')
                ->set('kode_material', $this->request->getVar('kode'))
                ->set('jenis_produk', $this->request->getVar('jenis'))
                ->set('tipe_produk', $this->request->getVar('tipe'))
                ->set('satuan', $this->request->getVar('satuan'))
                ->set('volume', $this->request->getVar('volume'))
                ->set('ket', $this->request->getVar('ket'))
                ->where('id', $item)
                ->update();
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
            return redirect()->to(base_url('/admin/detail_pmo/' . $pmo));
        }
        $data['item_pmo'] = $this->db->table('item_pmo')->where('id', $item)->get()->getRowArray();
        $data['jenis'] = $this->db->table('jenis_produk')->get()->getResultArray();
        $data['satuan'] = $this->db->table('satuan')->get()->getResultArray();
        return view('admin/edit_item_pmo', $data);
    }

    public function hapus_item_pmo($pmo, $item)
    {
        $this->db->table('item_pmo')->where('id', $item)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/admin/detail_pmo/' . $pmo));
    }

    public function detail_pmo($id)
    {
        $pmo = $this->db->table('pmo')->where('id', $id)->get()->getRowArray();
        $item = $this->db->table('item_pmo')->where('id_pmo', $id)->get()->getResultArray();
        $data['pmo'] = $pmo;
        $data['item'] = $item;
        return view('admin/detail_pmo', $data);
    }

    public function cari_item()
    {
        $kode = $this->request->getPost('kode_material');
        $item = $this->db->table('item_pmo')->where('kode_material', $kode)->get()->getResultArray();
        foreach ($item as $rt) :
            $w[] = [
                "jenis" => $rt['jenis_produk'],
                "tipe" => $rt['tipe_produk'],
                "satuan" => $rt['satuan'],
                "status" => "true",
            ];

        endforeach;
        echo json_encode($w);
    }

    public function lhp()
    {
        $lhp = $this->db->table('lhp')->get()->getResultArray();
        $data['lhp'] = $lhp;
        return view('admin/lhp', $data);
    }

    public function tambah_lhp()
    {
        if ($this->request->getVar('submit')) {
            // dd($this->request->getVar());
            $kode = $this->request->getVar('kode');
            $itempmo = $this->db->table('item_pmo')->where('kode_material', $kode)->get()->getRowArray();
            $id = $itempmo['id_pmo'];
            $volume = $itempmo['volume'];
            $pmo = $this->db->table('pmo')->where('id', $id)->get()->getRowArray();
            $plant = $pmo['plant'];
            $no_sales = $pmo['no_sales'];
            $proyek = $pmo['nama_proyek'];
            $lhp = $this->db->table('lhp')->where('kode_material', $kode)->get()->getRowArray();

            if (empty($lhp)) {
                $kumulasi = $this->request->getVar('riprod');
            } else if (!empty($lhp)) {
                $totalri = $this->db->table('lhp')->select('sum(ri_pro) as kum_tot')->where('kode_material', $kode)->get()->getRowArray();
                $kumulasi = $totalri['kum_tot'] + $this->request->getVar('riprod');
            }

            $sisa = $volume - $kumulasi;
            // dd($sisa);
            $this->db->table('lhp')
                ->set('tgl_produksi', $this->request->getVar('tgl'))
                ->set('plant', $plant)
                ->set('no_sales', $no_sales)
                ->set('proyek', $proyek)
                ->set('kode_material', $this->request->getVar('kode'))
                ->set('jenis_produk', $this->request->getVar('jenis'))
                ->set('tipe_produk', $this->request->getVar('tipe'))
                ->set('volume', $volume)
                ->set('ra_pro', $this->request->getVar('raprod'))
                ->set('ri_pro', $this->request->getVar('riprod'))
                ->set('reject', $this->request->getVar('reject'))
                ->set('kumulasi', $kumulasi)
                ->set('sisa_pro', $sisa)
                ->set('ket', $this->request->getVar('ket'))
                ->insert();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/admin/lhp'));
        }
        $data['kode'] = $this->db->table('item_pmo')->get()->getResultArray();
        return view('admin/tambah_lhp', $data);
    }

    public function edit_lhp($id)
    {
        if ($this->request->getVar('submit')) {
            // dd($sisa);
            $this->db->table('lhp')
                ->set('tgl_produksi', $this->request->getVar('tgl'))
                ->set('kode_material', $this->request->getVar('kode'))
                ->set('jenis_produk', $this->request->getVar('jenis'))
                ->set('tipe_produk', $this->request->getVar('tipe'))
                ->set('ra_pro', $this->request->getVar('raprod'))
                ->set('ri_pro', $this->request->getVar('riprod'))
                ->set('reject', $this->request->getVar('reject'))
                ->set('ket', $this->request->getVar('ket'))
                ->where('id', $id)
                ->update();
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
            return redirect()->to(base_url('/admin/lhp'));
        }
        $data['lhp'] = $this->db->table('lhp')->where('id', $id)->get()->getRowArray();
        $data['id'] = $id;
        return view('admin/edit_lhp', $data);
    }

    public function hapus_lhp($id)
    {
        $this->db->table('lhp')->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('/admin/lhp'));
    }

    public function lap_pmo()
    {
        if ($this->request->getVar('awal')) {
            // dd($this->request->getVar());
            $awal = $this->request->getVar('awal');
            $akhir = $this->request->getVar('akhir');
            $pmo = $this->db->table('pmo')->where("tgl_pmo BETWEEN '$awal' AND '$akhir'")->join('item_pmo', 'item_pmo.id_pmo=pmo.id')->get()->getResultArray();
        } else {
            $pmo = $this->db->table('pmo')->join('item_pmo', 'item_pmo.id_pmo=pmo.id')->get()->getResultArray();
        }

        $data['pmo'] = $pmo;
        // dd($data);
        return view('admin/lap_pmo', $data);
    }

    public function print_lap_pmo()
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new \Dompdf\Dompdf($options);
        if ($this->request->getVar('awal')) {
            // dd($this->request->getVar());
            $awal = $this->request->getVar('awal');
            $akhir = $this->request->getVar('akhir');
            $pmo = $this->db->table('pmo')->where("tgl_pmo BETWEEN '$awal' AND '$akhir'")->join('item_pmo', 'item_pmo.id_pmo=pmo.id')->get()->getResultArray();
        } else {
            $pmo = $this->db->table('pmo')->join('item_pmo', 'item_pmo.id_pmo=pmo.id')->get()->getResultArray();
        }

        $data['pmo'] = $pmo;
        $html = view('admin/print_lap_pmo', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('a4', 'landscape');
        $dompdf->render();
        // $dompdf->stream();
        $dompdf->stream('pmo', array(
            // "Attachment" => false
            "Attachment" => 0
        ));
    }

    public function print_det_pmo($id)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new \Dompdf\Dompdf($options);

        $item = $this->db->table('pmo')->where('pmo.id', $id)->join('item_pmo', 'item_pmo.id_pmo=pmo.id')->get()->getResultArray();
        $pmo = $this->db->table('pmo')->where('pmo.id', $id)->join('item_pmo', 'item_pmo.id_pmo=pmo.id')->get()->getRowArray();

        $data['item'] = $item;
        $data['pmo'] = $pmo;
        // dd($data);
        $html = view('admin/print_det_pmo', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('a4', 'landscape');
        $dompdf->render();
        // $dompdf->stream();
        $dompdf->stream('pmo', array(
            // "Attachment" => false
            "Attachment" => 0
        ));
    }

    public function lap_lhp()
    {
        if ($this->request->getVar('awal')) {
            // dd($this->request->getVar());
            $awal = $this->request->getVar('awal');
            $akhir = $this->request->getVar('akhir');
            $lhp = $this->db->table('lhp')->where("tgl_produksi BETWEEN '$awal' AND '$akhir'")->get()->getResultArray();
        } else {
            $lhp = $this->db->table('lhp')->get()->getResultArray();
        }

        $data['lhp'] = $lhp;
        return view('admin/lap_lhp', $data);
    }

    public function print_lap_lhp_x()
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new \Dompdf\Dompdf($options);
        if ($this->request->getVar('awal')) {
            // dd($this->request->getVar());
            $awal = $this->request->getVar('awal');
            $akhir = $this->request->getVar('akhir');
            $lhp = $this->db->table('lhp')->where("tgl_produksi BETWEEN '$awal' AND '$akhir'")->get()->getResultArray();
            $total = $this->db->table('lhp')->select('sum(ri_pro) as ri, sum(ra_pro) as ra, sum(reject) as re')->where("tgl_produksi BETWEEN '$awal' AND '$akhir'")->get()->getRowArray();
        } else {
            $lhp = $this->db->table('lhp')->get()->getResultArray();
        }
        $data['lhp'] = $lhp;
        $data['total'] = $total;
        $html = view('admin/print_lap_lhp', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('a4', 'landscape');
        $dompdf->render();
        // $dompdf->stream();
        $dompdf->stream('lhp', array(
            // "Attachment" => false
            "Attachment" => 0
        ));
    }

    public function print_lap_lhp()
    {
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        if ($this->request->getVar('awal')) {
            // dd($this->request->getVar());
            $awal = $this->request->getVar('awal');
            $akhir = $this->request->getVar('akhir');
            $lhp = $this->db->table('lhp')->where("tgl_produksi BETWEEN '$awal' AND '$akhir'")->get()->getResultArray();
            $total = $this->db->table('lhp')->select('sum(ri_pro) as ri, sum(ra_pro) as ra, sum(reject) as re')->where("tgl_produksi BETWEEN '$awal' AND '$akhir'")->get()->getRowArray();
        } else {
            $lhp = $this->db->table('lhp')->get()->getResultArray();
        }
        $data['lhp'] = $lhp;
        $data['total'] = $total;
        $html = view('admin/print_lap_lhp', $data);
        // $html = view('cetak/pdf_rekomendasi', $data);

        // $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

        $pdf->SetCreator('Fatma');
        $pdf->SetAuthor('Fatma');
        $pdf->SetTitle('LHP');
        $pdf->SetSubject('LHP');

        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set margins
        $pdf->SetMargins('10', '10', '10');
        // $pdf->SetHeaderMargin('10');
        $pdf->SetFooterMargin('15');

        // set auto page breaks
        $pdf->SetAutoPageBreak(true, '15');

        // set image scale factor
        // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf->setPrintHeader(false);
        // $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, false, false, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('lhp.pdf', 'I');
    }

    public function print_pro_lhp($id)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new \Dompdf\Dompdf($options);

        $lhp = $this->db->table('lhp')->where('kode_material', $id)->get()->getResultArray();
        $total = $this->db->table('lhp')->select('sum(ri_pro) as ri, sum(ra_pro) as ra, sum(reject) as re')
            ->where('kode_material', $id)
            ->get()->getRowArray();

        $data['lhp'] = $lhp;
        $data['total'] = $total;
        $html = view('admin/print_lap_lhp', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('a4', 'landscape');
        $dompdf->render();
        // $dompdf->stream();
        $dompdf->stream('lhp', array(
            // "Attachment" => false
            "Attachment" => 0
        ));
    }
}
