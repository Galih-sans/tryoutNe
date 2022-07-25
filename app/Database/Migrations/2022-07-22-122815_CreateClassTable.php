<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClassTable extends Migration
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
			'level'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'class'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
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
