<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SiswaController extends BaseController
{
    public $pagedata;
    public $siswa_model;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "siswa";
        $this->pagedata['title'] = "Daftar Siswa";
        $this->siswa_model = new \App\Models\Admin\SiswaModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {

        return view('admin/pages/siswa/index', ['pagedata' => $this->pagedata]);
    }
    public function dt_siswa()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->siswa_model;
            $where = ['to_students.id !=' => 0];
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
                    <button type="button" class="btn btn-sm btn-warning detail-button"
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
                        <i class="fa fa-info"></i>
                    </button>
                    </div>
                    ';
                $data[] = $row;
            }
            $output = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_students', $where),
                "recordsFiltered" => $list_data->count_filtered('to_students', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($output);
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
                $this->output['success'] = true;
                $this->output['message']  = 'Data Berhasil Ditambahkan';
            } else {
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
            $id = $this->request->getVar('id');
            $data = [
                'full_name' => $this->request->getVar('full_name'),
                'email' => $this->request->getVar('email'),
                'class_id' => $this->request->getVar('class')
            ];
            $query = $this->siswa_model->update_siswa($id, $data);
            if ($query) {
                $this->output['success'] = true;
                $this->output['message']  = 'Data Berhasil Diupdate';;
            } else {
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
    // public function delete()
    // {
    //     if ($this->request->isAJAX()) {
    //         $id = $this->request->getVar('id');
    //         $delete = $this->siswa_model->delete_class($id);
    //         if ($delete) {
    //             $this->output['success'] = true;
    //             $this->output['message']  = 'Data telah dihapus';
    //         } else {
    //             $this->output['success'] = false;
    //             $this->output['message']  = 'Data gagal dihapus';
    //         }

    //         echo json_encode($this->output);
    //     }
    // }
}
