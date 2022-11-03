<?php

namespace App\Models;

use CodeIgniter\Model;

class TestResultModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_test_result';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'student_id',
        'test_id',
        'begin_time',
        'end_time',
        'score',
    ];




    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
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


    public function testResult($test_id,$user_id)
    {
        $query = 'select PreQuery.full_name, PreQuery.score, PreQuery.Rank
        from ( SELECT 
                                 to_students.full_name,
                   to_test_result.student_id, 
                   to_test_result.score,   
                   @curRank := @curRank +1 Rank
                FROM 
                   to_test_result, to_students,
                   ( select @curRank := 0 ) r
                          WHERE to_students.id = to_test_result.student_id and to_test_result.test_id = '.$test_id.'
                order by 
                   to_test_result.score desc limit 3) PreQuery UNION
     select SubQuery.full_name, SubQuery.score, SubQuery.Rank
     from (select 	
                                 to_students.full_name,
                   to_test_result.student_id, 
                   to_test_result.score, 
                                 row_number() over (order by score desc)  Rank
           from to_test_result,to_students
                 where to_test_result.student_id = to_students.id
          ) SubQuery
     where SubQuery.student_id = '.$user_id;
        $query=$this->db->query($query);

        return $query->getResultArray();
    }
}