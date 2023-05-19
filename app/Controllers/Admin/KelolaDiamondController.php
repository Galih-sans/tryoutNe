<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;

class KelolaDiamondController extends BaseController
{
    public $pagedata;
    public $response;
    public $model_roles;
    public $paket_diamond_model;
    public $data;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "kelola-paket-diamond";
        $this->pagedata['title'] = "Kelola Paket Diamond";
        $this->paket_diamond_model = new \App\Models\Admin\PaketDiamondModel();
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
        return view('admin/pages/kelola-paket-diamond/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_paket_diamond()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->paket_diamond_model;
            $where = ['id !=' => ''];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('id', 'to_diamond_packages.name', 'to_diamond_packages.price');
            $column_search = array('to_diamond_packages.name', 'to_diamond_packages.price');
            $order = array('to_diamond_packages.id' => 'asc');
            $list = $list_data->get_datatables('to_diamond_packages', $column_order, $column_search, $order, $where);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                if ($lists->deleted_at == false) {
                    $no++;
                    $row    = array();
                    $row[] = $no;
                    $row[] = $lists->name;
                    $row[] = "Rp" . $lists->price;
                    $row[] = $lists->amount . " Diamond";
                    $row[] = $lists->description;
                    // $row[] = $lists->price;
                    $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn-block-option btn btn-light text-primary edit-button"
                    data-id="' . $lists->id . '"
                    data-name="' . $lists->name . '"
                    data-price="' . $lists->price . '"
                    data-amount="' . $lists->amount . '"
                    data-description="' . $lists->description . '"
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
                "recordsTotal" => $list_data->count_all('to_diamond_packages', $where),
                "recordsFiltered" => $list_data->count_filtered('to_diamond_packages', $column_order, $column_search, $order, $where),
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
                'name' => $this->request->getVar('package_name'),
                'type' => $this->request->getVar('package_type'),
                'price' => $this->request->getVar('package_price'),
                'amount' => $this->request->getVar('diamond_amount'),
                'description' => $this->request->getVar('package_description'),
                'created_by' => $user_id,
            ];
            $query = $this->paket_diamond_model->add_package($data);
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
            $id = $this->request->getVar('package_id');
            $data = [
                'name' => $this->request->getVar('edit_package_name'),
                'type' => $this->request->getVar('edit_package_type'),
                'price' => $this->request->getVar('edit_package_price'),
                'amount' => $this->request->getVar('edit_diamond_amount'),
                'description' => $this->request->getVar('edit_package_description'),
                'updated_at' => $this->now(),
            ];
            $query = $this->paket_diamond_model->update($id, $data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Paket Berhasil Diupdate';
            } else {
                $response['success'] = false;
                $response['message']  = 'Paket Gagal Diupdate';
            }

            return json_encode($response);
        }
    }

    public function soft_delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->paket_diamond_model->delete($id); // delete($id, true) jka ingin delete permanen
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
            $delete = $this->paket_diamond_model->delete($id, true); // delete($id, true) jka ingin delete permanen
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
