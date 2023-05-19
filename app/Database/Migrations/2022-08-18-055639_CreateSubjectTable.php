<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubjectTable extends Migration
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
			'class_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
				'unsigned'       => true
			],
			'subject'       => [
				'type'           => 'TEXT',
			],
		]);

		// Primary_Key
		$this->forge->addKey('id', TRUE);
		$this->forge->addForeignKey('class_id', 'to_class', 'id', 'CASCADE', 'CASCADE');
		// Create Table
		$this->forge->createTable('to_subjects', TRUE);
	}

	public function down()
	{
		//Drop Table
		$this->forge->dropTable('to_subjects');
	}
}
