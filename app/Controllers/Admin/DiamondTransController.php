<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class DiamondTransController extends BaseController
{
    public $pagedata;
    public $response;
    public $model_roles;
    public $diamond_trans_model;
    public $data;
    public $encrypter;
    public $paket_model;
    public $offers_model;
    public $siswa_model;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "transaksi-diamond";
        $this->pagedata['title'] = "Transaksi Diamond";
        $this->diamond_trans_model = new \App\Models\Admin\DiamondTransModel();
        $this->model_roles = new \App\Models\Admin\RoleModel();
        $this->paket_model = new \App\Models\Admin\PaketDiamondModel();
        $this->offers_model = new \App\Models\Admin\OffersModel;
        $this->siswa_model = new \App\Models\Admin\SiswaModel;
        $this->encrypter = \Config\Services::encrypter();
    }

    protected function now()
    {
        return Time::now()->getTimestamp();
    }

    public function index()
    {
        $id = $this->encrypter->decrypt(base64_decode(session()->get('role')));
        $this->data['role'] = $this->model_roles->where('id', $id)->findAll();
        $this->data['daftarPaket'] = $this->paket_model->findAll();
        $this->data['daftarOffer'] = $this->offers_model->findAll();
        $this->data['daftarSiswa'] = $this->siswa_model->findAll();
        return view('admin/pages/transaksi-diamond/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_diamond_transaction()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->diamond_trans_model;
            $where = ['to_diamond_transaction.id !=' => 0];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_diamond_transaction.id', 'to_student.full_name', 'to_diamond_transaction.status',);
            $column_search = array('to_diamond_transaction.status');
            $order = array('to_diamond_transaction.id' => 'asc');
            $list = $list_data->get_datatables('to_diamond_transaction', $column_order, $column_search, $order, $where);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $no++;
                $row   = array();
                $row[] = $no;
                if ($lists->deleted_at == true) {
                    $red = 'red';
                } else {
                    $red = '';
                }
                $row[] = '<p style="color:' . $red . ';">' . $lists->full_name . '</p>';
                $row[] = $lists->package_name;
                $row[] = $lists->name;
                $row[] = $lists->transaction_id;
                $row[] = $lists->status;
                $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn btn-sm btn-warning  edit-button" 
                    data-id="' . $lists->id  . '"
                    data-full_name="' . $lists->full_name  . '"
                    data-package_name="' . $lists->package_name  . '"
                    data-offer_name="' . $lists->name  . '"
                    data-transaction_id="' . $lists->transaction_id  . '"
                    data-status="' . $lists->status  . '"
                    >
                    <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger delete-button" data-id="' . $lists->id . '">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                    </div>
                    ';
                $data[] = $row;
            }
            $response = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_diamond_transaction', $where),
                "recordsFiltered" => $list_data->count_filtered('to_diamond_transaction', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($response);
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'student_id' => $this->request->getVar('siswa'),
                'package_id' => $this->request->getVar('paket'),
                'offer_id' => $this->request->getVar('offer'),
                'transaction_id' => $this->request->getVar('id_transaksi'),
                'status' => $this->request->getVar('status'),
                'created_at' => $this->now(),
            ];
            $query = $this->diamond_trans_model->insert($data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Transaksi Berhasil Ditambahkan';
            } else {
                $response['success'] = false;
                $response['message']  = 'Transaksi Gagal Ditambahkan';
                $response['validation'] = "Isian Form Tidak Boleh Kosong";
            }

            echo json_encode($response);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $data = [
                'student_id' => $this->request->getVar('edit_siswa'),
                'package_id' => $this->request->getVar('edit_paket'),
                'offer_id' => $this->request->getVar('edit_offer'),
                'transaction_id' => $this->request->getVar('edit_id_transaksi'),
                'status' => $this->request->getVar('edit_status'),
                'updated_at' => $this->now(),
            ];
            $query = $this->diamond_trans_model->update($id, $data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Transaksi Berhasil Diupdate';
            } else {
                $response['success'] = false;
                $response['message']  = 'Transaksi Gagal Diupdate';
            }

            return json_encode($response);
        }
    }

    public function soft_delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->diamond_trans_model->delete($id); // delete($id, true) jka ingin delete permanen
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

    // delete permanen data yang sudah di softdelete
    public function hard_delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->diamond_trans_model->delete($id, true); // delete($id, true) jka ingin delete permanen
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
