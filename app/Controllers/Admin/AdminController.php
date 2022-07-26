<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function index()
    {
        $data['activeTab'] = "dashboard";
        return view('admin/pages/dashboard/index', $data);
    }
}
