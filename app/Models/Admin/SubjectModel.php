<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_subjects';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
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

    public function create($data)
    {
        $data_subject = [
            'id' => $data['id'],
            'class_id' => $data['class_id'],
            'subject' => $data['subject']
        ];
        return $this->builder->insert($data_subject);
    }

    public function delete_subject($id)
    {
        $this->builder->where('id', $id);
        return $this->builder->delete();
    }

    // public function get_datatables($class_id)
    // {
    //     $query = $this->builder->where('class_id',$class_id)->get();
    //     return $query->getResult();
    // }
    public function update_subject($id, $data)
    {
        $this->builder->where('id', $id);
        return $this->builder->update($data);
    }
    public function get_subject($id)
    {
        $query = $this->builder->getWhere(['class_id' => $id]);
        return $query->getResult();
    }
    public function get_subject_row($id)
    {
        $query = $this->builder->getWhere(['id' => $id]);
        return $query->getRow();
    }

    protected function _get_datatables_query($class, $column_order, $column_search, $order)
    {
        //jika ingin join formatnya adalah sebagai berikut :
        $this->builder->select('to_subjects.id, subject, level, class, class_id')->join('to_class', 'to_class.id = to_subjects.class_id', 'left')->where('to_subjects.class_id', $class);
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
