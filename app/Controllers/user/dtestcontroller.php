<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class dtestcontroller extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "dtest";
        $this->pagedata['title'] = "Detail Test - Neo Edukasi";
    }
    public function index()
    {
        return view('user/pages/detail-test/index', ['data'=>$this->pagedata]);
    }
}
