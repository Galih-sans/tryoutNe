<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;

class performancecontroller extends BaseController
{
    public $pagedata;
    public $test_result_model;
    public $test_model;
    public $student_model;
    public $answer_model;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "performance";
        $this->pagedata['title'] = "Performa Saya - Neo Edukasi";
        $this->test_result_model = new \App\Models\TestResultModel();
        $this->test_model = new \App\Models\TestModel();
        $this->student_model = new \App\Models\StudentModel();
        $this->answer_model = new \App\Models\TestAnswerModel();
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
            $test_answer_model = $this->answer_model;
            $where = ['to_test_result.id !=' => 0];
            $student_id = $this->encrypter->decrypt(base64_decode(session()->get('id')));
            $column_order = array('to_test_result.id', 'to_tests.test_name', 'to_test_result.score', 'to_class.class', 'to_tests.begin_time');
            $column_search = array('to_tests.test_name');
            $order = array('to_test_result.id' => 'asc');
            $list = $list_data->get_datatables('to_test_result', $column_order, $column_search, $order);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                if ($lists->student_id == $student_id) {
                    $newDate = date("d-m-Y", substr($lists->begin_time, 0, 10)); // convert epoch
                    $id_test = $lists->test_id;
                    $right_answer = $test_answer_model->count_right($id_test, $student_id);
                    $wrong_answer = $test_answer_model->count_wrong($id_test, $student_id);
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
                            test_id="' . $lists->test_id . '"
                            score="' . $lists->score . '"
                            right_answer="' . $right_answer . '"
                            wrong_answer="' . $wrong_answer . '"
                            test_class="' . $lists->class . '"
                            begin_time="' . $newDate . '"
                            test_name="' . $lists->test_name . '"
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

    public function dt_mendatang()
    {
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->test_model;
            $student_id = $this->encrypter->decrypt(base64_decode(session()->get('id')));
            $studentModel = $this->student_model;
            $where = ['to_tests.id !=' => 0];
            $students_class_id = $studentModel->getClass($student_id);
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_tests.id', 'to_tests.test_name', 'to_tests.begin_time', 'to_class.class', 'to_tests.number_of_question', 'to_tests.type', 'to_tests.price');
            $column_search = array('to_tests.test_name');
            $order = array('to_tests.id' => 'asc');
            $list = $list_data->get_datatables('to_tests', $column_order, $column_search, $order);
            $data = array();
            $no = $request->getPost("start");
            $todayDate = strtotime(date('d-m-Y'));
            foreach ($list as $lists) {
                $beginDate = date("d-m-Y", substr($lists->begin_time, 0, 10));
                $newBeginTime = strtotime($beginDate);
                if ($lists->class_id == $students_class_id && $newBeginTime > $todayDate) {
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
                            <button type="button" class="btn btn-sm btn-warning detail-button"
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
                "recordsTotal" => $list_data->count_all('to_tests', $where),
                "recordsFiltered" => $list_data->count_filtered('to_tests', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($output);
        }
    }
}
