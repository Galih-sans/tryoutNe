<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuestionTable extends Migration
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
			'question'       => [
				'type'           => 'TEXT',
			],
			'class_id'      => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'subject_id'      => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'topic_id'      => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'difficulty'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'discussion'      => [
				'type'           => 'TEXT',
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
		$this->forge->createTable('to_questions', TRUE);
	}

	public function down()
	{
		//Drop Table
		$this->forge->dropTable('to_questions');
	}
}
