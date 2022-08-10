<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class testcontroller extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "test";
    }
    public function index()
    {
        return view('user/pages/test', ['pagedata'=>$this->pagedata]);
    }
}
