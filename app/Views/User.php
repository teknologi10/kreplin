<?php

namespace App\Controllers;


class User extends BaseController
{
    public function admin()
    {
        $data['menu'] = 'Admin';
        $data['admin'] = $this->db->table('user')->get()->getResultArray();
        return view('user/index', $data);
    }
}
