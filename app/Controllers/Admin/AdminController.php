<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "dashboard";
        $this->pagedata['title'] = "Dashboard Admin - Neo Edukasi";
    }
    public function index()
    {
        return view('admin/pages/dashboard/index', ['pagedata'=> $this->pagedata]);
    }
}
