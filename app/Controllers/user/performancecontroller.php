<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class performancecontroller extends BaseController
{
    public $pagedata;
    public $test_result_model;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "performance";
        $this->pagedata['title'] = "Performa Saya - Neo Edukasi";
        $this->test_result_model = new \App\Models\TestResultModel();
        $this->encrypter = \Config\Services::encrypter();
    }
    public function index()
    {

        return view('user/pages/performance/index', ['data' => $this->pagedata]);
    }

    public function dt_riwayat()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->test_result_model;
            $where = ['to_test_result.id !=' => 0];
            $student_id = $this->encrypter->decrypt(base64_decode(session()->get('id')));
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_test_result.id', 'to_tests.test_name', 'to_test_result.score', 'to_class.class', 'to_tests.begin_time');
            $column_search = array('to_tests.test_name');
            $order = array('to_test_result.id' => 'asc');
            $list = $list_data->get_datatables('to_test_result', $column_order, $column_search, $order);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                if ($lists->student_id == $student_id) {
                    $newDate = date("d-m-Y", substr($lists->begin_time, 0, 10)); // convert epoch
                    $no++;
                    $row    = array();
                    $row[] = $no;
                    $row[] = $lists->test_name;
                    $row[] = $lists->score;
                    $row[] = $lists->class;
                    $row[] = $newDate;
                    $row[]  = '
                            <div class="block-options">
                            <button type="button" class="btn btn-sm btn-warning detail-button"
                            id="' . $lists->id . '"
                            score="' . $lists->test_name . '"
                            student="' . $lists->score . '"
                            class="' . $lists->class_id . '"
                            test="' . $lists->begin_time . '"
                            >
                                <i class="fa fa-info"></i>
                            </button>
                            </div>
                            ';
                    $data[] = $row;
                }
            }
            $output = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_test_result', $where),
                "recordsFiltered" => $list_data->count_filtered('to_test_result', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($output);
        }
    }
}
