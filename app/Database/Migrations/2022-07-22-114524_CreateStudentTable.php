<?php

namespace App\Database\Migrations\CreateStudentTable;

use CodeIgniter\Database\Migration;

class CreateStudentTable extends Migration
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
			'full_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'class_id'      => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'POB'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'DOB'      => [
				'type'           => 'DATE',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'phone_number'       => [
				'type'           => 'BIGINT',
				'constraint'     => 13,
			],
			'school'       => [
				'type'           => 'TEXT',
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'gender'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 1,
			],
			'parent_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'parent_phone_number' => [
				'type'           => 'BIGINT',
				'constraint'     => 13,
			],
			'parent_email' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'token' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'email_verified' => [
				'type'           => 'TINYINT',
				'constraint'     => 4,
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
		// Foreign Key
		// $this->forge->addForeignKey('class_id', 'to_class', 'id');
		// Create Table
		$this->forge->createTable('to_students', TRUE);
	}

	public function down()
	{
		//Drop Table
		$this->forge->dropTable('to_students');
	}
}
