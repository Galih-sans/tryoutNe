<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class LogBalanceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_balance_log';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'student_id',
        'type',
        'amount',
        'timestamp',
        'total',
        'status',
        'created_at',
        'updated_at'
    ];

    // Validation
    // protected $validationRules =
    // [
    //     'full_name'    => 'required',
    //     'email'        => 'required',
    //     'school' => 'required',
    // ];
    // protected $validationMessages   = [
    //     'full_name'        => [
    //         'required' => 'Nama Harus Diisi',
    //     ],
    //     'email'        => [
    //         'required' => 'Email Harus Diisi',
    //     ],
    // ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    // public function get_datatables()
    // {
    //     $query = $this->builder->get();
    //     return $query->getResult();
    // }
    // public function create($data)
    // {
    //     $query = $this->builder->insert($data);
    //     return $query;
    // }
    // public function delete_class($id)
    // {
    //     $this->builder->where('id', $id);
    //     return $this->builder->delete();
    // }
    // public function update_siswa($id, $data)
    // {
    //     $this->builder->where('id', $id);
    //     return $this->builder->update($data);
    // }
    // public function get_siswa($id)
    // {
    //     $query = $this->builder->getWhere(['id' => $id]);
    //     return $query->getRow();
    // }
    // public function get_class_by_level($id)
    // {
    //     $query = $this->builder->getWhere(['level' => $id]);
    //     return $query->getResult();
    // }


    protected function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        // $this->builder = $this->db->table($table);
        $this->builder->select('to_balance_log.id, 
        to_balance_log.type,
        to_balance_log.amount,
        to_balance_log.status,
        to_balance_log.timestamp,
        to_balance_log.total,
        to_students.full_name')
            ->join('to_students', 'to_students.id=to_balance_log.student_id');
        // //jika ingin join formatnya adalah sebagai berikut :
        // //$this->builder->join('tabel_lain','tabel_lain.kolom_yang_sama = pengguna.kolom_yang_sama','left');
        // //end Join
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
