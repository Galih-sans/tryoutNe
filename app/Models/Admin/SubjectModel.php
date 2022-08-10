<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_subjects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'class_id',
        'subject'
    ];

    // Validation
    protected $validationRules =
        [
            'class_id'     => 'required',
            'subject'        => 'required',
    ];
    protected $validationMessages   = [
        'class_id'        => [
            'required' => 'Kelas Harus Diisi',
        ],
        'subject'        => [
            'required' => 'Mata Pelajaran Harus Diisi',
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('to_subjects');
    }

    public function get_subject($id)
    {   
        $query = $this->builder->getWhere(['class_id' => $id]);
        return $query->getResult();
    }
}
