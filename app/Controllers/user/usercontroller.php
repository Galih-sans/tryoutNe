<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class usercontroller extends BaseController
{
    
    public function index()
    {
        $data['activeTab'] = "test";
        return view('user/pages/test', $data);
    }
}
