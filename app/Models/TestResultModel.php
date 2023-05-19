<?php

namespace App\Models;

use CodeIgniter\Model;

class TestResultModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_test_result';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'student_id',
        'test_id',
        'begin_time',
        'end_time',
        'score',
    ];

    // Validation
    protected $validationRules      = [
        'student_id'    => 'required',
        'test_id'        => 'required',
        'begin_time'     => 'required',
        'end_time'     => 'required',
        'score'     => 'required',
    ];
    protected $validationMessages   = [
        'student_id'        => [
            'required' => 'Harus Diisi',
        ],
        'test_id'        => [
            'required' => 'Harus Diisi',
        ],
        'begin_time'        => [
            'required' => 'Harus Diisi',
        ],
        'end_time'        => [
            'required' => 'Harus Diisi',
        ],
        'score'        => [
            'required' => 'Harus Diisi',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    protected function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        // $this->builder = $this->db->table($table);
        $this->builder->select('to_test_result.id,
        to_test_result.test_id,
        to_test_result.score,
        to_test_result.student_id,
        to_test_result.end_time,
        to_test_result.begin_time as result_begin,
        to_tests.test_name,
        to_tests.class_id,
        to_tests.begin_time,
        to_class.class,
        to_students.full_name')
            ->join('to_students', 'to_students.id=to_test_result.student_id', 'left')
            ->join('to_tests', 'to_tests.id=to_test_result.test_id', 'left')
            ->join('to_class', 'to_class.id=to_tests.class_id', 'left');
        // ->where('to_test_result.student_id');
        // jika ingin join formatnya adalah sebagai berikut : 
        // $this->builder->join('tabel_lain','tabel_lain.kolom_yang_sama = pengguna.kolom_yang_sama','left');
        // end Join
        // $this->builder->join('to_class', 'to_class.id=to_students.class_id');
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



    public function testResult($test_id, $user_id)
    {
        $query = "SELECT
        PreQuery.full_name,
        PreQuery.score,
        PreQuery.Rank,
        PreQuery.difference 
    FROM
        (
        SELECT
            to_students.full_name,
            to_test_result.student_id,
            to_test_result.score,
            TIMESTAMPDIFF(
                SECOND,
                FROM_UNIXTIME( to_test_result.begin_time ),
            FROM_UNIXTIME( to_test_result.end_time )) difference,
            @rank :=
        IF
            ((
                    @rn := @rn + 1 
                    ) IS NOT NULL,
            IF
                (
                    score = @lastscore 
                    AND TIMESTAMPDIFF(
                        SECOND,
                        FROM_UNIXTIME( to_test_result.begin_time ),
                    FROM_UNIXTIME( to_test_result.end_time )) = @lastduration,
                    @rank,
                IF
                    ((
                            @lastscore := score 
                            ) IS NOT NULL 
                        AND (
                            @lastduration := TIMESTAMPDIFF(
                                SECOND,
                                FROM_UNIXTIME( to_test_result.begin_time ),
                            FROM_UNIXTIME( to_test_result.end_time ))) IS NOT NULL,
                        @rn,
                        1 
                    )),
                1 
            ) rank 
        FROM
            to_test_result
            LEFT JOIN to_students ON to_test_result.student_id = to_students.id
            CROSS JOIN ( SELECT @rank := 0, @lastscore :=- 1, @lastduration :=- 1, @rn := 0 ) r 
        WHERE
            to_test_result.test_id = " . $test_id . " 
        ORDER BY
            to_test_result.score DESC,
            difference ASC 
            LIMIT 3 
        ) PreQuery UNION
    SELECT
        SubQuery.full_name,
        SubQuery.score,
        SubQuery.Rank,
        SubQuery.difference 
    FROM
        (
        SELECT
            to_students.full_name,
            to_test_result.student_id,
            to_test_result.score,
            TIMESTAMPDIFF(
                SECOND,
                FROM_UNIXTIME( to_test_result.begin_time ),
            FROM_UNIXTIME( to_test_result.end_time )) AS difference,
            row_number() over ( ORDER BY score DESC, difference ASC ) Rank 
        FROM
            to_test_result
            LEFT JOIN to_students ON to_test_result.student_id = to_students.id 
        WHERE
            test_id = " . $test_id . " 
        ) SubQuery 
    WHERE
        SubQuery.student_id = " . $user_id . " 
        OR NOT EXISTS (
        SELECT
            to_students.full_name,
            to_test_result.student_id,
            to_test_result.score,
            TIMESTAMPDIFF(
                SECOND,
                FROM_UNIXTIME( to_test_result.begin_time ),
            FROM_UNIXTIME( to_test_result.end_time )) difference,
            @rank :=
        IF
            ((
                    @rn := @rn + 1 
                    ) IS NOT NULL,
            IF
                (
                    score = @lastscore 
                    AND TIMESTAMPDIFF(
                        SECOND,
                        FROM_UNIXTIME( to_test_result.begin_time ),
                    FROM_UNIXTIME( to_test_result.end_time )) = @lastduration,
                    @rank,
                IF
                    ((
                            @lastscore := score 
                            ) IS NOT NULL 
                        AND (
                            @lastduration := TIMESTAMPDIFF(
                                SECOND,
                                FROM_UNIXTIME( to_test_result.begin_time ),
                            FROM_UNIXTIME( to_test_result.end_time ))) IS NOT NULL,
                        @rn,
                        1 
                    )),
                1 
            ) rank 
        FROM
            to_test_result
            LEFT JOIN to_students ON to_test_result.student_id = to_students.id
            CROSS JOIN ( SELECT @rank := 0, @lastscore :=- 1, @lastduration :=- 1, @rn := 0 ) r 
        WHERE
            to_test_result.test_id = " . $test_id . " 
        ORDER BY
            to_test_result.score DESC,
            difference ASC 
        LIMIT 3 
        );";
        $query = $this->db->query($query);

        return $query->getResultArray();
    }
}
