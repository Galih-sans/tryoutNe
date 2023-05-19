<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClassTable extends Migration
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
			'level'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
			],
			'class'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
			],
		]);

		// Primary_Key
		$this->forge->addKey('id', TRUE);
		// Create Table
		$this->forge->createTable('to_class', TRUE);
	}

	public function down()
	{
		//Drop Table
		$this->forge->dropTable('to_class');
	}
}
