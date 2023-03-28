<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class KelolaRoleController extends BaseController
{
    public $pagedata;
    public $response;
    public $model_roles;
    public $data;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "kelola-role";
        $this->pagedata['title'] = "Kelola Role";
        $this->model_roles = new \App\Models\Admin\RoleModel();
        $this->encrypter = \Config\Services::encrypter();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $id = $this->encrypter->decrypt(base64_decode(session()->get('role')));
        $this->data['role'] = $this->model_roles->where('id', $id)->findAll();
        return view('admin/pages/kelola-role/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_roles()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->model_roles;
            $where = ['id !=' => 0];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('id', 'to_roles.role_name');
            $column_search = array('to_roles.role_name');
            $order = array('to_roles.id' => 'asc');
            $list = $list_data->get_datatables('to_roles', $column_order, $column_search, $order, $where);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = $lists->role_name;
                $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn btn-sm btn-warning  edit-button"
                    data-id="' . $lists->id . '"
                    data-role-name="' . $lists->role_name . '"
                    data-ha-class="' . $lists->ha_class . '"
                    data-ha-subject="' . $lists->ha_subject . '"
                    data-ha-topic="' . $lists->ha_topic . '"
                    data-ha-test="' . $lists->ha_test . '"
                    data-ha-bank-soal="' . $lists->ha_bank_soal . '"
                    data-ha-siswa="' . $lists->ha_siswa . '"
                    data-ha-hasil-test="' . $lists->ha_hasil_test . '"
                    data-ha-kelola-admin="' . $lists->ha_kelola_admin . '"
                    data-ha-kelola-role="' . $lists->ha_kelola_role . '"
                    >
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
                "recordsTotal" => $list_data->count_all('to_admins', $where),
                "recordsFiltered" => $list_data->count_filtered('to_admins', $column_order, $column_search, $order, $where),
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
                'role_name' => $this->request->getVar('role_name'),
                'ha_class' => $this->request->getVar('class'),
                'ha_subject' => $this->request->getVar('subject'),
                'ha_topic' => $this->request->getVar('topic'),
                'ha_test' => $this->request->getVar('test'),
                'ha_bank_soal' => $this->request->getVar('bank_soal'),
                'ha_siswa' => $this->request->getVar('siswa'),
                'ha_hasil_test' => $this->request->getVar('hasil_test'),
                'ha_kelola_admin' => $this->request->getVar('kelola_admin'),
                'ha_kelola_role' => $this->request->getVar('kelola_role')
            ];
            $query = $this->model_roles->insert($data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Ditambahkan';
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Ditambahkan';
                $response['validation'] = "Isian Form Tidak Boleh Kosong";
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
            $id = $this->request->getVar('role_id');
            $data = [
                'role_name' => $this->request->getVar('edit_role_name'),
                'ha_class' => $this->request->getVar('edit_class'),
                'ha_subject' => $this->request->getVar('edit_subject'),
                'ha_topic' => $this->request->getVar('edit_topic'),
                'ha_test' => $this->request->getVar('edit_test'),
                'ha_bank_soal' => $this->request->getVar('edit_bank_soal'),
                'ha_siswa' => $this->request->getVar('edit_siswa'),
                'ha_hasil_test' => $this->request->getVar('edit_hasil_test'),
                'ha_kelola_admin' => $this->request->getVar('edit_kelola_admin'),
                'ha_kelola_role' => $this->request->getVar('edit_kelola_role')
            ];
            $query = $this->model_roles->update($id, $data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Diupdate';
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
            $delete = $this->model_roles->delete($id);
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
}
