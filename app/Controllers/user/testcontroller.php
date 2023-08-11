<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\Admin\QuestionCompotionModel;
use App\Models\TestModel;
use App\Models\Admin\AnswerModel;
use App\Models\StudentModel;
use App\Models\TestAnswerModel;
use App\Models\TestResultModel;
use CodeIgniter\I18n\Time;
use Config\App;
use Ramsey\Uuid\Uuid;
// use App\Models\QuestionModel;

class testcontroller extends BaseController
{
    public $pagedata;
    public $uri;
    public $TestModel;
    public $StudentModel;
    public $TestTransactionModel;
    public $AnswerTestModel;
    public $BalanceModel;
    public $encrypter;
    public $AdminTestModel;
    public $AnswerModelNew;
    public $WeeklyScoreModel;
    public $LogBalanceModel;
    public $offer_model;
    public function __construct()
    {
        $this->TestTransactionModel = new \App\Models\TestTransactionModel();
        $this->uri = service('uri');
        $this->encrypter = \Config\Services::encrypter();
        $this->TestModel = new TestModel();
        $this->AnswerModelNew = new \App\Models\Admin\AnswerModel();
        $this->AnswerTestModel = new \App\Models\TestAnswerModel();
        $this->AdminTestModel = new \App\Models\Admin\TestModel();
        $this->StudentModel = new StudentModel();
        $this->LogBalanceModel = new \App\Models\Admin\LogBalanceModel();
        $this->WeeklyScoreModel = new \App\Models\WeeklyScoreModel();
        $this->BalanceModel = new \App\Models\Admin\BalanceSiswaModel();
        $this->offer_model = new \App\Models\Admin\OffersModel();

        $this->pagedata['activeTab'] = "test";
    }
    protected function now()
    {
        return Time::now()->getTimestamp();
    }

    public function index()
    {
        $id = session()->get('id');
        $balanceSiswa = $this->BalanceModel->where('user_id', $id)->first();
        session()->set('balance', $balanceSiswa->balance);
        $this->pagedata['title'] = "Daftar Test - Neo Edukasi";
        $this->pagedata['encrypter'] = $this->encrypter;
        $this->pagedata['testData'] = $this->TestModel->get_test($this->StudentModel->getClass($id));
        return view('user/pages/test/index', ['data' => $this->pagedata]);
    }

    public function detail()
    {
        $QuestionCompotionModel = new QuestionCompotionModel();
        $TestResultModel = new TestResultModel();
        $this->pagedata['title'] = "Detail Test - Neo Edukasi";
        $id = $this->encrypter->decrypt(base64_decode(strtr($this->uri->getSegment(3), array('.' => '+', '-' => '=', '~' => '/'))));
        $student_id = session()->get('id');
        $this->pagedata['testData'] = $this->TestModel->getDetailTest($id);
        $this->pagedata['encrypter'] = $this->encrypter;
        $this->pagedata['testData']->question_compositon = $QuestionCompotionModel->user_get_composition($id);
        $cek_student_result = count($TestResultModel->where('student_id', $student_id)->where('test_id', $id)->findAll());
        $sisaPengerjaan = (int)$this->pagedata['testData']->max_result - (int)$cek_student_result;
        $this->pagedata['sudahMengerjakan'] = $cek_student_result;
        $this->pagedata['sisaPengerjaan'] = $sisaPengerjaan;

        return view('user/pages/test/view', ['data' => $this->pagedata]);
    }
    public function sheet()
    {
        $this->pagedata['title'] = "Halaman Pengerjaan Test - Neo Edukasi";
        // $this->pagedata['encrypter'] = $this->encrypter;
        $id = $this->encrypter->decrypt(base64_decode(strtr($this->uri->getSegment(3), array('.' => '+', '-' => '=', '~' => '/'))));

        $this->pagedata['test'] = $this->TestModel->getDetailTest($id);
        $this->pagedata['testData'] = json_encode($this->TestModel->get_test_composition($id));

        return view('user/pages/test/sheet', ['data' => $this->pagedata]);
    }

    public function get_test()
    {
        if ($this->request->isAJAX()) {
            // $this->pagedata['encrypter'] = $this->encrypter;
            $id = $this->request->getVar('id');
            // $class_id = $this->StudentModel->getClass(session()->get('id'));
            //get Soal
            $question = $this->TestModel->get_test_composition($id);
            $arr_jawab = array();
            $html = '';
            $no = 1;
            foreach ($question as $s) {
                foreach ($s as $s1) {
                    $path = 'uploads/bank_soal/';
                    // $vrg = $arr_jawab[$s1['id']]["r"] == "" ? "N" : $arr_jawab[$s1['id']]["r"];
                    $html .= '<input type="hidden" name="answer[' . $no . '][question]" value="' . $s1['id'] . '">';
                    $html .= '<input type="hidden" name="answer[' . $no . '][notsure]" id="rg_' . $no . '" value="N">';
                    $html .= '<div class="step" id="widget_' . $no . '">';

                    $html .= '<div class="text-center"><div class="w-25"></div></div>' . $s1['question'] . '<div class="funkyradio">';
                    $i = 1;
                    $oi = "A";
                    foreach ($s1['answer'] as $s2) {
                        $opsi             = "opsi_" . $i;
                        $file             = "file_" . $i;
                        // $checked 		= $arr_jawab[$s->id_soal]["j"] == strtoupper($arr_opsi[$j]) ? "checked" : "";
                        // $pilihan_opsi 	= !empty($s->$opsi) ? $s->$opsi : "";
                        // $tampil_media_opsi = (is_file(base_url().$path.$s->$file) || $s->$file != "") ? tampil_media($path.$s->$file) : "";
                        $html .= '<div class="funkyradio-success" onclick="return simpan_sementara();">
                        <input type="radio" id="opsi_' . strtolower($i) . '_' . $s1['id'] . '" name="answer[' . $no . '][answer]" data-opsi = "' . strtoupper($oi) . '" value="' . $s2['id'] . '"> <label for="opsi_' . strtolower($i) . '_' . $s1['id'] . '"><div class="huruf_opsi d-flex flex-wrap justify-content-center align-items-center">' . $oi . '</div> <p>' . $s2['answer'] . '</p><div class="w-25"></div></label></div>';
                        $i++;
                        $oi++;
                    }
                    $html .= '</div></div>';
                    $no++;
                }
            }
            $data = [
                'number'         => $no,
                'html'         => $html,
                'test_id'    => $id
            ];
            echo json_encode($data);
        }
    }

    public function submit()
    {
        $TestAnswerModel = new TestAnswerModel();
        $TestResultModel = new TestResultModel();
        $data = $this->request->getVar('answer[][]');
        $id = $this->request->getVar('id');
        $begin_time = $this->request->getVar('begin_time');
        $perhitungan = $this->TestModel->test_answer_value($id);
        $result = 0;
        foreach ($data as $item) {
            $uuid = Uuid::uuid1();
            if (isset($item['answer'])) { // jika answer ada
                // $answer[] = array(
                //     "id" => $uuid->toString(),
                //     "test_id" => $id,
                //     "student_id" => session()->get('id'),
                //     "question_id" => $item['question'],
                //     "answer_id" => $item['answer'],
                //     "answer_isright" => $this->TestModel->checkanswer($item['answer']),
                // );
                $answerNew = [
                    'id' => $uuid->toString(),
                    'test_id' => $id,
                    'student_id' => session()->get('id'),
                    'question_id' => $item['question'],
                    'answer_id' => $item['answer'],
                    'answer_isright' => $this->TestModel->checkanswer($item['answer']),
                ];

                if ($this->TestModel->checkanswer($item['answer'])) {
                    $result += $perhitungan->true;
                } else {
                    $result -= $perhitungan->false;
                }
                // $TestAnswerModel->where(['test_id' => $id, "student_id" => session()->get('id'), "question_id" => $item['question'], "answer_id" => $item['answer'], "answer_isright" => $this->TestModel->checkanswer($item['answer'])])->delete();
                $TestAnswerModel->where(['test_id' => $id, "student_id" => session()->get('id'), "question_id" => $item['question']])->delete();

                $TestAnswerModel->save_student_answer($answerNew);
            } else {
                // $answer[] = array(
                //     "id" => $uuid->toString(),
                //     "test_id" => $id,
                //     "student_id" => session()->get('id'),
                //     "question_id" => $item['question'],
                //     "answer_id" => 0,
                //     "answer_isright" => 0,
                // );
                $answerNew = [
                    'id' => $uuid->toString(),
                    'test_id' => $id,
                    'student_id' => session()->get('id'),
                    'question_id' => $item['question'],
                    'answer_id' => 0,
                    'answer_isright' => 0,
                ];
                $result += $perhitungan->null;
                // $TestAnswerModel->where(['test_id' => $id, "student_id" => session()->get('id'), "question_id" => $item['question'], "answer_id" => 0, "answer_isright" => 0])->delete();
                $TestAnswerModel->where(['test_id' => $id, "student_id" => session()->get('id'), "question_id" => $item['question']])->delete();

                $TestAnswerModel->save_student_answer($answerNew);
            }
        }

        $uuid2 = Uuid::uuid1();
        $resultData = [
            "id" => $uuid2->toString(),
            "student_id" => session()->get('id'),
            "test_id" => $id,
            "begin_time" => $begin_time,
            "end_time" => Time::now()->getTimestamp(),
            "score" => $result,
        ];

        $TestResultModel->insert($resultData);
        // $TestAnswerModel->insertBatch($answer);
        
        // $data = [
        //     'test_result' => $result . " &frasl; " . (count($data) * $perhitungan->true),
        //     'user-answer' => $answer,
        // ];
        // $this->pagedata['output'] = [
        //     'test_result' => $result." &frasl; ".(count($data)*$perhitungan->true),
        //     'user-answer' => $answer,
        // ];

        $this->save_best_score($result, $id);

        return redirect()->to(base_url('test/result/' . strtr(base64_encode($this->encrypter->encrypt($id)), array('+' => '.', '=' => '-', '/' => '~'))));
    }

    public function result()
    {
        $id = $this->encrypter->decrypt(base64_decode(strtr($this->uri->getSegment(3), array('.' => '+', '-' => '=', '~' => '/'))));
        $this->pagedata['title'] = "Hasil Test - Neo Edukasi";
        $this->pagedata['encrypter'] = $this->encrypter;


        $TestResultModel = new TestResultModel();
        $TestAnswerModel = new TestAnswerModel();
        $AnswerModel = new AnswerModel();
        // $QuestionModel = new QuestionModel();

        $question_id = $TestAnswerModel->get_question_id($id, session()->get('id'));


        $data = $TestResultModel->where(['student_id' => session()->get('id'), 'test_id' => $id])->orderBy('score', 'DESC')->orderBy('begin_time', 'DESC')->first();
        $data_ranking = $TestResultModel->testResult($id, session()->get('id'));
        $data_best_score = $this->WeeklyScoreModel->where('test_id', $id)->orderBy('best_score', 'DESC')->findAll();

        $bestscoredata = [];
        $i = 0;
        foreach ($data_best_score as $score) {
            $student_id = $score->student_id;
            $full_name = $this->StudentModel->where('id', $student_id)->first();
            $bestscoredata[$i]['Rank'] = $i + 1;
            $bestscoredata[$i]['full_name'] = $full_name['full_name'];
            $bestscoredata[$i]['score'] = $score->best_score;
            $i++;
        }

        $question_answer = $AnswerModel->get_answer_by_question($question_id);

        $questionAnswer = [];
        foreach ($question_answer as $item) {
            $key = "{$item['id']}";
            $answer_data = $TestAnswerModel->get_answer_id($key, session()->get('id'));
            $answer_id = $answer_data[0]['answer_id'];
            if (!array_key_exists($key, $questionAnswer)) {
                $questionAnswer[$key] = $item;
                $questionAnswer[$key]['answer'] = [];
            }
            if (!in_array($item['answer'], $questionAnswer[$key]['answer'])) {
                if ($answer_id == 0) {
                    $questionAnswer[$key]['answer'][] = array(
                        'answer' => $item['answer'], 
                        'answer_isright' => $item['answer_isright'],
                        'student_answer' => '( anda tidak menjawab )',
                        'student_isright' => 0,
                    );
                } else {
                    $answerData = $this->AnswerModelNew->where('id', $answer_id)->first();
                    $isrightData = $this->AnswerModelNew->where('id', $answer_id)->first();
                    $questionAnswer[$key]['answer'][] = array(
                        'answer' => $item['answer'], 
                        'answer_isright' => $item['answer_isright'],
                        'student_answer' => $answerData['answer'],
                        'student_isright' => $isrightData['answer_isright'],
                    );
                }
                
            }   
            unset($questionAnswer[$key]['answer_isright']);
        }

        $this->pagedata['data'] = [
            'student_score' => $data['score'],
            'test_id' => $this->uri->getSegment(3),
            // 'data_ranking' => $data_ranking,
            'data_best_score' => $bestscoredata,
            'grouped_pilihan' => $questionAnswer,
            'soalTest' => $question_answer,
        ];

        $this->pagedata['waktu'] = strtotime(date("Y/m/d h:i:s"));

        // dd($questionAnswer);
        return view('user/pages/test/result', ['data' => $this->pagedata]);
    }

    public function cek_max_result()
    {
        if ($this->request->isAJAX()) {    
            $TestResultModel = new TestResultModel();
            $student_id = session()->get('id');
            $test_id = $this->encrypter->decrypt(base64_decode(strtr($this->request->getVar('test_id'), array('.' => '+', '-' => '=', '~' => '/'))));

            $cek_student_result = count($TestResultModel->where('student_id', $student_id)->where('test_id', $test_id)->findAll());
            $test_data = $this->AdminTestModel->where('id', $test_id)->first();
            $max_result = $test_data['max_result'];
            if ($cek_student_result >= $max_result) { // melebihi batas
                $data['success'] = false;
                // $data['test_id'] = $test_data['max_result'];
            } else { // memenuhi
                $data['success'] = true;
                // $data['test_id'] = $test_data['max_result'];
            }
            
            echo json_encode($data);
            exit();
        }
    }

    public function cek_test_transaction()
    {
        if ($this->request->isAJAX()) {
            $student_id = session()->get('id');
            $cek_test_transaction = $this->TestTransactionModel->where('student_id', $student_id)->first();
            if ($cek_test_transaction == true) { // true jika terbeli
                $data['success'] = true;
            } else {
                $data['success'] = false;
            };
            
        echo json_encode($data);
        exit();
        }
    }

    public function buy_test()
    {
        if ($this->request->isAJAX()) {
            $test_id = $this->request->getVar('test_id');
            $student_id = session()->get('id');

            $testData = $this->TestModel->where('id', $test_id)->first();
            $balanceSiswa = $this->BalanceModel->where('user_id', $student_id)->first();

            $purchase_data = [
                'test_id' => $test_id,
                'student_id' => $student_id,
                'created_at' => $this->now(),
            ];
            
            
            if ($this->request->getVar('final_price') == 'undefined') {
                $totalBalance = (int)$balanceSiswa->balance - (int)$testData->price;
            } else {
                $totalBalance = (int)$balanceSiswa->balance - (int)$this->request->getVar('final_price');
                $testData->price = (int)$this->request->getVar('final_price');
            }
            
            if ($this->request->getVar('kode_voucher') == 'undefined') {
                $purchase_data['offer_id'] = '';
                $totalBalance = (int)$balanceSiswa->balance - (int)$testData->price;
            } else {
                $offer_data = $this->offer_model->where('offer_code', $this->request->getVar('kode_voucher'))->where('status', 'active')->where('type', 'test')->findAll();
                $purchase_data['offer_id'] = $offer_data[0]->id;
            }
            
            $balanceData = [
                'balance' => $totalBalance,
                'updated_at' => $this->now(),
            ];

            // apakah balance cukup
            if ($totalBalance < 0) {
                $data['success'] = false;
                $data['messege'] = 'Diamond Kurang';
                echo json_encode($data);
                exit();
            } else {
                $query_test = $this->TestTransactionModel->purchase_test($purchase_data);
                $query_balance = $this->BalanceModel->update($student_id, $balanceData);
                $uuidlog = Uuid::uuid1();
                $logData = [
                    'id' => $uuidlog->toString(),
                    'student_id' => $student_id,
                    'type' => 'pembelian',
                    'amount' => $testData->price,
                    'total' => $totalBalance,
                    'timestamp' => date("Y/m/d H:i:s",time()),
                    'status' => '',
                    'created_at' => $this->now()
                ];
                $query_log = $this->LogBalanceModel->create_log($logData); // return false
            }
            if ($query_test && $query_balance && $query_log) {
                $data['success'] = true;
            } else {
                $data['success'] = false;
                // rollback
                $balanceData = [
                    'balance' => (int)$balanceSiswa->balance,
                    'updated_at' => $this->now(),
                ];
                $this->BalanceModel->update($student_id, $balanceData);
                $logData['type'] = 'pengembalian';
                $logData['total'] = $balanceSiswa->balance;
                $query_log = $this->LogBalanceModel->create_log($logData);
                $TestTransData = $this->TestTransactionModel->where('test_id', $test_id)->first();
                if ($TestTransData == true) {
                    $this->TestTransactionModel->delete($TestTransData->id);
                }
            }

            echo json_encode($data);
            exit();
        }
    }

    // simpan nilai terbaik dari result siswa untuk ditampilkan setiap minggu
    public function save_best_score($score, $test_id)
    {   
        $student_id = session()->get('id');
        $check_prev_data = $this->WeeklyScoreModel->where('student_id', $student_id)->first();
        $uuid2 = Uuid::uuid1();
        $weekly_data = [
            "student_id" => session()->get('id'),
            "best_score" => $score,
            "test_id" => $test_id,
        ];
        if ($check_prev_data == true) {
            $prev_score = $check_prev_data->best_score;
            $weekly_data["updated_at"] = $this->now();
            if ($score > $prev_score){
                $this->WeeklyScoreModel->update($check_prev_data->id, $weekly_data);
            }
        } else {
            $weekly_data["id"] = $uuid2->toString();
            $weekly_data["created_at"] = $this->now();
            $this->WeeklyScoreModel->insert($weekly_data);
        }
    }

    public function check_voucher()
    {
        if ($this->request->isAJAX()) {
        $data = array();
        $data['diskon'] = 0;
        $data['string'] = array();
        $test_id = $this->encrypter->decrypt(base64_decode(strtr($this->request->getVar('test_id'), array('.' => '+', '-' => '=', '~' => '/'))));
        $offer_data = $this->offer_model->where('offer_code', $this->request->getVar('kode_voucher'))->where('status', 'active')->where('type', 'test')->findAll();
        $dataTest =  $this->TestModel->where('id', $test_id)->findAll();

        if ($this->request->getVar('kode_voucher') == '') {
            $data['string'][] = 'Masukan Kode Voucher Terlebih Dahulu';
            $data['success'] = false;
        } elseif ($offer_data == true) {
            $pricexpercent = ((int)$dataTest[0]->price * (int)$offer_data[0]->discount_percentage)/100;
            if ($pricexpercent > (int)$offer_data[0]->discount_amount) {
                $discount_price = (int)$offer_data[0]->discount_amount;
            } else {
                $discount_price = $pricexpercent;
            }
            $data['string'][] = 'Voucher Berhasil Digunakan';
            $data['success'] = true;
            $data['potongan'] = $discount_price;
            $data['code'] = $offer_data[0]->offer_code;
        } elseif ($offer_data == false) {
            $data['string'][] = 'Voucher Gagal Digunakan / Tidak Berlaku';
            $data['success'] = false;
        }
        echo json_encode($data);
        exit();
    }
    }
}
