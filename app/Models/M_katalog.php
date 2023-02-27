<?php

namespace App\Models;

use CodeIgniter\Model;
 

class KatalogModel extends Model
{
    public function tampil()
    {
        return $this->db
            ->table('katalog')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function insertdata($data)
    {
        $this->db->table('jabatan')->insert($data);
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
}
