<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\StudentModel;

class profilcontroller extends BaseController
{
    public $encrypter;
    public $StudentModel;
    public $pagedata;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "profil";
        $this->pagedata['title'] = "Menu Profile - Neo Edukasi";
        $this->encrypter = \Config\Services::encrypter();
    }
    public function index()
    {
        $this->StudentModel = new StudentModel();
        $data = $this->StudentModel->profile($this->encrypter->decrypt(base64_decode(session()->get('id'))));
        return view('user/pages/profile/index', ['data' => $this->pagedata, 'userData' => $data]);
    }
}
