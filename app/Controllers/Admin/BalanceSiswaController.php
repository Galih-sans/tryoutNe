<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class BalanceSiswaController extends BaseController
{
    public $pagedata;
    public $response;
    public $balance_model;
    public $role_model;
    public $data;
    public $siswa_model;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "balance-siswa";
        $this->pagedata['title'] = "Daftar Balance Siswa";
        $this->balance_model = new \App\Models\Admin\BalanceSiswaModel();
        $this->role_model = new \App\Models\Admin\RoleModel();
        $this->siswa_model = new \App\Models\Admin\SiswaModel;
        $this->encrypter = \Config\Services::encrypter();
    }

    protected function now()
    {
        return Time::now()->getTimestamp();
    }

    public function index()
    {
        $role_id = session()->get('role');
        $this->data['role'] = $this->role_model->where('id', $role_id)->findAll();
        $this->data['daftarSiswa'] = $this->siswa_model->findAll();
        return view('admin/pages/balance-siswa/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_balance_siswa()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->balance_model;
            $where = ['users_balance.user_id !=' => ''];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('users_balance.user_id', 'to_students.full_name', 'users_balance.balance');
            $column_search = array('to_students.full_name');
            $order = array('users_balance.user_id' => 'asc');
            $list = $list_data->get_datatables('users_balance', $column_order, $column_search, $order);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $createdDate = $lists->created_at;
                $updatedDate = $lists->created_at;
                $createdAt = date("d-m-Y H:i:s", $createdDate);
                $updatedAt = date("d-m-Y H:i:s", $updatedDate);
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = $lists->full_name;
                $row[] = $lists->balance . " Diamond";
                $row[] = $createdAt;
                $row[] = $updatedAt;
                $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn btn-sm btn-warning  edit-button" 
                    data-user_id="' . $lists->user_id  . '"
                    data-balance="' . $lists->balance  . '"
                    >
                    <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    </div>
                    ';
                $data[] = $row;
            }
            $response = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('users_balance', $where),
                "recordsFiltered" => $list_data->count_filtered('users_balance', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($response);
        }
    }

    // public function create()
    // {
    //     if ($this->request->isAJAX()) {
    //         $data = [
    //             'user_id' => $this->request->getVar('siswa'),
    //             'balance' => $this->request->getVar('balance'),
    //             'created_at' => $this->now(),
    //         ];
    //         $query = $this->balance_model->insert($data);
    //         if ($query) {
    //             $response['success'] = true;
    //             $response['message']  = 'Balance Berhasil Ditambahkan';
    //         } else {
    //             $response['success'] = false;
    //             $response['message']  = 'Balance Gagal Ditambahkan';
    //             $response['validation'] = "Isian Form Tidak Boleh Kosong";
    //         }
    //         echo json_encode($response);
    //     }
    // }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_user');
            $data = [
                'balance' => $this->request->getVar('edit_balance'),
                'updated_at' => $this->now(),
            ];
            $query = $this->balance_model->update($id, $data);
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

    public function soft_delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->balance_model->delete($id); // delete($id, true) jka ingin delete permanen
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
