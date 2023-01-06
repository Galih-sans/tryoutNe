<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\Admin\ClassModel;

class profilcontroller extends BaseController
{
    public $ClassModel;
    public $encrypter;
    public $StudentModel;
    public $pagedata;
    public function __construct()
    {
        $this->ClassModel = new ClassModel();
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
            $newDateFormat = $this->request->getVar('DOB');
            $newDate = date("Y-m-d", strtotime($newDateFormat));
            $data = [
                'full_name' => $this->request->getVar('full_name'),
                'email' => $this->request->getVar('email'),
                'phone_number' => $this->request->getVar('phone_number'),
                'gender' => $this->request->getVar('gender'),
                'POB' => $this->request->getVar('POB'),
                'DOB' => $newDate,

                'parent_name' => $this->request->getVar('parent_name'),
                'parent_phone' => $this->request->getVar('parent_phone'),

                'class_id' => $this->request->getVar('class')
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
    }
    // mendapatkan jenjang dan kelasnya
    public function get_kelas()
    {
        // $this->StudentModel = new StudentModel();
        if ($this->request->isAJAX()) {
            $level = $this->request->getVar('level');
            $data = $this->ClassModel->get_class_by_level($level);
            $response = array();
            foreach ($data as $data) {
                $response[] = array(
                    "id" => $data->id,
                    "text" => $data->class, PHP_EOL
                );
            }
            echo json_encode($response);
        }
    }
}
