<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        if (session()->get('isAdmin') != true) {
            echo 'Access denied';
            exit;
        }
        $this->pagedata['activeTab'] = "dashboard";
        $this->pagedata['title'] = "Dashboard Admin";
        $this->banksoal_model = new \App\Models\Admin\BankSoalModel();
    }
    public function index()
    {
        return view('admin/pages/dashboard/index', ['pagedata'=> $this->pagedata]);
    }
}
