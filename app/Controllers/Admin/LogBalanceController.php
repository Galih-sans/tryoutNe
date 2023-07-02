<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LogBalanceController extends BaseController
{
    public $pagedata;
    public $response;
    public $log_balance_model;
    public $role_model;
    public $data;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "log-balance";
        $this->pagedata['title'] = "Log Balance Siswa";
        $this->log_balance_model = new \App\Models\Admin\LogBalanceModel();
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
        $role_id = session()->get('role');
        $this->data['role'] = $this->role_model->where('id', $role_id)->findAll();
        return view('admin/pages/log-balance/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_balance_log()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->log_balance_model;
            $where = ['to_balance_log.id !=' => 0];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_balance_log.amount', 'to_students.timestamp', 'to_students.total', 'to_students.status', 'to_students.full_name', 'to_balance_log.type', 'to_balance_log.amount');
            $column_search = array('to_students.full_name');
            $order = array('to_balance_log.id' => 'asc');
            $list = $list_data->get_datatables('to_balance_log', $column_order, $column_search, $order);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $startDate = date("l d-m-Y H:i:s", strtotime($lists->timestamp));
                // $endDate = date("d-m-Y H:i", strtotime($lists->end_date));
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = $lists->full_name;
                $row[] = $lists->amount;
                $row[] = $lists->type;
                $row[] = $startDate;
                $row[] = $lists->total;
                $row[] = $lists->status;
                // $row[]  = '
                //     <div class="block-options">
                //     <button type="button" class="btn btn-sm btn-warning detail-button"
                //     id="' . $lists->id . '"
                //     >
                //         <i class="fa fa-info"></i>
                //     </button>
                //     </div>
                //     ';
                $data[] = $row;
            }
            $response = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_balance_log', $where),
                "recordsFiltered" => $list_data->count_filtered('to_balance_log', $column_order, $column_search, $order, $where),
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
            $query = $this->log_balance_model->insert($data);
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
            $query = $this->log_balance_model->update_siswa($id, $data);
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
    //         $delete = $this->log_balance_model->delete_class($id);
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
