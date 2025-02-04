<?php

namespace App\Models\Admin;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Ramsey\Uuid\Uuid;

class AnswerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_answers';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'question_id',
        'answer',
        'answer_isright',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'int';
    protected $createdBy  = 'created_by';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules =
    [
        'question_id'     => 'required',
        'answer'        => 'required',
        'answer_isright'        => 'required',
    ];
    protected $validationMessages   = [
        'question_id'        => [
            'required' => 'ID pertanyaan Harus Diisi',
        ],
        'answer'        => [
            'required' => 'Jawaban Harus Diisi',
        ],
        'answer_isright'        => [
            'required' => 'Pilihan jawaban Benar Harus Diisi',
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }
    protected function now()
    {
        return Time::now()->getTimestamp();
    }

    public function delete_answer($question_id)
    {
        $this->builder->where('question_id', $question_id);
        return $this->builder->delete();
    }

    public function add_answer($data, $answer)
    {
        $uuid = Uuid::uuid1();
        $answer_data = [
            'id' =>  $uuid->toString(),
            'question_id' => $data['question_id'],
            'answer' => $answer['answer'],
            'answer_isright' => $answer['isright'],
            'created_by'    => $data['created_by'],
            'created_at'    => $this->now(),
            'updated_at'    => $this->now()
        ];
        return  $this->builder->insert($answer_data);
    }

    public function update_answer($id_answer, $answer)
    {
        $answer_data = [
            'answer' => $answer['answer'],
            'answer_isright' => $answer['isright'],
            'updated_at'    => $this->now()
        ];
        $this->builder->where('id', $id_answer);
        // $this->builder->where('question_id', $id_question);
        return $this->builder->update($answer_data);
    }

    public function get_answer($id)
    {
        $query = $this->builder->where('question_id', $id)->get();
        return $query->getResult();
    }
    public function get_answer1($id)
    {
        $query = $this->builder->select('id, answer, answer_isright')->where('question_id', $id)->get()->getResult();

        $data = array();
        foreach ($query as $item) {
            $data[] = array(
                "id" => $item->id,
                "answer" => $item->answer,
                "answer_isright" => $item->answer_isright,
            );
        }
        return $data;
    }

    public function checkanswer($id)
    {
        $query = $this->builder->select('answer_isright')->where('id', $id)->get()->getFirstRow();
        foreach ($query as $item) {
            $data = $item;
        }
        return $data;
    }

    public function get_answer_by_question($id)
    {
        $array_question = array_column($id, 'question_id');
        $query = $this->builder
            ->select(
                'to_questions.id, question, discussion, answer_isright,
                answer'
            )
            // ->whereIn('question_id', $array_question)
            ->join(
                'to_questions',
                'to_questions.id = to_answers.question_id',
                'right'
            )
            ->whereIn('to_questions.id', $array_question)
            // ->where('to_questions.id', $array_question)
            ->get()->getResultArray();

        return $query;
    }

    function array_group_by($key, $data)
    {
        $result = array();

        foreach ($data as $val) {
            $result[$val[$key]][] = $val;
        }

        return $result;
    }
}
