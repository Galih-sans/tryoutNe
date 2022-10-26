<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'to_students';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'full_name',
        'class_id',
        'POB',
        'DOB',
        'email',
        'password',
        'phone_number',
        'parent_name',
        'parent_phone_number',
        'email_verified',
        'token',
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
            'full_name'     => 'required|min_length[5]|max_length[50]',
            'class_id'     => 'required',
            'POB'     => 'required|min_length[5]',
            'DOB'     => 'required',
            'email'        => 'required|min_length[4]|max_length[100]|valid_email|is_unique[to_students.email]',
            'password'        => 'required|min_length[4]',
            'phone_number'        => 'required|min_length[10]',
            'parent_name'        => 'required|min_length[5]',
            'parent_phone_number'        => 'required|min_length[10]',            
    ];
    protected $validationMessages   = [
        'full_name'        => [
            'required' => 'Nama Lengkap Harus Diisi',
        ],
        'class_id'        => [
            'required' => 'Kelas Harus Diisi',
        ],
        'POB'        => [
            'required' => 'Tempat Lahir Harus Diisi',
        ],
        'DOB'        => [
            'required' => 'Tanggal Lahir Harus Diisi',
        ],
        'email'        => [
            'required' => 'Email Harus Diisi',
            'is_unique' =>'Alamat Email Sudah Terdaftar',
        ],
        'password'        => [
            'required' => 'Password Harus Diisi',
            'min_length' => 'Password Minimal [0] Karakter',
        ],
        'phone_number'        => [
            'required' => 'Nomor Telepon Harus Diisi',
            'min_length' => 'Nomor Telepon Minimal [0] Karakter',
        ],
        'parent_name'        => [
            'required' => 'Nama Wali Harus Diisi',
            'min_length' => 'Nama Wali Minimal [0] Karakter',
        ],
        'parent_phone_number'        => [
            'required' => 'Nomor Wali Harus Diisi',
            'min_length' => 'Nomor Wali Minimal [0] Karakter',
        ],
    ];
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

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('to_students');
    }
    public function verify_email($token)
    {
        $newtoken = random_string ('md5',16);
        return   $this->builder->set('email_verified', 1)->set('token',$newtoken)
        ->where('token', $token)
        ->update();
    }

    public function reset_password($token,$data)
    {
        $newtoken = random_string ('md5',16);
        return   $this->builder->set('email_verified', 1)->set('token',$newtoken)->set('password',password_hash($data['password'], PASSWORD_DEFAULT))
        ->where('token', $token)
        ->update();
    }
    public function getClass($id)
    {
        $query = $this->builder->select('class_id')->where(['id' => $id])->get()->getRow();
        $class_id = $query->class_id;
        return $class_id;
    }
}