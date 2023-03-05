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

    public function __construct()
    {
        $this->pagedata['activeTab'] = "bank-soal";
        $this->pagedata['title'] = "Bank Soal Neo Edukasi";
        $this->banksoal_model = new BankSoalModel();
        $this->answer_model = new AnswerModel();
        $this->classModel = new ClassModel();
        $this->subjectModel = new SubjectModel();
        $this->TopicModel = new TopicModel();
    }
    public function index()
    {
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
        $column_order   = array('', 'question', 'discussion');
        $column_search  = array('question', 'discussion');
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
                $answerlist .= '<label><span>' . $alpha++ . '. ' . $answer->answer . '</span></label><br>';
            }
            $row = array();
            $row['number']  = $no;
            $row['question']  = '<fieldset><div class="h6"><span>Soal :</span>' . $lists->question . '</div>
            <div class="clearfix"><span>Jawaban : </span></br>' . $answerlist . '</div></fieldset>';
            $row['discussion']  = $lists->discussion;
            $row['action']  = '
            <div class="block-options">
            <button type="button" class="btn-block-option btn btn-light text-primary edit-button"
            data-id= "' . $lists->id . '"
            data-question= "' . $lists->question . '"
            data-discussion= "' . $lists->discussion . '"
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

        echo json_encode($response);
    }
    public function get_subject()
    {
        $class_id = $this->request->getVar('class_id');
        $data = $this->subjectModel->get_subject($class_id);
        $response = array();
        foreach ($data as $data) {
            $response[] = array(
                "id" => $data->id,
                "text" => $data->subject, PHP_EOL
            );
        }
        echo json_encode($response);
    }
    public function get_topic()
    {
        $subject_id = $this->request->getVar('subject_id');
        $data = $this->TopicModel->get_topic($subject_id);
        $response = array();
        foreach ($data as $data) {
            $response[] = array(
                "id" => $data->id,
                "text" => $data->topic, PHP_EOL
            );
        }
        echo json_encode($response);
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $delete = $this->banksoal_model->delete_question($id);
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
    public function create()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'question' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'answer.*' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'discussion' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                $response['success'] = false;
                $response['message'] = "Validation Error";
                $response['validation']  = $this->validator->getErrors();
                echo json_encode($response);
            } else {
                $question_data = [
                    'subject' => $this->request->getVar('subject'),
                    'topic' => $this->request->getVar('topic'),
                    'level' => $this->request->getVar('level'),
                    'question' => $this->request->getVar('question'),
                    'discussion'    => $this->request->getVar('discussion'),
                    'answer.*'    => $this->request->getVar('answer'),
                    // 'answer_isright.*'    => $this->request->getVar('answer_isright'),
                    'created_by'    => session()->get('id')
                ];

                if ($question_data['question'] == '<p><br></p>' or $question_data['discussion'] == '<p><br></p>') {
                    $response['success'] = false;
                    $response['message'] = "Validation Error";
                    $response['validation']  = "Isian Form Tidak Boleh Kosong";
                } else {
                    $response['success'] = true;
                    $response['message']  = 'Data Berhasil Ditambahkan';

                    foreach ($question_data['answer.*'] as $ui) {
                        if ($ui == '<p><br></p>') {
                            $response['success'] = false;
                            $response['message'] = "Validation Error";
                            $response['validation']  = "Isian Form Tidak Boleh Kosong";
                        }
                    }

                    if ($response['success'] == true) {
                        $question_data['question_id'] = $this->banksoal_model->add_question($question_data);
                        foreach ($question_data['answer.*'] as $answer) {
                            $this->answer_model->add_answer($question_data, $answer);
                        }
                    }
                }
                echo json_encode($response);
            }
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id_question = $this->request->getVar('id_question');
            // $id_question = 447;
            // $id = $this->request->getVar('id'); // test_id
            // if (!$this->validate([
            //     'question' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} harus diisi'
            //         ]
            //     ],
            //     'answer.*' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} harus diisi'
            //         ]
            //     ],
            //     'discussion' => [
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => '{field} harus diisi'
            //         ]
            //     ]
            // ])) 
            // {
            //     $response['success'] = false;
            //     $response['message'] = "Validation Error";
            //     $response['validation']  = $this->validator->getErrors();
            //     echo json_encode($response);
            // } else {
            $question_data = [
                'subject' => $this->request->getVar('edit_subject'),
                'topic' => $this->request->getVar('edit_topic'),
                'level' => $this->request->getVar('edit_level'),
                'question' => $this->request->getVar('edit_question'),
                'discussion'    => $this->request->getVar('edit_discussion'),
                // 'answer.*'    => $this->request->getVar('answer'),
                // 'answer_isright.*'    => $this->request->getVar('answer_isright'),
                'created_by'    => session()->get('id')
            ];

            $query = $this->banksoal_model->update($id_question, $question_data);
            if ($query) {
                $response['success'] = true;
                $response['message']  = 'Data Berhasil Diupdate';
            } else {
                $response['success'] = false;
                $response['message']  = 'Data Gagal Diupdate';
            }
            echo json_encode($response);
            // }
        }
    }
}
