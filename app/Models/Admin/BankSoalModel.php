<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;

class BankSoalModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_questions';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'question', 'class_id', 'subject_id', 'topic_id', 'discussion', 'difficulty', 'created_at', 'updated_at', 'created_by'];
    protected $useSoftDeletes = true;
    // Dates
    protected $dateFormat    = 'datetime';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $createdBy  = 'created_by';

    // Validation
    protected $validationRules =
    [
        'question'     => 'required',
        'discussion'        => 'required',
    ];
    protected $validationMessages   = [
        'question'        => [
            'required' => 'Pertanyaan Harus Diisi',
        ],
        'class_id'        => [
            'required' => 'Kelas Harus Diisi',
        ],
        'topic_id'        => [
            'required' => 'Topik Mata Pelajaran Harus Diisi',
        ],
        'subject_id'        => [
            'required' => 'Mata Pelajaran Harus Diisi',
        ],
        'discussion'        => [
            'required' => 'Bagian Price Harus Diisi',
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

    // protected function _get_datatables_query($table, $column_order, $column_search, $order)
    // {
    //     $this->builder = $this->db->table($table);
    //     $i = 0;
    //     foreach ($column_search as $item) {
    //         if (isset($_POST['search']['value'])) {
    //             if ($i === 0) {
    //                 $this->builder->groupStart();
    //                 $this->builder->like($item, $_POST['search']['value']);
    //             } else {
    //                 $this->builder->orLike($item, $_POST['search']['value']);
    //             }

    //             if (count($column_search) - 1 == $i)
    //                 $this->builder->groupEnd();
    //         }
    //         $i++;
    //     }

    //     if (isset($_POST['order'])) {
    //         $this->builder->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    //     } else if (isset($order)) {
    //         $order = $order;
    //         $this->builder->orderBy(key($order), $order[key($order)]);
    //     }
    // }

    // public function get_datatables($table, $column_order, $column_search, $order,$level,$subject,$data = '')
    // {
    //     $this->_get_datatables_query($table, $column_order, $column_search, $order);
    //     // if ($_POST['length'] != -1){
    //     //     $this->builder->limit($_POST['length'], $_POST['start']);
    //     // }
    //     if ($data) {
    //         $this->builder->where($data);
    //     }
    //     $query = $this->builder->where('class_id',$level)->where('subject_id',$subject)->get();
    //     return $query->getResult();
    // }

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
        } else {
            $this->builder->from($table);
        }
        return $this->builder->countAllResults();
    }

    public function count_all($table, $data = '')
    {
        if ($data) {
            $this->builder->where($data);
        } else {
            $this->builder->from($table);
        }

        return $this->builder->countAllResults();
    }

    public function delete_question($id)
    {
        $this->builder->where('id', $id);
        return $this->builder->delete();
    }
    public function add_question($data)
    {
        $uuid = Uuid::uuid1();
        $question_data = [
            'id' =>  $uuid->toString(),
            'subject_id' => $data['subject'],
            'topic_id' => $data['topic'],
            'class_id' => $data['level'],
            'question' => $data['question'],
            'discussion'    => $data['discussion'],
            'difficulty'    => '',
            'created_by'    => $data['created_by'],
            'created_at'    => $this->now(),
            'updated_at'    => $this->now()
        ];
        $this->builder->insert($question_data);
        // $insert_id = $this->db->insertID();
        return $uuid->toString();
        // return $this->builder->delete();
    }

    protected function now()
    {
        return Time::now()->getTimestamp();
    }

    public function get_test_question($data)
    {
        $query = $this->builder->select('id,question')->orderBy('rand()')->limit($data['number_of_question'])->getWhere(['to_questions.subject_id' => $data['subject_id'], 'to_questions.topic_id' => $data['topic_id']]);
        return $query->getResult();
    }

    public function get_edit_soal($id)
    {
        $query = $this->builder->select(
            'question,
            discussion'
        )->where('id', $id)->get();
        return $query->getRow();
    }
}
