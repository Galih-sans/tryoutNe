<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WeeklyScore extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'id'          => [
				'type'           => 'CHAR',
				'constraint'     => 36,
				'unsigned'       => true,
			],
			'student_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
            'best_score' => [
                'type'           => 'TINYINT',
                'constraint'     => 4,
            ],
			'test_id' => [
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
		$this->forge->createTable('weekly_score', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('weekly_score');
    }
}
