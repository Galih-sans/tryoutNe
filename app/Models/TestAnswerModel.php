<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;

class TestAnswerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_test_answer';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'test_id',
        'student_id',
        'question_id',
        'answer_id',
        'answer_isright',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'int';
    protected $createdField  = 'created_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('to_test_answer');
    }

    protected function now()
    {
        return Time::now()->getTimestamp();
    }

    public function get_test_asnwer($test_id, $student_id)
    {
        // select to_test_answer join tabel to_questions dan to_answersselect( 'to_test_answer.test_id, to_test_answer.student_id,to_test_answer.question_id,to_test_answer.answer_id')->
        $query = $this->builder
            ->select(
                'to_answers.answer, 
            to_questions.question, 
            to_test_answer.test_id'
            )
            ->join(
                'to_answers',
                'to_answers.id = to_test_answer.answer_id',
                'left',
            )
            ->join(
                'to_questions',
                'to_questions.id = to_test_answer.question_id',
            )
            ->where(
                [
                    'to_test_answer.test_id' => $test_id,
                    'to_test_answer.student_id' => $student_id
                ]
            )
            ->get()->getResultArray();
        return $query;
    }

    public function get_question_id($test_id, $student_id)
    {
        $query = $this->builder
            ->select('question_id')
            ->where(['to_test_answer.test_id' => $test_id, 'to_test_answer.student_id' => $student_id])->orderBy('to_test_answer.id')
            ->get()->getResultArray();
        return $query;
    }

    public function get_answer_id($question_id, $student_id)
    {
        $query = $this->builder
            ->select('answer_id')
            ->where(['to_test_answer.question_id' => $question_id, 'to_test_answer.student_id' => $student_id])->orderBy('to_test_answer.id')
            ->get()->getResultArray();
        return $query;
    }

    // Hitung jumlah benar dan salah
    public function count_right($id_test, $student_id)
    {
        $query = $this->builder->where([
            'answer_isright' => 1,
            'test_id' => $id_test,
            'student_id' => $student_id,
        ])->countAllResults();

        return $query;
    }

    public function count_wrong($test_id, $student_id)
    {
        $query = $this->builder->where([
            'answer_isright' => 0,
            'test_id' => $test_id,
            'student_id' => $student_id,
        ])->countAllResults();

        return $query;
    }

    public function save_student_answer($answerNew)
    {
        $uuid = Uuid::uuid1();
        $test_answer_data = [
            'id' =>  $uuid->toString(),
            'test_id' => $answerNew['test_id'],
            'student_id' => $answerNew['student_id'],
            'question_id' => $answerNew['question_id'],
            'answer_id' => $answerNew['answer_id'],
            'answer_isright' => $answerNew['answer_isright'],
            'created_at'    => $this->now(),
            'updated_at'    => $this->now()
        ];
        return  $this->builder->insert($test_answer_data);
    }

    // public function delete_test_answer($question_id)
    // {
    //     $this->builder->where('question_id', $question_id);
    //     return $this->builder->delete();
    // }
}
