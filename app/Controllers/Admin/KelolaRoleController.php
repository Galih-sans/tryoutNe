<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Ramsey\Uuid\Uuid;

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

    public function index()
    {
        $id = session()->get('role');
        $this->data['role'] = $this->model_roles->where('id', $id)->findAll();
        return view('admin/pages/kelola-role/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_roles()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->model_roles;
            $where = ['id !=' => ''];
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
                    data-ha-kelola-paket-diamond="' . $lists->ha_paket_diamond . '"
                    data-ha-balance-siswa="' . $lists->ha_balance_siswa . '"
                    data-ha-log-balance="' . $lists->ha_log_balance . '"
                    data-ha-offers="' . $lists->ha_offers . '"
                    data-ha-transaksi-diamond="' . $lists->ha_transaksi_diamond . '"
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

    public function create()
    {
        $uuid = Uuid::uuid1();
        if ($this->request->isAJAX()) {
            $data = [
                'id' => $uuid->toString(),
                'role_name' => $this->request->getVar('role_name'),
                'ha_class' => $this->request->getVar('class'),
                'ha_subject' => $this->request->getVar('subject'),
                'ha_topic' => $this->request->getVar('topic'),
                'ha_test' => $this->request->getVar('test'),
                'ha_bank_soal' => $this->request->getVar('bank_soal'),
                'ha_siswa' => $this->request->getVar('siswa'),
                'ha_hasil_test' => $this->request->getVar('hasil_test'),
                'ha_kelola_admin' => $this->request->getVar('kelola_admin'),
                'ha_kelola_role' => $this->request->getVar('kelola_role'),

                'ha_paket_diamond' => $this->request->getVar('kelola_paket_diamond'),
                'ha_balance_siswa' => $this->request->getVar('balance_siswa'),
                'ha_transaksi_diamond' => $this->request->getVar('transaksi_diamond'),
                'ha_offers' => $this->request->getVar('offers'),
                'ha_log_balance' => $this->request->getVar('log_balance'),
            ];
            $query = $this->model_roles->add_role($data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Ditambahkan';
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Ditambahkan';
                $response['validation'] = "Nama Role Tidak Boleh Kosong";
            }

            echo json_encode($response);
        }
    }

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
                'ha_kelola_role' => $this->request->getVar('edit_kelola_role'),

                'ha_paket_diamond' => $this->request->getVar('edit_kelola_paket_diamond'),
                'ha_balance_siswa' => $this->request->getVar('edit_balance_siswa'),
                'ha_transaksi_diamond' => $this->request->getVar('edit_transaksi_diamond'),
                'ha_offers' => $this->request->getVar('edit_offers'),
                'ha_log_balance' => $this->request->getVar('edit_log_balance'),
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
