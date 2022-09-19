<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class performancecontroller extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "performance";
        $this->pagedata['title'] = "Performa Saya - Neo Edukasi";
    }
    public function index()
    {
        return view('user/pages/performance/index', ['data'=>$this->pagedata]);
    }
}
