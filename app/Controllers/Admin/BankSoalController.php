<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\BankSoalModel;
use App\Models\Admin\ClassModel;
use App\Models\Admin\SubjectModel;

class BankSoalController extends BaseController
{
    public $banksoal_model;
    public $classModel;
    public $subjectModel;
    public $pagedata;
    public $data;
    
    public function __construct()
    {
        $this->pagedata['activeTab'] = "bank-soal";
        $this->pagedata['title'] = "Bank Soal Neo Edukasi";
        $this->banksoal_model = new BankSoalModel();
        $this->classModel = new ClassModel();
        $this->subjectModel = new SubjectModel();
    }
    public function index()
    {
        $this->data['class'] = $this->classModel->orderBy('id', 'ASC')->findAll();
        return view('admin/pages/bank-soal/index', ['pagedata'=> $this->pagedata, 'data'=> $this->data]);
    }
    public function dt_bank_soal()
    {   
        $level = $this->request->getVar('level');
        $subject = $this->request->getVar('subject');
        $banksoal_model = $this->banksoal_model;
        $where = ['id !=' => 0];
        $column_order   = array('', 'question', 'discussion');
        $column_search  = array('question', 'discussion');
        $order = array('question' => 'ASC');
        $list = $banksoal_model->get_datatables('to_questions', $column_order, $column_search, $order,$level,$subject,$where);
        $data1 = array();
        $no = 0;
        foreach ($list as $lists) {
            $no++;
            $row    = array();
            $row['number']  = $no;
            $row['question']  = $lists->question;
            $row['discussion']  = $lists->discussion;
            $row['action']  = '
            <div class="block-options">
            <button type="button" class="btn-block-option btn btn-light text-primary edit-button" data-id="'.$lists->id.'">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
            <button type="button" class="btn-block-option btn btn-light text-primary delete-button" data-id="'.$lists->id.'">
            <i class="fa-solid fa-trash"></i>
            </button>
            </div>
            ';
            $data1[] = $row;
        }
        $output = array(
            "draw" => true,
            "data" => $data1,
        );

        echo json_encode($output);
    }
    public function get_subject()
    {
        $class_id = $this->request->getVar('class_id');
        $data = $this->subjectModel->get_subject($class_id);
        $response = array();
        foreach($data as $data)
        { 
                $response[] = array(
                    "id"=>$data->id,
                    "text"=>$data->subject, PHP_EOL
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
                $this->output['success'] = true;
                $this->output['message']  = 'Data telah dihapus';
            }else{
                $this->output['success'] = false;
                $this->output['message']  = 'Data gagal dihapus';
            }

            echo json_encode($this->output);
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
                $this->output['success'] = false;
                $this->output['message'] = "Validation Error";
                $this->output['validation']  = $this->validator->getErrors();
                echo json_encode($this->output);
            } else {
                $question_data = [
                    'subject' => $this->request->getVar('subject'),
                    'level' => $this->request->getVar('level'),
                    'question' => $this->request->getVar('question'),
                    'discussion'    => $this->request->getVar('discussion'),
                    'answer.*'    => $this->request->getVar('answer'),
                    'created_by'    => session()->get('id')
                ];

                if($question_data['question'] == '<p><br></p>' or $question_data['discussion'] == '<p><br></p>'){
                    $this->output['success'] = false;
                    $this->output['message'] = "Validation Error";
                    $this->output['validation']  = "Isian Form Tidak Boleh Kosong";
                    
                }else{
                    $this->output['success'] = true;
                    $this->output['message']  = 'Data Berhasil Ditambahkan';

                    foreach ($question_data['answer.*'] as $ui){
                        if($ui == '<p><br></p>'){
                           $this->output['success'] = false;
                           $this->output['message'] = "Validation Error";
                           $this->output['validation']  = "Isian Form Tidak Boleh Kosong";
                        }
                    }

                    if($this->output['success'] == true){
                        $question_data['question_id'] = $this->banksoal_model->add_question($question_data);
                        foreach ($question_data['answer.*'] as $answer){
                            
                        }
                    }
                }

                echo json_encode($this->output);
            }           
        }
    }


}