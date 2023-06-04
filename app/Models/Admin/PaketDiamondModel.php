<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class PaketDiamondModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_diamond_packages';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'name',
        'price',
        'amount',
        'description',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Validation
    protected $validationRules =
    [
        'name'     => 'required',
        'price'        => 'required',
        'amount'        => 'required',
        // 'description'     => 'required',
    ];
    protected $validationMessages   = [
        'name'        => [
            'required' => 'Nama Paket Harus Diisi',
        ],
        // 'type'        => [
        //     'required' => 'Tipe Harus Diisi',
        // ],
        'price'        => [
            'required' => 'Harga Paket Harus Diisi',
        ],
        'amount'        => [
            'required' => 'Jumlah Diamond Harus Diisi',
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

    protected function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        $this->builder = $this->db->table($table);
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

    public function add_package($data)
    {
        $package_data = [
            'id' => $data['id'],
            'name' => $data['name'],
            'type' => $data['type'],
            'price' => $data['price'],
            'amount' => $data['amount'],
            'description' => $data['description'],
            'created_by' => $data['created_by'],
            'created_at' => $this->now(),
        ];
        return  $this->builder->insert($package_data);
    }
}
