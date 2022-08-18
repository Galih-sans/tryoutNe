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
			'class_id'      => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'subject_id'      => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'topic_id'      => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'difficulty'      => [
				'type'           => 'VARCHAR',
                'constraint'     => 255,
			],
			'discussion'      => [
				'type'           => 'TEXT',
			],
            'created_by' => [
				'type'           => 'INT',
				'constraint'     => 11,
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
		$this->forge->createTable('to_questions', TRUE);
    }

    public function down()
    {
        //Drop Table
        $this->forge->dropTable('to_questions');
    }
}
