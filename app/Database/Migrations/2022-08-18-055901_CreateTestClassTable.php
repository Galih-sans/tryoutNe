<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestClassTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'CHAR',
				'constraint'     => 36,
				'unsigned'       => true,
				// 'auto_increment' => true
			],
			'test_id' => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'class_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
		]);
		// Primary_Key
		$this->forge->addKey('id', TRUE);
		// Create Table
		$this->forge->createTable('to_test_class', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('to_test_class');
	}
}
