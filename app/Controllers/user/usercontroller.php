<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class usercontroller extends BaseController
{
    
    public function index()
    {
        $data['title'] = "Dashboard - Neo Edukasi";
        $data['activeTab'] = "dashboard";
        return view('user/pages/dashboard/index', ['data'=>$data]);
    }
}
