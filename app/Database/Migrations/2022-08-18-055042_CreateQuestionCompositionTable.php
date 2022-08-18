<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuestionCompositionTable extends Migration
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
			'test_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'subject_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'number_of_question'      => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
		]);

		// Primary_Key
		$this->forge->addKey('id', TRUE);
		// Create Table
		$this->forge->createTable('to_question_composition', TRUE);
    }

    public function down()
    {
        //Drop Table
        $this->forge->dropTable('to_question_composition');
    }
}
