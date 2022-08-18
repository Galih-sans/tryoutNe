<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubjectTable extends Migration
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
			'class_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'subject'       => [
				'type'           => 'TEXT',
			],
		]);

		// Primary_Key
		$this->forge->addKey('id', TRUE);
		// Create Table
		$this->forge->createTable('to_subjects', TRUE);
    }

    public function down()
    {
        //Drop Table
        $this->forge->dropTable('to_subjects');
    }
}
