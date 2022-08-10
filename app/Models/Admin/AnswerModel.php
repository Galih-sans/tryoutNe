<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AnswerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_answers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
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
            'required' => 'Pilihan jawaban Benar Harus Diisi Harus Diisi',
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
}