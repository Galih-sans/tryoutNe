<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public $pagedata;
    public $role_model;
    public $data;
    public $encrypter;

    public function __construct()
    {
        $this->pagedata['activeTab'] = "dashboard";
        $this->pagedata['title'] = "Dashboard Admin - Neo Edukasi";
        $this->role_model = new \App\Models\Admin\RoleModel();
        $this->encrypter = \Config\Services::encrypter();
    }
    public function index()
    {
        // kirim role where id = session role id
        $id = $this->encrypter->decrypt(base64_decode(session()->get('role')));
        $this->data['role'] = $this->role_model->where('id', $id)->findAll();
        return view('admin/pages/dashboard/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
}
