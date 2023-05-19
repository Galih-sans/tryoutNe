<?php

namespace App\Controllers\Admin;

use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;

class DaftarAdminController extends BaseController
{
    public $pagedata;
    public $response;
    public $daftar_admin_model;
    public $role_model;
    public $data;
    public $encrypter;


    public function __construct()
    {
        $this->pagedata['activeTab'] = "kelola-admin";
        $this->pagedata['title'] = "Kelola Admin";
        $this->role_model = new \App\Models\Admin\RoleModel();
        $this->daftar_admin_model = new \App\Models\AdminModel();
        $this->encrypter = \Config\Services::encrypter();
    }

    protected function now()
    {
        return Time::now()->getTimestamp();
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
        $this->data['roleData'] = $this->role_model->orderBy('id', 'ASC')->findAll();
        return view('admin/pages/daftar-admin/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_daftar_admin()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->daftar_admin_model;
            $where = ['to_admins.id !=' => ''];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_admins.id', 'to_admins.full_name', 'to_admins.email', 'to_admins.role', 'to_roles.role_name');
            $column_search = array('to_admins.full_name', 'to_admins.email', 'to_admins.role', 'to_roles.role_name');
            $order = array('to_admins.name' => 'asc');
            $list = $list_data->get_datatables('to_admins', $column_order, $column_search, $order, $where);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = $lists->full_name;
                $row[] = $lists->email;
                $row[] = $lists->role_name;
                $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn btn-sm btn-warning  edit-button"
                    data-id="' . $lists->id . '" 
                    data-full_name="' . $lists->full_name . '"' . '" 
                    data-email="' . $lists->email . '"
                    data-role="' . $lists->role . '">
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

    public function create()
    {
        $uuid = Uuid::uuid1();
        if ($this->request->isAJAX()) {
            $data_create_admin = [
                'id' => $uuid->toString(),
                'full_name' => $this->request->getVar('full-name'),
                'email' => $this->request->getVar('email'),
                'role' => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $query = $this->daftar_admin_model->add_admin($data_create_admin);
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
            $id = $this->request->getVar('edit-admin_id');
            $data = [
                'full_name' => $this->request->getVar('edit-full_name'),
                'email' => $this->request->getVar('edit-email'),
                'role' => $this->request->getVar('edit-role'),
                'password' => password_hash($this->request->getVar('edit-password'), PASSWORD_DEFAULT),
            ];
            $query = $this->daftar_admin_model->update($id, $data);
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
            $delete = $this->daftar_admin_model->delete($id);
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
