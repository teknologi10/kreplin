<?php

namespace App\Models;

use CodeIgniter\Model;

class KatalogModel extends Model
{
    protected $table = 'katalog';
    protected $allowedFields = ['nama', 'kategori', 'harga', 'harga_old', 'keterangan', 'keterangan2', 'gambar', 'gambar2', 'gambar3', 'berat', 'tgl', 'stok', 'id_penjual'];

    public function tampil($by_kategori = "", $by_toko = "", $by_katakunci = "")
    {

        $get_katalog1 = $this->db->table('katalog');
        if (!empty($by_kategori)) {
            $get_katalog1->where('katalog.kategori', $by_kategori);
        }
        if (!empty($by_toko)) {
            $get_katalog1->where('katalog.id_penjual', $by_toko);
        }
        if (!empty($by_katakunci)) {
            $get_katalog1->like('katalog.nama', $by_katakunci);
            $get_katalog1->orLike('katalog.keterangan', $by_katakunci);
        }
        $get_katalog1->join('kategori', 'kategori.id_kategori = katalog.kategori');
        $get_katalog1->join('transaksi', 'transaksi.id_produk = katalog.id', 'left');
        $get_katalog1->groupBy('katalog.id', 'DESC');
        $get_katalog1->orderBy('id', 'DESC');
        $get_katalog = $get_katalog1->get()->getResultArray();

        // echo $this->db->getLastQuery();
        // echo $by_kategori;
        // exit;

        return $get_katalog;
    }

    public function tampilseller($by_katakunci = "")
    {

        if (!empty($by_katakunci)) {
            return $this->db
                ->table('penjual')
                ->join('katalog', 'katalog.id_penjual=penjual.id_toko', 'left')
                ->join('transaksi', 'transaksi.id_produk=katalog.id', 'left')
                ->select('penjual.*, SUM(jumlah_produk) AS jumlah, AVG(transaksi.rating) AS rating')
                ->like('nama_toko', $by_katakunci)
                ->groupby('id_toko')
                ->orderBy('id_toko', 'ASC')
                ->get()
                ->getResultArray();
        } else {
            return $this->db
                ->table('penjual')
                ->join('katalog', 'katalog.id_penjual=penjual.id_toko', 'left')
                ->join('transaksi', 'transaksi.id_produk=katalog.id', 'left')
                ->select('penjual.*, SUM(jumlah_produk) AS jumlah, AVG(transaksi.rating) AS rating')
                ->groupby('id_toko')
                ->orderBy('id_toko', 'ASC')
                ->get()
                ->getResultArray();
        }
    }

    public function tampil10()
    {
        return $this->db
            ->table('katalog')
            ->join('kategori', 'kategori.id_kategori=katalog.kategori')
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();
    }

    public function tampil11()
    {
        return $this->db
            ->table('katalog')
            ->join('kategori', 'kategori.id_kategori=katalog.kategori')
            ->join('transaksi', 'transaksi.id_produk=katalog.id', 'left')
            ->select('katalog.*, kategori.nama_kategori, AVG(transaksi.rating) AS rating')
            ->where('keterangan2', 'new')
            ->groupBy('katalog.id')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function insertdata($data)
    {
        $this->db->table('katalog')->insert($data);
    }

    public function insertdatatransaksi($data)
    {

        $this->db->table('transaksi')->insert($data);
        // echo $this->db->getLastQuery();
    }

    public function insertdatatransaksi_keranjang($data)
    {

        $this->db->table('transaksi_keranjang')->insert($data);
        // echo $this->db->getLastQuery();
    }



    public function insertdata_store($data)
    {
        $this->db->table('penjual')->insert($data);
    }

    public function updatedata_store($data, $id)
    {
        $this->db->table('penjual')->where('id_toko', $id)->update($data);
    }

    public function updatedatatransaksi_keranjang($id_produk, $datas) // asmara
    {
        $session = session();
        $this->db->table('keranjang')
            ->where('id_produk', $id_produk)
            ->where('selesai', 0)
            ->where('id_pembeli', session()->get('id'))
            ->update($datas);
    }

    public function hapustoko($data)
    {
        $this->db
            ->table('penjual')
            ->where('id_toko', $data['id_toko'])
            ->delete($data);
    }

    public function hapuskeranjang($data)
    {
        $this->db
            ->table('transaksi_v')
            ->where('id', $data['id'])
            ->delete($data);
    }



    public function tampil_produk($id)
    {
        return $this->db
            ->table('katalog')
            ->join('kategori', 'kategori.id_kategori=katalog.kategori')
            ->join('transaksi', 'transaksi.id_produk=katalog.id', 'left')
            ->select('katalog.*, kategori.nama_kategori, AVG(transaksi.rating) AS rating')
            ->where('id_penjual', $id)
            ->groupBy('katalog.id')
            ->get()
            ->getResultArray();
    }




    public function tampilkeranjang()

    {

        $session = session();
        return $this->db

            ->table('keranjang')
            ->select('katalog.*,keranjang.id as aidi,keranjang.quantity as quantity,keranjang.id_produk as id_produk,keranjang.id_pembeli as id_pembeli')
            ->join('katalog', 'katalog.id=keranjang.id_produk')
            ->where('keranjang.id_pembeli', $session->get('id'))
            ->orderBy('id_produk', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tampilorder()

    {

        $session = session();
        return $this->db

            ->table('keranjang')
            ->select('katalog.*,keranjang.id as aidi,keranjang.id_produk as id_produk,keranjang.id_pembeli as id_pembeli')
            ->join('katalog', 'katalog.id=keranjang.id_produk')
            ->where('keranjang.id_pembeli', $session->get('id'))
            ->orderBy('id_produk', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tampil_store($id)
    {
        return $this->db
            ->table('penjual')
            ->where('id_toko', $id)
            ->get()
            ->getResultArray();
    }

    public function tampilkategori()
    {
        return $this->db
            ->table('kategori')
            ->join('katalog', 'kategori.id_kategori = katalog.kategori')
            ->orderBy('id_kategori', 'ASC')
            ->select('kategori.*, COUNT(katalog.id) jumlah')
            ->groupBy('kategori.id_kategori')
            ->get()
            ->getResultArray();
    }

    public function tampilkategori_all()
    {
        return $this->db
            ->table('kategori')
            ->orderBy('id_kategori', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function tampilkategori1()
    {
        return $this->db
            ->table('kategori')
            ->where('id_kategori<', 6)
            ->orderBy('id_kategori', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function tampilkategori2()
    {
        return $this->db
            ->table('kategori')
            ->where('id_kategori<', 11)
            ->limit(5)
            ->orderBy('id_kategori', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tampilkategori3()
    {
        return $this->db
            ->table('kategori')
            ->where('id_kategori>', 10)
            ->orderBy('id_kategori', 'DESC')
            ->get()
            ->getResultArray();
    }


    public function tampil_detil_2($id)
    {
        return $this->db

            ->table('transaksi')
            ->join('katalog', 'katalog.id=transaksi.id_produk')
            ->join('kategori', 'kategori.id_kategori=katalog.kategori')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->where('id_transaksi', $id)
            ->orderBy('id_transaksi', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function nota_keranjang_header($id)
    {
        return $this->db

            ->table('transaksi_v')
            ->select('transaksi_v.*, katalog.harga, katalog.harga_old, penjual.nama_toko, penjual.alamat_toko, SUM(jml_beli*harga) as total, tanggal')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            // ->join('history', ('history.id_transaksi=transaksi_v.id') and ('history.status=transaksi_v.status'))
            // ->join('status', 'status.id=transaksi_v.status')
            ->join('history', 'history.id_transaksi=transaksi_v.id', 'left')
            ->where('transaksi_v.invoice', $id)
            // ->groupBy('transaksi_v.invoice', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function nota_keranjang_body($id)
    {
        return $this->db

            ->table('transaksi_v')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->where('transaksi_v.invoice', $id)
            // ->groupBy('id_transaksikeranjang', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tampil_detil($id)
    {
        return $this->db
            ->table('katalog')
            ->join('kategori', 'kategori.id_kategori=katalog.kategori')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->where('id', $id)
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function detail_keranjang($id_transaksikeranjang)
    {
        return $this->db
            ->table('transaksi_keranjang')
            ->join('keranjang', 'keranjang.id_transaksi=transaksi_keranjang.id_uniq')
            ->join('katalog', 'katalog.id=keranjang.id_produk')
            ->where('id_transaksikeranjang', $id_transaksikeranjang)
            ->orderBy('id_transaksikeranjang', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function tampil_seller_detil($id)
    {
        return $this->db
            ->table('penjual')
            ->where('id_toko', $id)
            ->orderBy('id_toko', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function jml()
    {
        return $this->db->table('katalog')->countAll();
    }

    public function jmlkeranjang()
    {

        // ->where('keranjang.id_pembeli', $session->get('id'))

        $session = session();
        return $this->db
            ->table('transaksi_v')
            ->select('katalog.id')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->where('transaksi_v.id_pembeli', $session->get('id'))
            ->where('transaksi_v.status', 2)
            // ->groupBy('katalog.id_penjual')
            ->countAllResults();

        // 

        // $update = $this->db->query("SELECT COUNT(katalog.id) FROM `keranjang` JOIN katalog ON katalog.id = keranjang.id_produk WHERE keranjang.id_pembeli = 1");
        // return $update;


    }

    public function jmlpesanan()
    {

        // ->where('keranjang.id_pembeli', $session->get('id'))
        $session = session();
        return $this->db
            ->table('transaksi_v')
            ->select('transaksi_v.id')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->where('transaksi_v.id_pembeli', $session->get('id'))
            ->where('status >', '2')
            // ->groupBy('invoice')
            ->countAllResults();

        // 

        // $update = $this->db->query("SELECT COUNT(katalog.id) FROM `keranjang` JOIN katalog ON katalog.id = keranjang.id_produk WHERE keranjang.id_pembeli = 1");
        // return $update;


    }

    public function jmlpesanan_keranjang()


    {
        return $this->db
            ->table('transaksi_keranjang')
            ->join('keranjang', 'keranjang.id_transaksi=transaksi_keranjang.id_uniq')
            ->orderBy('id_transaksikeranjang', 'DESC')
            ->countAllResults();
    }




    public function editdata($data)
    {
        $this->db
            ->table('jabatan')
            ->where('id_jabatan', $data['id_jabatan'])
            ->update($data);
    }
    public function deletedata($data)
    {
        $this->db
            ->table('jabatan')
            ->where('id_jabatan', $data['id_jabatan'])
            ->delete($data);
    }

    public function edit_produk($id)
    {
        return $this->db
            ->table('katalog')
            ->join('kategori', 'kategori.id_kategori=katalog.kategori')
            ->where('id', $id)
            ->orderBy('id', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function pesanan_saya($id)
    {
        return $this->db
            ->table('transaksi')
            ->join('katalog', 'katalog.id=transaksi.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->where('id_pembeli', $id)
            ->orderBy('id_transaksi', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function get_ulasan_katalog($id)
    {
        return $this->db
            ->table('katalog')
            ->select('rating,review, tanggal_transaksi,admins.nama')
            ->join('transaksi', 'transaksi.id_produk=katalog.id')
            ->join('admins', 'admins.id=transaksi.id_pembeli')
            ->where('katalog.id', $id)
            ->orderBy('tanggal_transaksi', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function get_ulasan($invoice)
    {
        return $this->db
            ->table('transaksi_v')
            ->where('invoice', $invoice)
            ->orderBy('id', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function get_ulasan_keranjang($id)
    {
        return $this->db
            ->table('transaksi_keranjang')
            ->where('id_transaksikeranjang', $id)
            ->orderBy('id_transaksikeranjang', 'DESC')
            ->get()
            ->getRowArray();
    }

    public function insert_ulasan($id_transaksi, $data)
    {

        $this->db->table('transaksi')
            ->where('id_transaksi', $id_transaksi)
            ->update($data);
    }


    public function insert_ulasan_keranjang($id_transaksikeranjang, $data)
    {

        $this->db->table('transaksi_keranjang')
            ->where('id_transaksikeranjang', $id_transaksikeranjang)
            ->update($data);
    }



    public function perToko()
    {
        $session = session();

        $get_per_toko = $this->db->table('transaksi_v')
            ->where('transaksi_v.id_pembeli', $session->get('id'))
            ->where('transaksi_v.status', '2')
            ->join('katalog', 'transaksi_v.id_produk = katalog.id')
            ->join('admins', 'katalog.id_penjual = admins.id')
            ->groupBy('katalog.id_penjual')
            ->select('
                        admins.nama, 
                        admins.id
                    ')
            ->get()->getResultArray();

        $get_cart = $this->db
            ->table('transaksi_v')
            ->select('
                katalog.*,
                transaksi_v.id as aidi,
                transaksi_v.note,
                transaksi_v.jml_beli as quantity,
                transaksi_v.id_produk as id_produk,
                transaksi_v.id_pembeli as id_pembeli
            ')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->where('transaksi_v.id_pembeli', $session->get('id'))
            ->where('transaksi_v.status', '2')
            ->orderBy('id_produk', 'DESC')
            ->get()
            ->getResultArray();

        $tampung = [];

        if (!empty($get_per_toko)) {
            foreach ($get_per_toko as $prt) {
                $idx = $prt['id'];
                $tampung[$idx]['detil_penjual'] = $prt;
            }
        }

        if (!empty($get_cart)) {
            foreach ($get_cart as $crt) {
                $idx = $crt['id_penjual'];
                $tampung[$idx]['detil_cart'][] = $crt;
                if (!empty($tampung[$idx]['subtotal'])) {
                    $tampung[$idx]['subtotal'] += ($crt['harga'] * $crt['quantity']);
                } else {
                    $tampung[$idx]['subtotal'] = ($crt['harga'] * $crt['quantity']);
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

    public function pesanan_pembeli()
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
            ->where('id_pembeli', session()->get('id'))
            ->where('history.status >', 2)
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->join('admins', 'admins.id=transaksi_v.id_pembeli')
            ->join('history', 'history.id_transaksi=transaksi_v.id', 'left')
            ->groupBy('invoice')
            ->select('
                        penjual.nama_toko,
                        penjual.id_toko,
                        history.tanggal,
                        sum(transaksi_v.total) as total,
                        transaksi_v.status,
                        transaksi_v.kode_qris,
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
            ->where('id_pembeli', session()->get('id'))
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

    public function proses_keranjang($id)
    {
        $session = session();

        $get_per_toko = $this->db->table('transaksi_v')
            ->where('transaksi_v.id_pembeli', $session->get('id'))
            ->where('transaksi_v.status', '2')
            ->where('admins.id', $id)
            ->join('katalog', 'transaksi_v.id_produk = katalog.id')
            ->join('admins', 'katalog.id_penjual = admins.id')
            ->groupBy('katalog.id_penjual')
            ->select('
                        admins.nama, 
                        admins.id
                    ')
            ->get()->getResultArray();

        $get_cart = $this->db
            ->table('transaksi_v')
            ->select('
                katalog.*,
                transaksi_v.id as aidi,
                transaksi_v.jml_beli as quantity,
                transaksi_v.id_produk as id_produk,
                transaksi_v.id_pembeli as id_pembeli
            ')
            ->join('katalog', 'katalog.id=transaksi_v.id_produk')
            ->where('transaksi_v.id_pembeli', $session->get('id'))
            ->where('transaksi_v.status', '2')
            ->where('katalog.id_penjual', $id)
            ->orderBy('id_produk', 'DESC')
            ->get()
            ->getResultArray();

        $tampung = [];

        if (!empty($get_per_toko)) {
            foreach ($get_per_toko as $prt) {
                $idx = $prt['id'];
                $tampung[$idx]['detil_penjual'] = $prt;
            }
        }

        if (!empty($get_cart)) {
            foreach ($get_cart as $crt) {
                $idx = $crt['id_penjual'];
                $tampung[$idx]['detil_cart'][] = $crt;
                if (!empty($tampung[$idx]['subtotal'])) {
                    $tampung[$idx]['subtotal'] += ($crt['harga'] * $crt['quantity']);
                } else {
                    $tampung[$idx]['subtotal'] = ($crt['harga'] * $crt['quantity']);
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

    public function pesanan_keranjang_saya()
    {

        $session = session();
        return $this->db
            ->table('transaksi_keranjang')
            ->select('transaksi_keranjang.*, penjual.nama_toko')
            ->join('keranjang', 'keranjang.id_transaksi=transaksi_keranjang.id_uniq')
            ->join('katalog', 'katalog.id=keranjang.id_produk')
            ->join('penjual', 'penjual.id_toko=katalog.id_penjual')
            ->where('id_pembeli_keranjang', session()->get('id'))
            ->groupBy('id_transaksikeranjang')
            ->orderBy('id_transaksikeranjang', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function pesanan_keranjang_saya2()
    {

        $session = session();
        return $this->db
            ->table('transaksi_keranjang')
            ->join('keranjang', 'keranjang.id_transaksi=transaksi_keranjang.id_uniq')
            ->join('katalog', 'katalog.id=keranjang.id_produk')
            ->where('id_penjual', session()->get('id'))
            ->where('status', 1)
            ->orderBy('id_transaksikeranjang', 'DESC')
            ->get()
            ->getResultArray();
    }
    public function pesanan_masuk($id)
    {
        return $this->db
            ->table('transaksi')
            ->select('transaksi.*,katalog.*, admins.nama as nama_pembeli,admins.alamat as alamat_pembeli,admins.kontak as hp')
            ->join('katalog', 'katalog.id=transaksi.id_produk')
            ->join('admins', 'admins.id=transaksi.id_pembeli')
            ->where('id_penjual', $id)
            ->where('status', '1')
            ->orderBy('id_transaksi', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function approve($id_transaksi)
    {
        return $this->db
            ->table('transaksi')
            ->where('id_transaksi', $id_transaksi)
            ->set('approval', 1)
            ->update();
    }

    public function approve2($id_transaksikeranjang)
    {
        return $this->db
            ->table('transaksi_keranjang')
            ->where('id_transaksikeranjang', $id_transaksikeranjang)
            ->set('approval', 1)
            ->update();
    }
}
