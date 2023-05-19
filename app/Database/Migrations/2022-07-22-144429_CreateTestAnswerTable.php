<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestAnswerTable extends Migration
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
			'student_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'question_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'answer_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'answer_isright'       => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
			],
			'created_at' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'updated_at' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
		]);
		// Primary_Key
		$this->forge->addKey('id', TRUE);
		// Create Table
		$this->forge->createTable('to_test_answer', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('to_test_answer');
	}
}
