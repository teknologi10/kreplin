<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_vModel extends Model
{
    protected $table = 'transaksi_v';
    protected $allowedFields = ['id', 'id_produk', 'jml_beli', 'total', 'ppn', 'pph', 'pr', 'id_pembeli', 'review', 'rating', 'note', 'invoice', 'status'];

    public function pesanan_masuk()
    {
        $session = session();

        // $this->db->table('transaksi_v')
        //     ->select('transaksi_v.*, admins.nama, history.*')
        //     ->join('katalog', 'katalog.id=transaksi_v.id_produk')
        //     ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
        //     ->join('admins', 'admins.id=transaksi_v.id_pembeli')
        //     ->join('history', 'history.id_transaksi=transaksi_v.id', 'left')
        //     ->where('history.status >', 2)
        //     ->where('id_toko', session()->get('id'))
        //     ->groupBy('invoice')
        //     ->get()->getResultArray();

        $get_per_toko = $this->db->table('transaksi_v')
            ->where('id_toko', session()->get('id'))
            ->where('history.status >', 2)
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->join('admins', 'admins.id=transaksi_v.id_pembeli')
            ->join('history', 'history.id_transaksi=transaksi_v.id', 'left')
            ->groupBy('invoice')
            ->select('
                        admins.nama, 
                        admins.id,
                        history.tanggal,
                        sum(transaksi_v.total) as total,
                        transaksi_v.status,
                        transaksi_v.invoice
                    ')
            ->get()->getResultArray();

        $get_cart = $this->db
            ->table('transaksi_v')
            // ->select('
            //     katalog.*,
            //     transaksi_v.id as aidi,
            //     transaksi_v.note,
            //     transaksi_v.jml_beli as quantity,
            //     transaksi_v.id_produk as id_produk,
            //     transaksi_v.id_pembeli as id_pembeli
            // ')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->join('admins', 'admins.id=transaksi_v.id_pembeli')
            ->where('id_toko', session()->get('id'))
            ->where('transaksi_v.status >', 2)
            // ->orderBy('id_produk', 'DESC')
            // ->groupBy('invoice')
            ->get()
            ->getResultArray();

        $tampung = [];

        if (!empty($get_per_toko)) {
            foreach ($get_per_toko as $prt) {
                $idx = $prt['invoice'];
                $tampung[$idx]['detil_penjual'] = $prt;
            }
        }

        if (!empty($get_cart)) {
            foreach ($get_cart as $crt) {
                $idx = $crt['invoice'];
                $tampung[$idx]['detil_cart'][] = $crt;
                if (!empty($tampung[$idx]['subtotal'])) {
                    $tampung[$idx]['subtotal'] += ($crt['total']);
                } else {
                    $tampung[$idx]['subtotal'] = ($crt['total']);
                }
            }
        }

        return $tampung;

        // return $this->db

        //     ->table('keranjang')
        //     ->select('katalog.*,keranjang.id as aidi,keranjang.quantity as quantity,keranjang.id_produk as id_produk,keranjang.id_pembeli as id_pembeli')
        //     ->join('katalog', 'katalog.id=keranjang.id_produk')
        //     ->where('keranjang.id_pembeli', $session->get('id'))
        //     ->orderBy('id_produk', 'DESC')
        //     ->get()
        //     ->getResultArray();
    }

    public function nota_keranjang_header($invoice)
    {
        return $this->db

            ->table('transaksi_v')
            ->select('transaksi_v.*, katalog.harga, katalog.harga_old, penjual.nama_toko, penjual.alamat_toko, SUM(jml_beli*harga) as total, tanggal, admins.nama, admins.alamat, admins.email, admins.kontak')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            // ->join('history', ('history.id_transaksi=transaksi_v.id') and ('history.status=transaksi_v.status'))
            // ->join('status', 'status.id=transaksi_v.status')
            ->join('history', 'history.id_transaksi=transaksi_v.id', 'left')
            ->join('admins', 'admins.id=transaksi_v.id_pembeli')
            ->where('transaksi_v.invoice', $invoice)
            // ->groupBy('transaksi_v.invoice', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function nota_keranjang_body($invoice)
    {
        return $this->db

            ->table('transaksi_v')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->where('transaksi_v.invoice', $invoice)
            // ->groupBy('id_transaksikeranjang', 'DESC')
            ->get()
            ->getResultArray();
    }
}
