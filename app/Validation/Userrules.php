<?php

namespace App\Validation;

use App\Models\AdminModel;
use App\Models\StudentModel;


class Userrules
{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new StudentModel();
        $user = $model->where('email', $data['email'])
            ->first();

        if (!$user) {
            $adminModel = new AdminModel();
            $admin = $adminModel->where('email', $data['email'])
                ->first();
            if(!$admin){
                return false;
            }
            return password_verify($data['password'], $admin['password']);
        }
        return password_verify($data['password'], $user['password']);
    }
}
