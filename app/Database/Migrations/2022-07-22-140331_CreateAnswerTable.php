<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnswerTable extends Migration
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
			'question_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'answer'      => [
				'type'           => 'TEXT',
			],
			'answer_isright'      => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
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
		$this->forge->createTable('to_answers', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('to_answers');
	}
}
