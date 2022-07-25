<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestAnswerTable extends Migration
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
            'test_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
            ],
			'student_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'question_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'answer_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'answer_isright'       => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
			],
            'created_at' => [
				'type'           => 'VARCHAR',
                'constraint'     => 255,
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
