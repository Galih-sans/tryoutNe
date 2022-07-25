<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuestionTable extends Migration
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
			'question'       => [
				'type'           => 'TEXT',
			],
			'level'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'subject'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'discussion'      => [
				'type'           => 'VARCHAR',
                'constraint'     => 255,
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
		$this->forge->createTable('to_questions', TRUE);
    }

    public function down()
    {
        //Drop Table
        $this->forge->dropTable('to_questions');
    }
}
