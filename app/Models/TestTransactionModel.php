<?php

namespace App\Models;

// use App\Models\Admin\AnswerModel;
// use App\Models\Admin\BankSoalModel;
// use App\Models\Admin\QuestionCompotionModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class TestTransactionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'test_transaction';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'student_id',
        'test_id',
        'offer_id',
        'status',
        'created_at',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'int';
    protected $createdField  = 'created_at';

    public function __construct()
    {
        parent::__construct();
        // $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    public function purchase_test($data)
    {
        $uuid = Uuid::uuid1();
        $test_data = [
        'id' => $uuid->toString(),
        'test_id' => $data['test_id'],
        'student_id' => $data['student_id'],
        'created_at' => $data['created_at'],
        'offer_id' => $data['offer_id'],
        ];
        return $this->builder->insert($test_data);
    }
}