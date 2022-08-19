<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class ClassController extends BaseController
{
    public $pagedata;
    public $class_model;
    public function __construct()
    {
        if (session()->get('isAdmin') != true) {
            echo 'Access denied';
            exit;
        }
        $this->pagedata['activeTab'] = "class";
        $this->pagedata['title'] = "Daftar Kelas";
        $this->class_model = new \App\Models\Admin\ClassModel();
        $this->class_model = new \App\Models\Admin\ClassModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        return view('admin/pages/class/index', ['pagedata'=> $this->pagedata]);
    }
    public function dt_class()
    {
        if ($this->request->isAJAX()) {
            $classdata = $this->class_model->get_datatables();
            $data = array();
            $no = 0;
            foreach ($classdata as $class) {
                $no++;
                $row = array();
                $row['number']  = $no;
                $row['level']  = $class->level;
                $row['class']  = $class->class;
                $row['action']  = '
                <div class="block-options">
                <button type="button" class="btn-block-option btn btn-light text-primary edit-button" data-id="'.$class->id.'" data-level="'.$class->level.'"'.'" data-class="'.$class->class.'">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button type="button" class="btn-block-option btn btn-light text-primary delete-button" data-id="'.$class->id.'">
                <i class="fa-solid fa-trash"></i>
                </button>
                </div>
                ';
                $data[] = $row;
            }
            $output = array(
                "draw" => true,
                "data" => $data,
            );
    
            echo json_encode($output);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'level' => $this->request->getVar('level'),
                'class' => $this->request->getVar('class')
            ];
            $query = $this->class_model->insert($data);
            if($query){
                $this->output['success'] = true;
                $this->output['message']  = 'Data Berhasil Ditambahkan';
            }else{
                $this->output['success'] = false;
                $this->output['message']  = 'Data Berhasil Ditambahkan';
            }


            echo json_encode($this->output);
        }
    }
    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('class_id');
            $data = [
                'level' => $this->request->getVar('level'),
                'class' => $this->request->getVar('class')
            ];
            $query = $this->class_model->update_class($id, $data);
            if($query){
                $this->output['success'] = true;
                $this->output['message']  = 'Data Berhasil Diupdate';;
            }else{
                $this->output['success'] = false;
                $this->output['message']  = 'Data Gagal Diupdate';
            }


            echo json_encode($this->output);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->class_model->delete_class($id);
            if ($delete) {
                $this->output['success'] = true;
                $this->output['message']  = 'Data telah dihapus';
            }else{
                $this->output['success'] = false;
                $this->output['message']  = 'Data gagal dihapus';
            }

            echo json_encode($this->output);
        }
    }
}