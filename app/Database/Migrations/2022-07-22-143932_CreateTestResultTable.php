<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestResultTable extends Migration
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
			'student_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'test_id' => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'begin_time' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'end_time' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'score' => [
				'type'           => 'TINYINT',
				'constraint'     => 4,
			],
		]);
		// Primary_Key
		$this->forge->addKey('id', TRUE);
		// Create Table
		$this->forge->createTable('to_test_result', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('to_test_result');
	}
}
