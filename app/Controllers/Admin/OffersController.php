<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class OffersController extends BaseController
{
    public $pagedata;
    public $response;
    public $model_roles;
    public $model_offers;
    public $data;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "kelola-paket-diamond";
        $this->pagedata['title'] = "Kelola Offer";
        $this->model_offers = new \App\Models\Admin\OffersModel();
        $this->model_roles = new \App\Models\Admin\RoleModel();
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
        return view('admin/pages/offers/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_offers()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->model_offers;
            $where = ['id !=' => 0];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('id', 'to_offers.name', 'to_offers.type');
            $column_search = array('to_offers.name', 'to_offers.type');
            $order = array('to_offers.id' => 'asc');
            $list = $list_data->get_datatables('to_offers', $column_order, $column_search, $order, $where);
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
                $row[] = '<p style="color:' . $red . ';">' . $lists->name . '</p>';
                $row[] = $lists->type;
                $row[] = $lists->discount_percentage;
                $row[] = $lists->discount_amount;
                $row[] = $lists->start_date;
                $row[] = $lists->end_date;
                $row[] = $lists->status;
                $row[] = $lists->description;
                $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn-block-option btn btn-light text-primary edit-button"
                    data-id="' . $lists->id . '"
                    data-name="' . $lists->name . '"
                    data-type="' . $lists->type . '"
                    data-start-date="' . $lists->start_date . '"
                    data-end-date="' . $lists->end_date . '"
                    data-description="' . $lists->description . '"
                    data-discount-amount="' . $lists->discount_amount . '"
                    data-discount-percentage="' . $lists->discount_percentage . '"
                    data-status="' . $lists->status . '"
                    data-deleted="' . $lists->deleted_at . '"
                    >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn-block-option btn btn-light text-primary delete-button" data-id="' . $lists->id . '">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                    </div>
                    ';
                $data[] = $row;
            }
            $response = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_offers', $where),
                "recordsFiltered" => $list_data->count_filtered('to_offers', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($response);
        }
    }

    public function create()
    {
        $user_id = $this->encrypter->decrypt(base64_decode(session()->get('id')));
        if ($this->request->isAJAX()) {
            $data = [
                'name' => $this->request->getVar('name'),
                'type' => $this->request->getVar('type'),
                'start_date' => $this->request->getVar('start_date'),
                'end_date' => $this->request->getVar('end_date'),
                'description' => $this->request->getVar('description'),
                'discount_amount' => $this->request->getVar('discount_amount'),
                'discount_percentage' => $this->request->getVar('discount_percentage'),
                'status'  => $this->request->getVar('status'),
                'created_by' => $user_id,
                'created_at' => $this->now(),
            ];
            $query = $this->model_offers->insert($data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Paket Berhasil Ditambahkan';
            } else {
                $response['success'] = false;
                $response['message']  = 'Paket Gagal Ditambahkan';
                $response['validation'] = "Isian Form Tidak Boleh Kosong";
            }

            echo json_encode($response);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('offer_id');
            $data = [
                'name' => $this->request->getVar('edit_name'),
                'type' => $this->request->getVar('edit_type'),
                'start_date' => $this->request->getVar('edit_start_date'),
                'end_date' => $this->request->getVar('edit_end_date'),
                'discount_amount' => $this->request->getVar('edit_discount_amount'),
                'discount_percentage' => $this->request->getVar('edit_discount_percentage'),
                'status'  => $this->request->getVar('edit_status'),
                'description' => $this->request->getVar('edit_description'),
                'updated_at' => $this->now(),
            ];
            $query = $this->model_offers->update($id, $data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Offer Berhasil Diupdate';
            } else {
                $response['success'] = false;
                $response['message']  = 'Offer Gagal Diupdate';
            }

            return json_encode($response);
        }
    }

    public function soft_delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->model_offers->delete($id); // delete($id, true) jka ingin delete permanen
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
            $delete = $this->model_offers->delete($id, true); // delete($id, true) jka ingin delete permanen
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
