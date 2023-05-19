<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;

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
        $id = session()->get('role');
        $this->data['role'] = $this->model_roles->where('id', $id)->findAll();
        return view('admin/pages/offers/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_offers()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->model_offers;
            $where = ['id !=' => ''];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('id', 'to_offers.name', 'to_offers.type');
            $column_search = array('to_offers.name', 'to_offers.type');
            $order = array('to_offers.id' => 'asc');
            $list = $list_data->get_datatables('to_offers', $column_order, $column_search, $order, $where);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                if ($lists->deleted_at == false) {
                    $startDate = date("d-m-Y H:i", strtotime($lists->start_date));
                    $endDate = date("d-m-Y H:i", strtotime($lists->end_date));
                    $no++;
                    $row   = array();
                    $row[] = $no;
                    $row[] = $lists->name;
                    $row[] = $lists->type;
                    $row[] = $lists->offer_code;
                    $row[] = $lists->discount_percentage;
                    $row[] = $lists->discount_amount;
                    $row[] = $startDate;
                    $row[] = $endDate;
                    $row[] = $lists->status;
                    $row[] = $lists->description;
                    $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn-block-option btn btn-light text-primary edit-button"
                    data-id="' . $lists->id . '"
                    data-name="' . $lists->name . '"
                    data-type="' . $lists->type . '"
                    data-code="' . $lists->offer_code . '"
                    data-start-date="' . $lists->start_date . '"
                    data-end-date="' . $lists->end_date . '"
                    data-description="' . $lists->description . '"
                    data-discount-amount="' . $lists->discount_amount . '"
                    data-discount-percentage="' . $lists->discount_percentage . '"
                    data-status="' . $lists->status . '"
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
        $uuid = Uuid::uuid1();
        $user_id = session()->get('id');
        if ($this->request->isAJAX()) {
            $data = [
                'id' => $uuid->toString(),
                'name' => $this->request->getVar('name'),
                'type' => $this->request->getVar('type'),
                'offer_code' => $this->request->getVar('code'),
                'start_date' => $this->request->getVar('start_date'),
                'end_date' => $this->request->getVar('end_date'),
                'discount_amount' => $this->request->getVar('discount_amount'),
                'discount_percentage' => $this->request->getVar('discount_percentage'),
                'status'  => $this->request->getVar('status'),
                'description' => $this->request->getVar('description'),
                'created_by' => $user_id,
            ];
            $query = $this->model_offers->add_offer($data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Offer Berhasil Ditambahkan';
            } else {
                $response['success'] = false;
                $response['message']  = 'Offer Gagal Ditambahkan';
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
                'offer_code' => $this->request->getVar('edit_code'),
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
