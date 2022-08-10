<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TryOutController extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "tryout";
    }
    public function index()
    {
        return view('admin/pages/tryout/index', ['pagedata'=>$this->pagedata]);
    }
}
