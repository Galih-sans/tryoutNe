<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class profilcontroller extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "profil";
        $this->pagedata['title'] = "Menu Profile - Neo Edukasi";
    }
    public function index()
    {
        return view('user/pages/profile/index', ['data'=>$this->pagedata]);
    }
}
