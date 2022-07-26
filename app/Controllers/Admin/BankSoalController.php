<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class BankSoalController extends BaseController
{
    public function index()
    {
        $data['activeTab'] = "bank-soal";
        return view('admin/pages/bank-soal/index', $data);
    }
}
