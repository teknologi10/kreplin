<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class LaporanModel extends Model
{
    protected $table = 'students';
    protected $allowedFields = [
        'tanggal', 
        'divisi', 
        'karyawan',
        'jabatan',
        'kegiatan',
        'premi'
    ];
}