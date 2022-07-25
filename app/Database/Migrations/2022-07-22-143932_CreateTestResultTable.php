<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestResultTable extends Migration
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
			'student_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
            'test_id' => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
            'begin_time' => [
				'type'           => 'DATETIME',
			],
            'end_time' => [
				'type'           => 'DATETIME',
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