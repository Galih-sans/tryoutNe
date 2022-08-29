<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\ClassModel;

class RegisterController extends BaseController
{
    public $data;
    public $ClassModel;

    public function __construct()
    {
        $this->data['title'] = "Neo Edukasi - Masuk Atau Daftar";
        $this->ClassModel = new ClassModel();
    }
    public function register()
    {
        $this->data['class'] = $this->ClassModel->orderBy('id', 'ASC')->findAll();
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

    public function reset()
    {
        return view('auth/reset');
    }
}