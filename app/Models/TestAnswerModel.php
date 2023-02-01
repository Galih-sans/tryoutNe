<?php

namespace App\Models;

use CodeIgniter\Model;


class TestAnswerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_test_answer';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
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

    public function get_test_asnwer($test_id, $student_id)
    {
        // select to_test_answer join tabel to_questions dan to_answersselect( 'to_test_answer.test_id, to_test_answer.student_id,to_test_answer.question_id,to_test_answer.answer_id')->
        $query = $this->builder->join(
            'to_questions',
            'to_questions.id = to_test_answer.question_id'
        )->join(
            'to_answers',
            'to_answers.id = to_test_answer.answer_id',
            'left'
        )
            ->where(['to_test_answer.test_id' => $test_id, 'to_test_answer.student_id' => $student_id])
            ->get()->getResult();
        return $query;
    }

    public function get_question_id($test_id, $student_id)
    {
        $query = $this->builder->select('question_id')->where(['test_id' => $test_id, 'to_test_answer.student_id' => $student_id]);
        return $query->get()->getResultArray();
    }
}
