<?php

namespace App\Models;

// use App\Models\Admin\AnswerModel;
// use App\Models\Admin\BankSoalModel;
// use App\Models\Admin\QuestionCompotionModel;
use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class WeeklyScoreModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'weekly_score';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'student_id',
        'best_score',
        'test_id',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'int';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }
}