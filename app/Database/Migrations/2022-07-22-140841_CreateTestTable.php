<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestTable extends Migration
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
			'test_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'begin_time'      => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'end_time'      => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'duration' => [
				'type'           => 'TINYINT',
				'constraint'     => 4,
			],
			'number_of_question' => [
				'type'           => 'TINYINT',
				'constraint'     => 4,
			],
			'random_question' => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
			],
			'random_answer' => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
			],
			'result_to_student' => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
			],
			'report_to_student' => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
			],
			'type' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'price' => [
				'type'           => 'DECIMAL',
				'constraint'     => 10,
			],
			'class_id' => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'subject_id' => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'status' => [
				'type'           => 'TINYINT',
				'constraint'     => 4,
			],
			'max_result' => [
				'type'           => 'TINYINT',
				'constraint'     => 4,
			],
			'created_by' => [
				'type'           => 'CHAR',
				'constraint'     => 36,
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
		$this->forge->createTable('to_tests', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('to_tests');
	}
}
