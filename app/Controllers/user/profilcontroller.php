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
    // update
    public function update()
    {
        $this->StudentModel = new StudentModel();
        if ($this->request->isAJAX()) {
            $id = $this->encrypter->decrypt(base64_decode(session()->get('id')));
            $data = [
                'full_name' => $this->request->getVar('full_name'),
                'email' => $this->request->getVar('email')
            ];
            $query = $this->StudentModel->update($id, $data);
            if ($query) {
                $this->output['success'] = true;
                $this->output['message']  = 'Data Berhasil Diupdate';
            } else {
                $this->output['success'] = false;
                $this->output['message']  = 'Data Gagal Diupdate';
                $this->output['detail']  = $this->StudentModel->errors();
            }

            return json_encode($this->output);
        }
        // $this->StudentModel = new StudentModel();
        // $id =
        //     $this->request->getVar('id');;
        // $full_name = $this->request->getVar('full_name');
        // $email = $this->request->getVar('email');

        // $data = [
        //     'full_name' => $full_name,
        //     'email' => $email
        // ];

        // $this->StudentModel->update($id, $data);
    }
}
