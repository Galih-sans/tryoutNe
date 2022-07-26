<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TryOutController extends BaseController
{
    public function index()
    {
        $data['activeTab'] = "tryout";
        return view('admin/pages/tryout/index', $data);
    }
}
