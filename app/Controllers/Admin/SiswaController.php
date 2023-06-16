<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SiswaController extends BaseController
{
    public $pagedata;
    public $response;
    public $siswa_model;
    public $role_model;
    public $data;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "siswa";
        $this->pagedata['title'] = "Daftar Siswa";
        $this->siswa_model = new \App\Models\Admin\SiswaModel();
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
        return view('admin/pages/siswa/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_siswa()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->siswa_model;
            $where = ['to_students.id !=' => ''];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_students.id', 'to_students.full_name', 'to_students.email', 'to_class.class');
            $column_search = array('to_students.full_name', 'to_students.email', 'to_class.class', 'sekolah.sekolah');
            $order = array('to_students.id' => 'asc');
            $list = $list_data->get_datatables('to_students', $column_order, $column_search, $order);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $newDateFormat = $lists->DOB;
                $newDate = date("d-m-Y", strtotime(str_replace('/', '-', $newDateFormat)));
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = $lists->full_name;
                $row[] = $lists->email;
                $row[] = $lists->class;
                $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn btn-sm btn-info detail-button"
                    id="' . $lists->id . '"
                    POB="' . $lists->POB . '"
                    DOB="' . $newDate . '"
                    full_name="' . $lists->full_name . '"
                    class_id="' . $lists->class . '"
                    level="' . $lists->level . '"
                    email="' . $lists->email . '"
                    phone_number="' . $lists->phone_number . '"
                    gender="' . $lists->gender . '"
                    parent_name="' . $lists->parent_name . '"
                    parent_phone_number="' . $lists->parent_phone_number . '"
                    parent_email="' . $lists->parent_email . '"
                    school="' . $lists->sekolah . '"
                    >
                        Detail
                    </button>
                    </div>
                    ';
                $data[] = $row;
            }
            $response = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_students', $where),
                "recordsFiltered" => $list_data->count_filtered('to_students', $column_order, $column_search, $order, $where),
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
        if ($this->request->isAJAX()) {
            $data = [
                'full_name' => $this->request->getVar('full_name'),
                'email' => $this->request->getVar('email'),
                'class_id' => $this->request->getVar('class')
            ];
            $query = $this->siswa_model->insert($data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Ditambahkan';
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Berhasil Ditambahkan';
            }


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
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = [
                'full_name' => $this->request->getVar('full_name'),
                'email' => $this->request->getVar('email'),
                'class_id' => $this->request->getVar('class')
            ];
            $query = $this->siswa_model->update_siswa($id, $data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Diupdate';;
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Diupdate';
            }


            echo json_encode($response);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    // public function delete()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id = $this->request->getVar('id');
    //         $delete = $this->siswa_model->delete_class($id);
    //         if ($delete) {
    //             $this->response['success'] = true;
    //             $this->response['message']  = 'Data telah dihapus';
    //         } else {
    //             $this->response['success'] = false;
    //             $this->response['message']  = 'Data gagal dihapus';
    //         }

    //         echo json_encode($this->response);
    //     }
    // }
}
