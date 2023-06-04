<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;

class ClassController extends BaseController
{
    public $pagedata;
    public $response;
    public $class_model;
    public $role_model;
    public $data;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "class";
        $this->pagedata['title'] = "Daftar Kelas";
        $this->class_model = new \App\Models\Admin\ClassModel();
        $this->class_model = new \App\Models\Admin\ClassModel();
        $this->role_model = new \App\Models\Admin\RoleModel();
        $this->encrypter = \Config\Services::encrypter();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $id = session()->get('role');
        $this->data['role'] = $this->role_model->where('id', $id)->findAll();
        return view('admin/pages/class/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_class()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->class_model;
            $where = ['id !=' => ''];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('id', 'to_class.level', 'to_class.class');
            $column_search = array('to_class.level', 'to_class.class');
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
                    <button type="button" class="btn btn-sm btn-warning  edit-button" data-id="' . $lists->id . '" data-level="' . $lists->level . '"' . '" data-class="' . $lists->class . '">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger  delete-button" data-id="' . $lists->id . '">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                    </div>
                    ';
                $data[] = $row;
            }
            $response = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_class', $where),
                "recordsFiltered" => $list_data->count_filtered('to_class', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($response);
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
        $this->_validation();
        $uuid = Uuid::uuid1();
        if ($this->request->isAJAX()) {
            $data = [
                'id' => $uuid->toString(),
                'level' => $this->request->getVar('level'),
                'class' => $this->request->getVar('class')
            ];
            $this->class_model->insert($data);
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Ditambahkan';

            echo json_encode($response);
        }
    }
    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update()
    {
        $this->_validation_edit();
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('class_id');
            $data = [
                'level' => $this->request->getVar('level'),
                'class' => $this->request->getVar('class')
            ];
            $query = $this->class_model->update_class($id, $data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Diupdate';;
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Diupdate';
            }


            return json_encode($response);
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
                $response['success'] = true;
                $response['message']  = 'Data telah dihapus';
            } else {
                $response['success'] = false;
                $response['message']  = 'Data gagal dihapus';
            }

            echo json_encode($response);
        }
    }

    public function _validation()
    {
        $data = array();
        $data['input_error'] = array();
        $data['error_string'] = array();
        $data['status'] = true;

        if($this->request->getVar('level') == ''){
            $data['input_error'][] = 'level';
            $data['error_string'][] = 'Jenjang wajib diisi';
            $data['status'] = false;
        }
        if($this->request->getVar('class') == ''){
            $data['input_error'][] = 'class';
            $data['error_string'][] = 'Kelas wajib diisi';
            $data['status'] = false;
        }

        if($data['status'] == false){
            echo json_encode($data);
            exit();
        }
    }

    public function _validation_edit()
    {
        $data = array();
        $data['input_error'] = array();
        $data['error_string'] = array();
        $data['status'] = true;

        if($this->request->getVar('class') == ''){
            $data['input_error'][] = 'class';
            $data['error_string'][] = 'Kelas Tidak Boleh Kosong';
            $data['status'] = false;
        }

        if($data['status'] == false){
            echo json_encode($data);
            exit();
        }
    }
}
