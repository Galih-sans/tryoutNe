<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StudentController extends BaseController
{
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['tittle'] = "Neo Edukasi Dashboard";
    }
    public function index()
    {
        return view('user/pages/dashboard', ['pagedata'=> $this->pagedata]);
    }
}
