<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class QuestionCompotionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_question_composition';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'test_id',
        'subject_id',
        'topic_id',
        'number_of_question',
    ];

    // Dates
    protected $useTimestamps = false;

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
        $this->builder = $this->db->table($this->table);
    }

    public function get_composition($id)
    {   
        $query = $this->builder->select('to_subjects.subject, to_topics.topic, number_of_question')->join('to_subjects','to_subjects.id = to_question_composition.subject_id','left')->join('to_topics','to_topics.id = to_question_composition.topic_id','left')->getWhere(['test_id' => $id]);
        return $query->getResultArray();
    }
    public function get_composition_detail($id)
    {   
        $query = $this->builder->select('subject_id, topic_id, number_of_question')->getWhere(['test_id' => $id]);
        return $query->getResultArray();
    }
}
