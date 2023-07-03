<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class DiamondTransModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_diamond_transaction';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'student_id',
        'package_id',
        'offer_id',
        'transaction_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Validation
    protected $validationRules =
    [
        'student_id'     => 'required',
        'package_id'        => 'required',
        // 'offer_id'        => 'required',
        'transaction_id'        => 'required',
        'status'     => 'required',
    ];
    protected $validationMessages   = [
        'student_id'        => [
            'required' => 'Nama Diskon Harus Diisi',
        ],
        'package_id'        => [
            'required' => 'Paket Harus Diisi',
        ],
        // 'offer_id'        => [
        //     'required' => 'Diskon Harus Diisi',
        // ],
        'transaction_id'        => [
            'required' => 'Transaksi Harus Diisi',
        ],
        'status'        => [
            'required' => 'Status Harus Diisi',
        ],
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

    protected function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        // $this->builder = $this->db->table($table);
        $this->builder->select('to_diamond_transaction.id, 
        to_diamond_transaction.student_id,
        to_diamond_transaction.package_id,
        to_diamond_transaction.offer_id,
        to_diamond_transaction.transaction_id,
        to_diamond_transaction.status,
        to_diamond_transaction.deleted_at,
        to_students.full_name,
        to_offers.name,
        to_diamond_packages.name as package_name')
            ->join('to_diamond_packages', 'to_diamond_packages.id=to_diamond_transaction.package_id', 'left')
            ->join('to_students', 'to_students.id=to_diamond_transaction.student_id', 'left')
            ->join('to_offers', 'to_offers.id=to_diamond_transaction.offer_id', 'left');
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

    public function add_transaction($transaction_data)
    {
        $data = [
            'id' => $transaction_data['id'],
            'student_id' => $transaction_data['student_id'],
            'package_id' => $transaction_data['package_id'],
            'offer_id' => $transaction_data['offer_id'],
            'transaction_id' => $transaction_data['transaction_id'],
            'status' => $transaction_data['status'],
            'created_at' => $this->now(),
        ];
        return  $this->builder->insert($data);
    }
}
