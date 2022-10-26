<?php

namespace App\Models;

use App\Models\Admin\AnswerModel;
use App\Models\Admin\BankSoalModel;
use App\Models\Admin\QuestionCompotionModel;
use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class TestModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_tests';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'test_name',
        'begin_time',
        'end_time',
        'duration',
        'number_of_question',
        'random_question',
        'random_answer',
        'result_to_student',
        'report_to_student',
        'type',
        'price',
        'class_id',
        'subject_id',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'int';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules =
    [
        'test_name'=> 'required',
        'begin_time'=> 'required',
        'end_time'=> 'required',
        'duration'=> 'required',
        'number_of_question'=> 'required',
        'type'=> 'required',
        'class_id'=> 'required',
    ];
    protected $validationMessages   = 
    [
        'test_name'        => [
            'required' => 'Nama Test Harus Diisi',
        ],
        'begin_time'        => [
            'required' => 'Tanggal Test Dibuka Harus Diisi',
        ],
        'end_time'        => [
            'required' => 'Tanggal Test Ditutup Harus Diisi',
        ],
        'duration'=> [
            'required' => 'Durasi Test Harus Diisi',
        ],
        'number_of_question'=> [
            'required' => 'Jumlah Soal Harus Diisi',
        ],
        'type'=> [
            'required' => 'Kategori Test Harus Diisi',
        ],
        'class_id'=> [
            'required' => 'Kelas Test Harus Diisi',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('to_tests');
    }

    public function get_test($class_id)
    {   
        $query = $this->builder->select('to_tests.id,to_tests.test_name, begin_time, end_time,type, price, status, duration, count(to_question_composition.test_id) as composition')->join('to_question_composition','to_question_composition.test_id = to_tests.id')->groupBy('to_question_composition.test_id')->where('to_tests.class_id',$class_id)->get();
        return $query->getResult();
    }

    public function getDetailTest($id)
    {   
        $query = $this->builder->select('to_tests.id,to_tests.test_name, begin_time, end_time,type, price, status, duration, count(to_question_composition.test_id) as composition')->join('to_question_composition','to_question_composition.test_id = to_tests.id')->groupBy('to_question_composition.test_id')->where('to_tests.id',$id)->get();
        return $query->getFirstRow();
    }

    public function get_test_question($data)
    {   
        $BankSoalModel = new BankSoalModel();
        $AnswerModel = new AnswerModel();
        $query = $BankSoalModel->get_test_question($data);
        if($query != null){
            $data = array();
            foreach($query as $item){
                $data[] = array(
                    "id"=>$item->id,
                    "question"=>$item->question,
                    "answer"=>$AnswerModel->get_answer1($item->id),
                );
            }
            return $data;
        }
    }

    public function get_test_composition($id)
    {
        $QuestionCompotionModel = new QuestionCompotionModel();
        $query = $QuestionCompotionModel->get_composition_detail($id);
        if($query != null){
            $data = array();
            foreach($query as $item){
                $data[] = $this->get_test_question($item);
            }
        }
        return $data;
    }

    public function checkanswer($id)
    {
        $AnswerModel = new AnswerModel();
        $query = $AnswerModel->checkanswer($id);
        return $query;
    }


}