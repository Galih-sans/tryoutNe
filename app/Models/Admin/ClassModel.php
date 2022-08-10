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
    }
}
