<?php

namespace App\Controllers;


class Dashboard extends BaseController
{
    public function index()
    {
        // dd($data);
        return view('dashboard/index');

        // echo view('admin/footer');
    }
}
