<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TestTransaction extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'id'          => [
				'type'           => 'CHAR',
				'constraint'     => 36,
				'unsigned'       => true,
			],
			'student_id'       => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'test_id' => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
            'offer_id' => [
				'type'           => 'CHAR',
				'constraint'     => 36,
			],
			'status' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'created_at' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
		]);
		// Primary_Key
		$this->forge->addKey('id', TRUE);
		// Create Table
		$this->forge->createTable('test_transaction', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('test_transaction');
    }
}
