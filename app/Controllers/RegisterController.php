<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\ClassModel;
use App\Models\ModelSekolah;

class RegisterController extends BaseController
{
    public $data;
    public $ClassModel;
    public $SchoolModel;

    public function __construct()
    {
        $this->data['title'] = "Neo Edukasi - Masuk Atau Daftar";
        $this->ClassModel = new ClassModel();
        $this->SchoolModel = new ModelSekolah();
    }
    public function register()
    {
        $this->data['class'] = $this->ClassModel->orderBy('id', 'ASC')->findAll();
        $this->data['province'] = $this->SchoolModel->get_province();
        return view('auth/register', ['data'=>$this->data,]);
    }


    public function get_class()
    {
        if ($this->request->isAJAX()) {
        $level = $this->request->getVar('level');
        $data = $this->ClassModel->get_class_by_level($level);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->id,
                    "text"=>$data->class, PHP_EOL
                );
        }    
        echo json_encode($response);
        }
    }
    public function get_city()
    {
        if ($this->request->isAJAX()) {
        $kode_prop = $this->request->getVar('kode_prop');
        $data = $this->SchoolModel->get_city($kode_prop);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->kode_kab_kota,
                    "text"=>$data->kabupaten_kota, PHP_EOL
                );
        }    
        echo json_encode($response);
        }
    }
    public function get_districts()
    {
        if ($this->request->isAJAX()) {
        $kode_kab_kota = $this->request->getVar('kode_kab_kota');
        $data = $this->SchoolModel->get_districts($kode_kab_kota);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->kode_kec,
                    "text"=>$data->kecamatan, PHP_EOL
                );
        }    
        echo json_encode($response);
        }
    }
    public function get_school()
    {
        if ($this->request->isAJAX()) {
        $kode_kec = $this->request->getVar('kode_kec');
        $level = $this->request->getVar('level');
        $data = $this->SchoolModel->get_school($kode_kec,$level);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->id,
                    "text"=>$data->sekolah, PHP_EOL
                );
        }    
        echo json_encode($response);
        }
    }

    public function reset()
    {
        return view('auth/reset');
    }
}