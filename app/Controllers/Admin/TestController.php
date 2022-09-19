<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TestController extends BaseController
{
    public $pagedata;
    public $class_model;
    public $data;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "test";
        $this->pagedata['title'] = "Daftar Test";
        $this->class_model = new \App\Models\Admin\ClassModel();
    }
    public function index()
    {
        $this->data['class'] = $this->class_model->orderBy('id', 'ASC')->findAll();
        return view('admin/pages/test/index', ['pagedata'=>$this->pagedata, 'data'=>$this->data]);
    }

    public function listdata()
    {
        $request = \Config\Services::request();
        $list_data = $this->class_model;
        $where = ['id !=' => 0];
                //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
                //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array('id','to_class.level','to_class.class');
        $column_search = array('to_class.level','to_class.class');
        $order = array('to_class.id' => 'asc');
        $list = $list_data->get_datatables('to_class', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");
        foreach ($list as $lists) {
            $no++;
            $row    = array();
            $row[] = $no;
            $row[] = $lists->level;
            $row[] = $lists->class;
            $row[]  = '
                <div class="block-options">
                <button type="button" class="btn btn-sm btn-warning  edit-button" data-id="'.$lists->id.'" data-level="'.$lists->level.'"'.'" data-class="'.$lists->class.'">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger  delete-button" data-id="'.$lists->id.'">
                <i class="fa-solid fa-trash"></i>
                </button>
                </div>
                ';
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('to_class', $where),
            "recordsFiltered" => $list_data->count_filtered('to_class', $column_order, $column_search, $order, $where),
            "data" => $data,
        );
        return json_encode($output);
    }

    // public function dt_test()
    // {
    //     if ($this->request->isAJAX()) {
    //         $classdata = $this->class_model->get_datatables();
    //         $data = array();
    //         $no = 0;
    //         foreach ($classdata as $class) {
    //             $no++;
    //             $row = array();
    //             $row['number']  = $no;
    //             $row['level']  = $class->level;
    //             $row['class']  = $class->class;
    //             $row['action']  = '
    //             <div class="block-options">
    //             <button type="button" class="btn-block-option btn btn-light text-primary edit-button" data-id="'.$class->id.'" data-level="'.$class->level.'"'.'" data-class="'.$class->class.'">
    //                 <i class="fa-solid fa-pen-to-square"></i>
    //             </button>
    //             <button type="button" class="btn-block-option btn btn-light text-primary delete-button" data-id="'.$class->id.'">
    //             <i class="fa-solid fa-trash"></i>
    //             </button>
    //             </div>
    //             ';
    //             $data[] = $row;
    //         }
    //         $output = array(
    //             "draw" => true,
    //             "data" => $data,
    //         );
    
    //         echo json_encode($output);
    //     }
    // }

    
}
