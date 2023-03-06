<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestResultModel;
use DateTime;

class HasilTestController extends BaseController
{
    public $pagedata;
    public $response;
    public $class_model;
    public $data;
    public $TestModel;
    public $QuestionCompositionModel;
    public $encrypter;
    public $result_model;
    public $answer_model;
    public $uri;
    public $test_id;

    public function __construct()
    {
        $this->uri = service('uri');

        $this->pagedata['activeTab'] = "hasil-test";
        $this->pagedata['title'] = "Daftar Hasil Test";
        $this->class_model = new \App\Models\Admin\ClassModel();
        $this->TestModel = new \App\Models\Admin\TestModel();
        $this->QuestionCompositionModel = new \App\Models\Admin\QuestionCompotionModel();
        $this->encrypter = \Config\Services::encrypter();
        $this->result_model = new \App\Models\TestResultModel();
        $this->answer_model = new \App\Models\TestAnswerModel();
    }

    public function index()
    {
        return view('admin/pages/hasil-test/index', ['pagedata' => $this->pagedata]);
    }

    public function detail()
    {
        $this->pagedata['title'] = "Detail Test Siswa";
        $this->pagedata['encrypter'] = $this->encrypter;
        // $test_id = $this->uri->getSegment(4);
        $this->pagedata['test_id'] = $this->uri->getSegment(4);
        $test_id = $this->encrypter->decrypt(base64_decode(strtr($this->pagedata['test_id'], array('.' => '+', '-' => '=', '~' => '/'))));

        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $detail_test_id = $test_id;
            $list_data = $this->result_model;
            $where = ['to_test_result.id !=' => 0];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_test_result.id', 'to_tests.test_name', 'to_students.full_name', 'to_test_result.score');
            $column_search = array('to_test_result.id', 'to_tests.test_name', 'to_students.full_name', 'to_test_result.score');
            $order = array('to_test_result.score' => 'asc');
            $list = $list_data->get_datatables('to_test_result', $column_order, $column_search, $order);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                if ($lists->test_id == $detail_test_id) {
                    $beginTime = date("Y-m-d H:i:s", substr($lists->result_begin, 0, 10));
                    $endTime = date("Y-m-d H:i:s", substr($lists->end_time, 0, 10));
                    // $endTime = date("Y-m-d H:i:s", strtotime($lists->end_time));

                    $d1 = new DateTime($beginTime);
                    $d2 = new DateTime($endTime);
                    $interval = $d2->diff($d1);

                    $no++;
                    $row    = array();
                    $row[] = $no; // no
                    $row[] = $lists->test_name; // nama test
                    $row[] = $lists->full_name; // nama siswa
                    $row[] = $interval->format('%h jam, %i menit, %s detik'); //  waktu pengerjaan ( end time - begin time)
                    $row[] = $lists->score; // score
                    $row[]  = '
                        <div class="block-options">
                        <button type="button" class="btn btn-sm btn-success kembali-button"
                        >
                            <i class="">Kembali</i>
                        </button>
                        </div>
                        ';
                    $data[] = $row;
                }
            }
            $response = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_test_result', $where),
                "recordsFiltered" => $list_data->count_filtered('to_test_result', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($response);
        }

        return view('admin/pages/hasil-test/detail', ['pagedata' => $this->pagedata]);
    }

    public function dt_daftar_test()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->TestModel;
            $where = ['to_tests.id !=' => 0];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_tests.id', 'to_tests.test_name', 'to_tests.begin_time', 'to_class.class', 'to_tests.number_of_question', 'to_tests.type', 'to_tests.price');
            $column_search = array('to_tests.test_name', 'to_tests.test_name', 'to_tests.begin_time', 'to_class.class', 'to_tests.number_of_question', 'to_tests.type', 'to_tests.price');
            $order = array('to_tests.id' => 'asc');
            $list = $list_data->get_datatables('to_tests', $column_order, $column_search, $order);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $beginDate = date("d-M-Y H:i:s", substr($lists->begin_time, 0, 10));
                $test_id = strtr(base64_encode($this->encrypter->encrypt($lists->id)), array('+' => '.', '=' => '-', '/' => '~'));
                // $decrypted_id = $this->encrypter->decrypt(base64_decode(strtr($test_id, array('.' => '+', '-' => '=', '~' => '/'))));
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = $lists->test_name;
                $row[] = $lists->class;
                $row[] = $beginDate;
                $row[] = "$lists->number_of_question Soal";
                $row[] = $lists->type;
                $row[] = "Rp. $lists->price";
                $row[]  = '
                            <div class="block-options">
                            <button type="button" class="btn btn-sm btn-primary detail-test"
                                test_id="' . $test_id . '"
                            >
                                <i class="fa fa-info"></i>
                            </button>
                            </div>
                            ';
                $data[] = $row;
            }
            $output = array(
                "draw" => $request->getPost("draw"),
                "recordsTotal" => $list_data->count_all('to_tests', $where),
                "recordsFiltered" => $list_data->count_filtered('to_tests', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($output);
        }
    }
}
