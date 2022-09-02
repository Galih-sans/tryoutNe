<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_topics';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'subject_id',
        'topic'
    ];

    // Validation
    protected $validationRules =
        [
            'subject_id'     => 'required',
            'topic'        => 'required',
    ];
    protected $validationMessages   = [
        'subject_id'        => [
            'required' => 'Mata Pelajaran Harus Diisi',
        ],
        'topic'        => [
            'required' => 'Topik Mata Pelajaran Harus Diisi',
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    


    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('to_topics');
    }

    public function create($data)
    {
        $query = $this->builder->insert($data);
        return $query;
    }

    public function delete_topic($id)
    {
        $this->builder->where('id', $id);
        return $this->builder->delete();
    }

    public function get_datatables($subject_id)
    {
        $query = $this->builder->where('subject_id',$subject_id)->get();
        return $query->getResult();
    }
    public function update_topic($id,$data)
    {
        $this->builder->where('id', $id);
        return $this->builder->update($data);
    }
    public function get_subject($id)
    {   
        $query = $this->builder->getWhere(['class_id' => $id]);
        return $query->getResult();
    }
    public function get_topic($id)
    {   
        $query = $this->builder->getWhere(['subject_id' => $id]);
        return $query->getResult();
    }
}
