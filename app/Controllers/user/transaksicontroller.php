<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
// use App\Models\; // model diamond_transaction
use App\Models\StudentModel;

class transaksicontroller extends BaseController
{
    public $pagedata;
    public $encrypter;
    public $tests_model;
    public $paket_diamond_model;
    public function __construct()
    {
        $this->paket_diamond_model = new \App\Models\Admin\PaketDiamondModel();
        $this->tests_model = new \App\Models\TestModel();
        $this->encrypter = \Config\Services::encrypter();
        $this->pagedata['activeTab'] = "transaksi";
        $this->pagedata['title'] = "Pembelian - Neo Edukasi";
    }
    public function index()
    {
        $this->pagedata['tests'] =  $this->tests_model->findAll();
        $this->pagedata['paketDiamond'] =  $this->paket_diamond_model->findAll();
        return view('user/pages/transaksi/index', ['data' => $this->pagedata]);
    }
}
