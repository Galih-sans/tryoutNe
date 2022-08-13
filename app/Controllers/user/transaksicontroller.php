<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class transaksicontroller extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "transaksi";
    }
    public function index()
    {
        return view('user/pages/transaksi/index', ['pagedata'=>$this->pagedata]);
    }
}
