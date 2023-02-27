<?php

namespace App\Controllers;


class Laporan extends BaseController
{
    public function index()
    {
        if ($this->request->getVar('submit')) {
            $this->db->table('grafik_temp')->truncate();
            $awal = $this->request->getVar('awal');
            $akhir = $this->request->getVar('akhir');
            $blibli = $this->db->table('umum_blibli')->where('tgl>=', $awal)->where('tgl<=', $akhir)->get()->getResultArray();
            $shopee = $this->db->table('umum_shopee')->where('tgl>=', $awal)->where('tgl<=', $akhir)->get()->getResultArray();
            $tokped = $this->db->table('umum_tokped')->where('tgl>=', $awal)->where('tgl<=', $akhir)->get()->getResultArray();
            // dd($blibli);
            foreach ($blibli as $b) {
                $simpanb = [
                    'tgl' => $b['tgl'],
                    'jual_blibli' => $b['penjualan']
                ];
                // dd($simpanb);
                $this->db->table('grafik_temp')->insert($simpanb);
            }
            foreach ($shopee as $s) {
                $simpans = [
                    'tgl' => $s['tgl'],
                    'jual_shopee' => $s['penjualan']
                ];
                // dd($simpans);
                $this->db->table('grafik_temp')->insert($simpans);
            }
            foreach ($tokped as $t) {
                $simpant = [
                    'tgl' => $t['tgl'],
                    'jual_tokped' => $t['pendapatan_bersih']
                ];
                // dd($simpans);
                $this->db->table('grafik_temp')->insert($simpant);
            }
            $grafik = $this->db->table('grafik_temp')->select('date_format(tgl, "%Y-%m") as periode, sum(jual_blibli) as blibli, sum(jual_shopee) as shopee, sum(jual_tokped) as tokped')
                ->groupBy('periode')->orderBy('periode', 'asc')->get()->getResultArray();
            // dd($grafik);
        } else {
            $grafik = 0;
        }
        $data['grafik'] = $grafik;
        return view('laporan/grafik', $data);

        // echo view('admin/footer');
    }
}
