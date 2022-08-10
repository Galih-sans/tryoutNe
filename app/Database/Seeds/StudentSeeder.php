<?php

namespace App\Database\Seeds;

use App\Models\StudentModel;
use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
	{
		$user_object = new StudentModel();

		$user_object->insertBatch([
			[
				"full_name" => "Wisnu Maulana",
				"email" => "coba@mail.com",
				"phone_number" => "7899654125",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			],
			[
				"full_name" => "Widiandieka Tri",
				"email" => "coba1@mail.com",
				"phone_number" => "8888888888",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			]
		]);
	}
}
