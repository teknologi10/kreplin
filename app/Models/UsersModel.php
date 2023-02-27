<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nama', 'username', 'password', 'level', 'aktif'];

    // public function getUserKapanewon()
    // {
    //     return $this->findAll();
    // }

    public function getUserKapanewon($id = false)
    {
        if ($id == false) {
            return $this->db->table('admins')
                ->join('kapanewon', 'kapanewon.id_kapanewon=admins.nama')
                ->get()->getResultArray();
        }
        return $this->where(['id' => $id])->first();
    }

    public function insertregister($data)
    {
        $this->db->table('admins')->insert($data);
    }

     public function insertkeranjang($data)
    {
        $this->db->table('keranjang')->insert($data);
    }

    public function getUserOpd($id = false)
    {
        if ($id == false) {
            return $this->db->table('admins')
                ->join('opd', 'opd.id_opd=admins.nama')
                ->get()->getResultArray();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getKapanewonByadmins()
    {
        $session = session();

        return $this->db->table('admins')
            ->join('kapanewon', 'kapanewon.id_kapanewon=admins.nama')
            ->where('kapanewon.id_kapanewon', $session->get('id_kapanewon'))
            ->get()->getResultArray();
    }

    public function getUserKapanewonByLogin($id = false)
    {
        if ($id == false) {
            return $this->db->table('admins')
                ->join('kapanewon', 'kapanewon.id_kapanewon=admins.nama')
                ->get()->getResultArray();
        }
        return $this->where(['id' => $id])->first();
    }
}
