<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class performancecontroller extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "performance";
    }
    public function index()
    {
        return view('user/pages/performance/index', ['pagedata'=>$this->pagedata]);
    }
}
