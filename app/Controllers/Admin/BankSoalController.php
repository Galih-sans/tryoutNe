<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AnswerModel;
use App\Models\Admin\BankSoalModel;
use App\Models\Admin\ClassModel;
use App\Models\Admin\SubjectModel;
use App\Models\Admin\TopicModel;

class BankSoalController extends BaseController
{
    public $banksoal_model;
    public $answer_model;
    public $classModel;
    public $subjectModel;
    public $TopicModel;
    public $pagedata;
    public $response;
    public $data;
    public $role_model;
    public $encrypter;

    public function __construct()
    {
        $this->pagedata['activeTab'] = "bank-soal";
        $this->pagedata['title'] = "Bank Soal Neo Edukasi";
        $this->banksoal_model = new BankSoalModel();
        $this->answer_model = new AnswerModel();
        $this->classModel = new ClassModel();
        $this->subjectModel = new SubjectModel();
        $this->TopicModel = new TopicModel();
        $this->role_model = new \App\Models\Admin\RoleModel();
        $this->encrypter = \Config\Services::encrypter();
    }
    public function index()
    {
        $id = $this->encrypter->decrypt(base64_decode(session()->get('role')));
        $this->data['role'] = $this->role_model->where('id', $id)->findAll();
        $this->data['class'] = $this->classModel->orderBy('id', 'ASC')->findAll();
        return view('admin/pages/bank-soal/index', ['pagedata' => $this->pagedata, 'data' => $this->data]);
    }
    public function dt_bank_soal()
    {
        $request = \Config\Services::request();
        $level = $this->request->getVar('level');
        $subject = $this->request->getVar('subject');
        $topic = $this->request->getVar('topic');
        $where = ['class_id' => $level, 'subject_id' => $subject, 'topic_id=' => $topic];
        $column_order = array('', 'question', 'discussion');
        $column_search = array('question', 'discussion');
        $order = array('id' => 'ASC');
        $list = $this->banksoal_model->get_datatables('to_questions', $column_order, $column_search, $order, $where);
        $data1 = array();
        $no = 0;
        foreach ($list as $lists) {
            $alpha = "A";
            $answerlist = '';
            $no++;
            $answers = $this->answer_model->get_answer($lists->id);
            foreach ($answers as $answer) {
                $answer->answer = preg_replace('/<span[^>]+\>/i', '', $answer->answer);
                $answer->answer = str_replace(['<p>', '</p>'], ['', ''], $answer->answer);
                $isright = "";
                if ($answer->answer_isright == 1) {
                    $isright = "text-success";
                }
                $answerlist .= '<label><span class="' . $isright . '">' . $alpha++ . '. ' . $answer->answer . '</span></label><br>';
            }
            $row = array();
            $row['number'] = $no;
            $row['question'] = '<fieldset><div class="h6"><span>Soal :</span>' . $lists->question . '</div>
            <div class="clearfix"><span>Jawaban : </span></br>' . $answerlist . '</div></fieldset>';
            $row['discussion'] = '<fieldset><div class="h6"><span>Pembahasan :</span>' . $lists->discussion  . '</div></fieldset>';
            $row['action'] = '
            <div class="block-options">
            <button type="button" class="btn-block-option btn btn-light text-primary edit-button"
            id= "' . $lists->id . '"
            >
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
            <button type="button" class="btn-block-option btn btn-light text-primary delete-button" data-id="' . $lists->id . '">
            <i class="fa-solid fa-trash"></i>
            </button>
            </div>
            ';
            $data1[] = $row;
        }
        $response = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $this->banksoal_model->count_all('to_questions', $where),
            "recordsFiltered" => $this->banksoal_model->count_filtered('to_questions', $column_order, $column_search, $order, $where),
            "data" => $data1,
        );

        return json_encode($response);
    }
    public function get_subject()
    {
        $class_id = $this->request->getVar('class_id');
        $data = $this->subjectModel->get_subject($class_id);
        $response = array();
        foreach ($data as $data) {
            $response[] = array(
                "id" => $data->id,
                "text" => $data->subject,
                PHP_EOL
            );
        }
        return json_encode($response);
    }
    public function get_topic()
    {
        $subject_id = $this->request->getVar('subject_id');
        $data = $this->TopicModel->get_topic($subject_id);
        $response = array();
        foreach ($data as $data) {
            $response[] = array(
                "id" => $data->id,
                "text" => $data->topic,
                PHP_EOL
            );
        }
        return json_encode($response);
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->banksoal_model->delete_question($id);
            $hapus_jawaban = $this->answer_model->delete_answer($id);
            if ($delete && $hapus_jawaban) {
                $response['success'] = true;
                $response['message'] = 'Data telah dihapus';
            } else {
                $response['success'] = false;
                $response['message'] = 'Data gagal dihapus';
            }

            return json_encode($response);
        }
    }
    public function create()
    {
        if ($this->request->isAJAX()) {
            $rules = [
                'question' => 'required',
                'answer.*' => 'required',
                'discussion' => 'required'
            ];
            $errors =
                [
                    'question' => [
                        'required' => 'Pertanyaan harus diisi'
                    ],
                    'answer.*' => [
                        'required' => 'Jawaban Harus harus diisi'
                    ],
                    'discussion' => [
                        'required' => 'Pembahasan harus diisi'
                    ]
                ];
            if (!$this->validate($rules, $errors)) {
                $response['success'] = false;
                $response['message'] = "Validation Error";
                $response['validation'] = "Isian Form Tidak Boleh Kosong";
                return json_encode($response);
            } else {
                $question_data = [
                    'subject' => $this->request->getVar('subject'),
                    'topic' => $this->request->getVar('topic'),
                    'level' => $this->request->getVar('level'),
                    'question' => $this->request->getVar('question'),
                    'discussion' => $this->request->getVar('discussion'),
                    'answer.*' => array_values($this->request->getVar('answer')),
                    'created_by' => session()->get('id')
                ];
                $isrightData = array();
                foreach ($question_data['answer.*'] as $answer) {
                    $isrightData[] = $answer['isright'];
                }
                if (!in_array('1', $isrightData)) {
                    $response['success'] = false;
                    $response['message'] = "Validation Error";
                    $response['validation'] = "Silahkan pilih jawaban yang benar";
                    return json_encode($response);
                }
                if ($question_data['question'] == '<p><br></p>' or $question_data['discussion'] == '<p><br></p>') {
                    $response['success'] = false;
                    $response['message'] = "Validation Error";
                    $response['validation'] = "Isian Form Tidak Boleh Kosong";
                } else {
                    $response['success'] = true;
                    $response['message'] = 'Data Berhasil Ditambahkan';

                    foreach ($question_data['answer.*'] as $ui) {
                        if ($ui == '<p><br></p>') {
                            $response['success'] = false;
                            $response['message'] = "Validation Error";
                            $response['validation'] = "Isian Form Tidak Boleh Kosong";
                        }
                    }
                    if ($response['success'] == true) {
                        $question_data['question_id'] = $this->banksoal_model->add_question($question_data);
                        foreach ($question_data['answer.*'] as $answer) {
                            $this->answer_model->add_answer($question_data, $answer);
                        }
                    }
                }
                return json_encode($response);
            }
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            $id_question = $this->request->getVar('id_question');
            $edit_question_data = [
                'question' => $this->request->getVar('edit_question'),
                'discussion' => $this->request->getVar('edit_discussion'),
                'answer.*'    => array_values($this->request->getVar('edit_answer')),
                'created_by' => session()->get('id'),
            ];
            $editIsrightData = array();
            foreach ($edit_question_data['answer.*'] as $answer) {
                $editIsrightData[] = $answer['isright'];
            }
            if (!in_array('1', $editIsrightData)) {
                $response['success'] = false;
                $response['message'] = "Validation Error";
                $response['validation'] = "Silahkan pilih jawaban yang benar";
                return json_encode($response);
            }

            // update jawaban
            // hapus jawaban lama lalu insert dgn jawaban baru
            // $i = 0;
            $id_answer[] = $this->request->getVar('id_answer');
            $this->answer_model->delete_answer($id_question);
            foreach ($edit_question_data['answer.*'] as $answer) {
                $edit_question_data['question_id'] = $id_question;
                // $answerId = $this->request->getVar('id_answer[' . $i . ']');
                $this->answer_model->add_answer($edit_question_data, $answer);
                // $i++;
            }

            // update soal
            $query = $this->banksoal_model->update($id_question, $edit_question_data);
            if ($query) {
                $response['success'] = true;
                $response['message'] = 'Data Berhasil Diupdate';
            } else {
                $response['success'] = false;
                $response['message'] = 'Data Gagal Diupdate';
            }
            return json_encode($response);
            // }
        }
    }

    public function get_soal_detail()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id'); // id question
            $questionData = $this->banksoal_model->get_edit_soal($id);
            $answerData = $this->answer_model->get_answer1($id);

            $data['soalData'] = $questionData;
            $data['jawabanData'] = $answerData;
            return json_encode($data);
        }
    }
}
