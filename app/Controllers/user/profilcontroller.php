<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\Admin\ClassModel;
use App\Models\ModelSekolah;

class profilcontroller extends BaseController
{
    public $SchoolModel;
    public $ClassModel;
    public $encrypter;
    public $StudentModel;
    public $pagedata;
    public function __construct()
    {
        $this->SchoolModel = new ModelSekolah();
        $this->ClassModel = new ClassModel();
        $this->pagedata['activeTab'] = "profil";
        $this->pagedata['title'] = "Menu Profile - Neo Edukasi";
        $this->encrypter = \Config\Services::encrypter();
    }
    public function index()
    {
        $this->pagedata['province'] = $this->SchoolModel->get_province();
        $this->StudentModel = new StudentModel();
        $data = $this->StudentModel->profile($this->encrypter->decrypt(base64_decode(session()->get('id'))));
        return view('user/pages/profile/index', ['data' => $this->pagedata, 'userData' => $data]); // return this data as
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
                'parent_email' => $this->request->getVar('parent_email'),

                'school' => $this->request->getVar('school'),
                'class_id' => $this->request->getVar('class'),
            ];
            $query = $this->StudentModel->update($id, $data);
            if ($query) {
                $this->output['success'] = true;
                $this->output['message']  = 'Data Berhasil Diupdate';
                session()->set('name', $data['full_name']);
            } else {
                $this->output['success'] = false;
                $this->output['message']  = 'Data Gagal Diupdate';
                $this->output['detail']  = $this->StudentModel->errors();
            }
            return json_encode($this->output);
        }
    }
    // get city
    public function get_city()
    {
        if ($this->request->isAJAX()) {
            $kode_prop = $this->request->getVar('kode_prop');
            $data = $this->SchoolModel->get_city($kode_prop);
            $response = array();
            foreach ($data as $data) {
                $response[] = array(
                    "id" => $data->kode_kab_kota,
                    "text" => $data->kabupaten_kota, PHP_EOL
                );
            }
            echo json_encode($response);
        }
    }

    // get district
    public function get_districts()
    {
        if ($this->request->isAJAX()) {
            $kode_kab_kota = $this->request->getVar('kode_kab_kota');
            $data = $this->SchoolModel->get_districts($kode_kab_kota);
            $response = array();
            foreach ($data as $data) {
                $response[] = array(
                    "id" => $data->kode_kec,
                    "text" => $data->kecamatan, PHP_EOL
                );
            }
            echo json_encode($response);
        }
    }

    // get shcool
    public function get_school()
    {
        if ($this->request->isAJAX()) {
            $kode_kec = $this->request->getVar('kode_kec');
            $level = $this->request->getVar('level');
            $data = $this->SchoolModel->get_school($kode_kec, $level);
            $response = array();
            foreach ($data as $data) {
                $response[] = array(
                    "id" => $data->id,
                    "text" => $data->sekolah, PHP_EOL
                );
            }
            echo json_encode($response);
        }
    }


    // mendapatkan jenjang dan kelasnya
    public function get_kelas()
    {
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
