<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

     function insert($data) {
        $this->db->insert('umkm', $data);
        return $this->db->insert_id();
        // mengembalikan ID yang barusan diinput
    }

         function insert2($data) {
        $this->db->insert('admins', $data);
        return $this->db->insert_id();
        // mengembalikan ID yang barusan diinput
    }

    public function login($username, $password) {

        $this->db->where("username", $username);
        $jml_data = $this->db->get("admins")->num_rows();

        if ($jml_data !== 1) {
            return false;
        } else {
            $this->db->where("admins.username", $username);
            $data_login = $this->db->get("admins")->row_array();

            if (password_verify($password, $data_login['password'])) {
                return [
                    'userid'=>$data_login['id'], 
                    'username'=>$data_login['username'], 
                    'level'=>$data_login['level']
                ];
            } else {
                return false;
            }
        }
    }
    
    public function add_aktifitas($username, $keterangan) {
        $this->load->library('user_agent');
        
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser().' '.$this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }
        
        $ua = "UA: ".$agent.", OS: ".$this->agent->platform();
        $ip = $this->input->ip_address();
        $waktu = date('Y-m-d H:i:s');
        
        $insert = $this->db->insert('aktifitas', [
            'username'=>$username,
            'waktu'=>$waktu,
            'keterangan'=>$keterangan,
            'ip'=>$ip,
            'ua'=>$ua
        ]);
        
        return $insert;
    }

}