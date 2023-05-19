<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class TestModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_tests';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'test_name',
        'begin_time',
        'end_time',
        'duration',
        'number_of_question',
        'random_question',
        'random_answer',
        'result_to_student',
        'report_to_student',
        'type',
        'price',
        'correct_answer_value',
        'wrong_answer_value',
        'empty_answer_value',
        'class_id',
        'subject_id',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'int';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules =
    [
        'test_name' => 'required',
        'begin_time' => 'required',
        'end_time' => 'required',
        'duration' => 'required',
        'number_of_question' => 'required',
        'type' => 'required',
        'correct_answer_value' => 'required',
        'wrong_answer_value' => 'required',
        'empty_answer_value' => 'required',
        'class_id' => 'required',
    ];
    protected $validationMessages   =
    [
        'test_name'        => [
            'required' => 'Nama Test Harus Diisi',
        ],
        'begin_time'        => [
            'required' => 'Tanggal Test Dibuka Harus Diisi',
        ],
        'end_time'        => [
            'required' => 'Tanggal Test Ditutup Harus Diisi',
        ],
        'duration' => [
            'required' => 'Durasi Test Harus Diisi',
        ],
        'number_of_question' => [
            'required' => 'Jumlah Soal Harus Diisi',
        ],
        'type' => [
            'required' => 'Kategori Test Harus Diisi',
        ],
        'correct_answer_value' => [
            'required' => 'Nilai Jika Benar Harus Diisi',
        ],
        'wrong_answer_value' => [
            'required' => 'Nilai Jika Salah Harus Diisi',
        ],
        'empty_answer_value' => [
            'required' => 'Nilai Jika Kosong Harus Diisi',
        ],
        'class_id' => [
            'required' => 'Kelas Test Harus Diisi',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('to_tests');
    }

    protected function _get_datatables_query($class, $column_order, $column_search, $order)
    {
        //jika ingin join formatnya adalah sebagai berikut :
        $this->builder->select('to_tests.id,to_class.level, to_class.class,to_tests.test_name, begin_time, end_time, duration, to_tests.number_of_question, type, price, status')->join('to_class', 'to_class.id = to_tests.class_id', 'left');
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
    public function get_test($id)
    {
        $query = $this->builder->select('to_tests.id,to_class.level, to_class.class,to_tests.test_name, begin_time, end_time, duration,random_question, random_answer, result_to_student, to_tests.number_of_question, type,correct_answer_value,wrong_answer_value,empty_answer_value, price, status')->join('to_class', 'to_class.id = to_tests.class_id', 'left')->where('to_tests.id', $id)->get();
        return $query->getRow();
    }
    public function get_edit_test($id)
    {
        $query = $this->builder->select('to_tests.id,to_class.level, class_id,to_tests.test_name, begin_time, end_time, duration,random_question, random_answer, result_to_student, to_tests.number_of_question,correct_answer_value,wrong_answer_value,empty_answer_value, type, price, status')->join('to_class', 'to_class.id = to_tests.class_id', 'left')->where('to_tests.id', $id)->get();
        return $query->getRow();
    }
    public function getInsertID()
    {
        return $this->db->insertID();
    }

    public function add_test($data)
    {
        $test_data = [
            'id' => $data['id'],
            'test_name' => $data['test_name'],
            'begin_time' =>  $data['begin_time'],
            'end_time' => $data['end_time'],
            'duration' => $data['duration'],
            'number_of_question' => $data['number_of_question'],
            'correct_answer_value' => $data['correct_answer_value'],
            'wrong_answer_value' => $data['wrong_answer_value'],
            'empty_answer_value' => $data['empty_answer_value'],
            'random_question' => $data['random_question'],
            'random_answer' => $data['random_answer'],
            'result_to_student' => $data['result_to_student'],
            'class_id' => $data['class_id'],
            'type' => $data['type'],
            'price' => $data['price'],
            'created_by' => $data['created_by'],
            'created_at' => $data['created_at'],
            'status' => $data['status'],
        ];
        return $this->builder->insert($test_data);
    }
}
