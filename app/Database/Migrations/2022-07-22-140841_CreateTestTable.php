<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'test_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'begin_time'      => [
				'type'           => 'DATETIME',
			],
			'end_time'      => [
				'type'           => 'DATETIME',
			],
            'duration' => [
				'type'           => 'TINYINT',
				'constraint'     => 3,
			],
            'number_of_question' => [
				'type'           => 'TINYINT',
				'constraint'     => 3,
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
            'level' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'subject' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'question_composition' => [
				'type'           => 'TEXT',
			],
            'status' => [
				'type'           => 'TINYINT',
				'constraint'     => 4,
			],
            'created_by' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'created_at' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'updated_at' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
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
