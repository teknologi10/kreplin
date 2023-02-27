<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiKeranjangModel extends Model
{
    protected $table = 'transaksi_keranjang';
    protected $allowedFields = ['id_transaksikeranjang', 'tgl_transaksikeranjang', 'catatan_transaksikeranjang', 'id_uniq'];
}
