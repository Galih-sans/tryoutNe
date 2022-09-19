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
        $this->pagedata['title'] = "Daftar Test - Neo Edukasi";
        return view('user/pages/test/index', ['data'=>$this->pagedata]);
    }

    public function detail()
    {
        
        $this->pagedata['title'] = "Daftar Test - Neo Edukasi";
        return view('user/pages/test/view', ['data'=>$this->pagedata]);
    }
    public function sheet()
    {
        
        $this->pagedata['title'] = "Daftar Test - Neo Edukasi";
        return view('user/pages/test/sheet', ['data'=>$this->pagedata]);
    }
}
