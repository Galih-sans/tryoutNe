<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['tittle'] = "Neo Edukasi - Masuk Atau Daftar";
    }
    public function register()
    {
        return view('user/pages/index');
    }
    public function reset()
    {
        return view('auth/reset');
    }
}
