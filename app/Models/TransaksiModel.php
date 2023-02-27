<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['tanggal_transaksi', 'id_produk', 'jumlah_produk', 'status', 'aprroval', 'total', 'id_pembeli', 'rating', 'review', 'kode_invoice', 'note'];
}
