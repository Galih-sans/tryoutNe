<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_admins';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'full_name',
        'email',
        'password',
        'gender',
        'role',
        'token',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'int';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'full_name'     => 'required',
        'email'        => 'required',
        'password'     => 'required',
        'role'        => 'required',
    ];
    protected $validationMessages   = [
        'full_name'        => [
            'required' => 'Nama Harus Diisi',
        ],
        'email'        => [
            'required' => 'Email Harus Diisi',
        ],
        'password'        => [
            'required' => 'Harus Diisi',
        ],
        'role'        => [
            'required' => 'Role Harus Diisi',
        ]
    ];
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

    protected function now()
    {
        return Time::now()->getTimestamp();
    }

    public function add_admin($data)
    {
        $answer_data = [
            'id' => $data['id'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
            'created_at'    => $this->now(),
        ];
        return  $this->builder->insert($answer_data);
    }

    protected function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        // $this->builder = $this->db->table($table);
        $this->builder->select(
            'to_admins.id,
            to_admins.full_name,
            to_admins.email,
            to_admins.role,
            to_roles.role_name'
        )->join('to_roles', 'to_roles.id=to_admins.role', 'left');
        // ADMIN JOIN ROLE
        //jika ingin join formatnya adalah sebagai berikut :
        //$this->builder->join('tabel_lain','tabel_lain.kolom_yang_sama = pengguna.kolom_yang_sama','left');
        //end Join
        $i = 0;

        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->builder->groupStart();
                    $this->builder->like($item, $_POST['search']['value']);
                } else {
                    $this->builder->orLike($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->builder->groupEnd();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->builder->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->builder->orderBy(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($table, $column_order, $column_search, $order, $data = '')
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if ($_POST['length'] != -1)
            $this->builder->limit($_POST['length'], $_POST['start']);
        if ($data) {
            $this->builder->where($data);
        }

        $query = $this->builder->get();
        return $query->getResult();
    }

    public function count_filtered($table, $column_order, $column_search, $order, $data = '')
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if ($data) {
            $this->builder->where($data);
        }
        $this->builder->get();
        return $this->builder->countAll();
    }

    public function count_all($table, $data = '')
    {
        if ($data) {
            $this->builder->where($data);
        }
        $this->builder->from($table);

        return $this->builder->countAll();
    }
}
