<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_class';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['class','level'];

    // Validation
    protected $validationRules =
        [
            'level'     => 'required',
            'class'        => 'required',
    ];
    protected $validationMessages   = [
        'level'        => [
            'required' => 'Jenjang Harus Diisi',
        ],
        'class'        => [
            'required' => 'Kelas Harus Diisi',
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

    public function get_datatables()
    {
        $query = $this->builder->get();
        return $query->getResult();
    }
    public function create($data)
    {
        $query = $this->builder->insert($data);
        return $query;
    }
    public function delete_class($id)
    {
        $this->builder->where('id', $id);
        return $this->builder->delete();
    }
    public function update_class($id,$data)
    {
        $this->builder->where('id', $id);
        return $this->builder->update($data);
    }
    public function get_class($id)
    {   
        $query = $this->builder->getWhere(['id' => $id]);
        return $query->getRow();
    }
}
