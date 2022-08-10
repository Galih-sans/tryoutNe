<?php

namespace App\Database\Seeds;

use App\Models\AdminModel;
use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
	{
		$user_object = new AdminModel();

		$user_object->insertBatch([
			[
				"full_name" => "Ananda Tri",
				"email" => "koncopait@gmail.com",
				"password" => password_hash("123123123", PASSWORD_DEFAULT)
			]
		]);
	}
}