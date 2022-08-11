<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class usercontroller extends BaseController
{
    
    public function index()
    {
        $data['activeTab'] = "dashboard";
        return view('user/pages/dashboard/index', $data);
    }
}
