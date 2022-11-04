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
            to_test_result.test_id = ".$test_id." 
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
            test_id = ".$test_id." 
        ) SubQuery 
    WHERE
        SubQuery.student_id = ".$user_id." 
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
            to_test_result.test_id = ".$test_id." 
        ORDER BY
            to_test_result.score DESC,
            difference ASC 
        LIMIT 3 
        );";
        $query=$this->db->query($query);

        return $query->getResultArray();
    }
}