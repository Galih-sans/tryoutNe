<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class RoleModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_roles';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'role_name',
        'ha_class',
        'ha_subject',
        'ha_topic',
        'ha_test',
        'ha_bank_soal',
        'ha_siswa',
        'ha_hasil_test',
        'ha_kelola_admin',
        'ha_kelola_role',

        'ha_paket_diamond',
        'ha_balance_siswa',
        'ha_transaksi_diamond',
        'ha_offers',
        'ha_log_balance'
    ];

    // Validation
    protected $validationRules =
    [
        'role_name'     => 'required',
    ];
    protected $validationMessages   = [
        'role_name'        => [
            'required' => 'Nama Role Harus Diisi',
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

    public function add_role($data)
    {
        $role_data = [
            'id' => $data['id'],
            'role_name' => $data['role_name'],

            'ha_class' => $data['ha_class'],
            'ha_subject' => $data['ha_subject'],
            'ha_topic' => $data['ha_topic'],
            'ha_test' => $data['ha_test'],
            'ha_bank_soal' => $data['ha_bank_soal'],
            'ha_siswa' => $data['ha_siswa'],
            'ha_hasil_test' => $data['ha_hasil_test'],
            'ha_kelola_admin' => $data['ha_kelola_admin'],
            'ha_kelola_role' => $data['ha_kelola_role'],
            'ha_paket_diamond' => $data['ha_paket_diamond'],
            'ha_balance_siswa' => $data['ha_balance_siswa'],
            'ha_transaksi_diamond' => $data['ha_transaksi_diamond'],
            'ha_offers' => $data['ha_offers'],
            'ha_log_balance' => $data['ha_log_balance'],
        ];
        return  $this->builder->insert($role_data);
    }

    protected function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        $this->builder = $this->db->table($table);
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
