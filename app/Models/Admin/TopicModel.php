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

    // public function get_datatables($subject_id)
    // {
    //     $query = $this->builder->where('subject_id',$subject_id)->get();
    //     return $query->getResult();
    // }
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

    protected function _get_datatables_query($subject, $column_order, $column_search, $order)
    {
        //jika ingin join formatnya adalah sebagai berikut :
        $this->builder->select('to_topics.id, level, class, subject, topic')->join('to_subjects','to_subjects.id = to_topics.subject_id','left')->join('to_class','to_class.id = to_subjects.class_id','left')->where('to_topics.subject_id', $subject);
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
