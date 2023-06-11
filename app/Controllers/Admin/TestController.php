<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestResultModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\I18n\Time;

class TestController extends BaseController
{
    public $pagedata;
    public $response;
    public $class_model;
    public $data;
    public $TestModel;
    public $QuestionCompositionModel;
    public $role_model;
    public $encrypter;
    public function __construct()
    {
        $this->pagedata['activeTab'] = "test";
        $this->pagedata['title'] = "Daftar Test";
        $this->class_model = new \App\Models\Admin\ClassModel();
        $this->TestModel = new \App\Models\Admin\TestModel();
        $this->QuestionCompositionModel = new \App\Models\Admin\QuestionCompotionModel();
        $this->role_model = new \App\Models\Admin\RoleModel();
        $this->encrypter = \Config\Services::encrypter();
    }
    protected function now()
    {
        return Time::now()->getTimestamp();
    }
    public function index()
    {
        $id_role = session()->get('role');
        $this->data['role'] = $this->role_model->where('id', $id_role)->findAll();
        $this->data['class'] = $this->class_model->orderBy('id', 'ASC')->findAll();
        return view('admin/pages/test/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }

    public function dt_test()
    {
        $encrypter = \Config\Services::encrypter();
        if ($this->request->isAJAX()) {
            $request = \Config\Services::request();
            $list_data = $this->TestModel;
            $where = [];
            //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
            //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
            $column_order = array('to_tests.id', 'to_class.id', 'to_tests.test_name', 'to_tests.number_of_question', 'type', 'status');
            $column_search = array('to_class.level', 'to_class.class', 'to_tests.test_name', 'begin_time', 'end_time', 'duration', 'to_tests.number_of_question', 'type', 'price', 'status');
            $order = array('to_tests.id' => 'asc');
            $list = $list_data->get_datatables('to_tests', $column_order, $column_search, $order, $where);
            $data = array();
            $no = $request->getPost("start");
            foreach ($list as $lists) {
                $no++;
                $row    = array();
                $row[] = $no;
                $row[] = '<p class="fw-bold fs-sm font-size-sm text-center">' . $lists->class . ' ' . $lists->level . '</p>';
                $row[] = '<p class="fw-bold fs-sm"><a class="fw-semibold link-fx text-neo click" href="#" data-id="' . $lists->id . '">' . $lists->test_name . '</a></p><p class="fw-lighter fs-sm font-size-sm">' . date("d-m-Y H:i:s ", $lists->begin_time) . '<span class="fw-bold"> s/d </span>' . date("d-m-Y H:i:s ", $lists->end_time) . '</p><p class="fw-lighter fs-sm font-size-sm"> ( ' . $lists->duration . ' ) Menit </p>';
                $row[] = '<p class="fw-bold fs-sm font-size-sm">' . $lists->number_of_question . ' Butir </p>';
                if ($lists->type != 'free') {
                    $row[] = '<p class="fw-bold fs-sm font-size-sm">' . $lists->price . '</p>';
                } else {
                    $row[] = '<p class="fw-bold fs-sm font-size-sm">' . ucfirst($lists->type) . '</p>';
                }
                if ($lists->status == -100) {
                    $row[] = '<span class="fs-xs fw-semibold d-inline-block py-1 px-3 bg-danger text-light btn-sm btn-block text-center"><small>Tidak Aktif</small></span>';
                } elseif ($lists->status == 100) {
                    $row[] = '<span class="fs-xs fw-semibold d-inline-block py-1 px-3 bg-neo text-light btn-sm btn-block text-center"><small>Aktif</small></span>';
                }

                $row[]  = '
                    <div class="block-options">
                    <button type="button" class="btn btn-sm btn-warning  edit-button"  data-id="' . $lists->id . '">
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
                "recordsTotal" => $list_data->count_all('to_tests', $where),
                "recordsFiltered" => $list_data->count_filtered('to_tests', $column_order, $column_search, $order, $where),
                "data" => $data,
            );
            return json_encode($response);
        }
    }

    public function delete()
    {
        $encrypter = \Config\Services::encrypter();
        if ($this->request->isAJAX()) {

            $id =  $this->request->getVar('id');
            $delete = $this->TestModel->where('id', $id)->delete();
            $testResult = new TestResultModel();
            $testAnswer = new TestResultModel();
            $testResult->where('test_id', $id)->delete();
            $testAnswer->where('test_id', $id)->delete();
            if ($delete) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Dihapus';
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Dihapus';
            }

            return json_encode($response);
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $uuid = Uuid::uuid1();
            $data = [
                'id' => $uuid->toString(),
                'test_name' => $this->request->getVar('test_name'),
                'begin_time' => $this->request->getVar('start_date'),
                'end_time' => $this->request->getVar('end_date'),
                'duration' => $this->request->getVar('duration'),
                'number_of_question' => $this->request->getVar('number_of_questions'),
                'class_id' => $this->request->getVar('class'),
                'type' => $this->request->getVar('type'),
                'price' => $this->request->getVar('price'),
                'correct_answer_value' => $this->request->getVar('true_value'),
                'wrong_answer_value' => $this->request->getVar('false_value'),
                'empty_answer_value' => $this->request->getVar('null_value'),
                'random_question' => $this->request->getVar('random_question'),
                'random_answer' => $this->request->getVar('random_answer'),
                'result_to_student' => $this->request->getVar('show_result'),
                'created_by' => session()->get('id'),
                'created_at'    => $this->now(),
                'status' => 100,
            ];
            $compositionData = [
                'subject' => $this->request->getVar('subject[]'),
                'topic' => $this->request->getVar('topic[]'),
                'number_question' => $this->request->getVar('number_question[]'),
            ];
            if ($data['random_question'] == '') {
                $data['random_question'] = '0';
            }
            if ($data['random_answer'] == '') {
                $data['random_answer'] = '0';
            }
            if ($data['result_to_student'] == '') {
                $data['result_to_student'] = '0';
            }

            // $beginTime = strtotime(str_replace(",", "", $data['begin_time']));
            // $endTime = strtotime(str_replace(",", "", $data['end_time']));

            // string replace
            $replaceBegin = str_replace('.', '-', $data['begin_time']);
            $replaceEnd = str_replace('.', '-', $data['end_time']);

            // reformat
            $newBeginDate = date('m/d/Y H:i', strtotime($replaceBegin));
            $newEndDate = date('m/d/Y H:i', strtotime($replaceEnd));

            $data['begin_time'] = strtotime($newBeginDate);
            $data['end_time'] = strtotime($newEndDate);

            $query = $this->TestModel->add_test($data);
            // $query = $this->TestModel->insert($data);
            if ($query) {
                $uuid2 = Uuid::uuid1();
                //menyimpan komposisi soal
                $test_id = $data['id'];
                $data1 = array();
                for ($i = 0; $i < count($compositionData['subject']); $i++) {
                    $data1[$i] = array(
                        'id' => $uuid2->toString(),
                        'test_id' => $test_id,
                        'subject_id' => $compositionData['subject'][$i],
                        'topic_id' => $compositionData['topic'][$i],
                        'number_of_question' => $compositionData['number_question'][$i],
                    );
                }
                $compositionQuery = $this->QuestionCompositionModel->insertBatch($data1);
                if ($compositionQuery) {
                    $response['success'] = true;
                    $response['message']  = 'Data Berhasil Disimpan';
                    // $response['message']  = $data;
                } else {
                    $response['success'] = false;
                    $response['message']  = 'Data Gagal Disimpan';
                    // $response['message']  = $data;
                }
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Disimpan';
                // $response['message']  = $data;
            }
            echo json_encode($response);
        }
    }
    public function detail()
    {
        $encrypter = \Config\Services::encrypter();
        if ($this->request->isAJAX()) {
            $id =  $this->request->getVar('id');
            $testData = $this->TestModel->get_test($id);
            $testData->begin_time = date("d-m-Y H:i:s ", $testData->begin_time);
            $testData->end_time = date("d-m-Y H:i:s ", $testData->end_time);

            $data['testData'] = $testData;
            $data['compositonData'] = $this->QuestionCompositionModel->get_composition($id);
            return json_encode($data);
        }
    }
    public function get_detail()
    {
        $encrypter = \Config\Services::encrypter();
        if ($this->request->isAJAX()) {
            $id =  $this->request->getVar('id');
            $testData = $this->TestModel->get_edit_test($id);
            $testData->begin_time = date("d/m/Y, H:i", $testData->begin_time);
            $testData->end_time = date("d/m/Y, H:i", $testData->end_time);
            $data['testData'] = $testData;
            $data['compositonData'] = $this->QuestionCompositionModel->get_composition_detail($id);
            return json_encode($data);
        }
    }
    public function update()
    {
        $encrypter = \Config\Services::encrypter();
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('test_id');
            $data = [
                'test_name' => $this->request->getVar('edit_test_name'),
                'begin_time' => $this->request->getVar('edit_start_date'),
                'end_time' => $this->request->getVar('edit_end_date'),
                'duration' => $this->request->getVar('edit_duration'),
                'number_of_question' => $this->request->getVar('edit_number_of_questions'),
                'class_id' => $this->request->getVar('edit_class'),
                'type' => $this->request->getVar('edit_type'),
                'price' => $this->request->getVar('edit_price'),
                'correct_answer_value' => $this->request->getVar('edit_true_value'),
                'wrong_answer_value' => $this->request->getVar('edit_false_value'),
                'empty_answer_value' => $this->request->getVar('edit_null_value'),
                'random_question' => $this->request->getVar('edit_random_question'),
                'random_answer' => $this->request->getVar('edit_random_answer'),
                'result_to_student' => $this->request->getVar('edit_show_result'),
                'created_by' => session()->get('id'),
                'updated_at'    => $this->now()
                // 'status' => 100,
            ];
            $compositionData = $this->request->getVar('composition[][]');
            // $compositionData = [
            //     'subject' => $this->request->getVar('subject[]'),
            //     'topic' => $this->request->getVar('topic[]'),
            //     'number_question' => $this->request->getVar('number_question[]'),
            // ];
            if ($data['random_question'] == '') {
                $data['random_question'] = '0';
            }
            if ($data['random_answer'] == '') {
                $data['random_answer'] = '0';
            }
            if ($data['result_to_student'] == '') {
                $data['result_to_student'] = '0';
            }

            // $data['begin_time'] = strtotime(str_replace(",", "", $data['begin_time']));
            // $data['end_time'] = strtotime(str_replace(",", "", $data['end_time']));

            // string replace
            $replaceBegin = str_replace('/', '-', $data['begin_time']);
            $replaceEnd = str_replace('/', '-', $data['end_time']);

            // reformat
            $newBeginDate = date('m/d/Y H:i', strtotime($replaceBegin));
            $newEndDate = date('m/d/Y H:i', strtotime($replaceEnd));

            $data['begin_time'] = strtotime($newBeginDate);
            $data['end_time'] = strtotime($newEndDate);

            $query = $this->TestModel->update($id, $data);
            if ($query) {
                $this->QuestionCompositionModel->where('test_id', $id)->delete();
                $data1 = array();
                $uuid2 = Uuid::uuid1();
                foreach ($compositionData as $row) {
                    $data1[] = array(
                        'id' => $uuid2->toString(),
                        'test_id' => $id,
                        'subject_id' => $row['subject'],
                        'topic_id' => $row['topic'],
                        'number_of_question' => $row['number_question'],
                    );
                }
                $compositionQuery = $this->QuestionCompositionModel->insertBatch($data1);
                if ($compositionQuery) {
                    $response['success'] = true;
                    $response['message']  = 'Data Berhasil Diupdate';
                    // $response['message']  = $data;
                } else {
                    $response['success'] = false;
                    $response['message']  = 'Data Gagal Diupdate';
                    // $response['message']  = $data;
                }
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Diupdate';
                // $response['message']  = $data;
            }
            echo json_encode($response);
        }
    }
}
