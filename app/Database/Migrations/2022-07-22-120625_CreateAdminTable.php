<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
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
			'full_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'gender'      => [
				'type' => 'ENUM',
				'constraint' => array('L','P'),
				'default'=> "L",
			],
            'role'       => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
            'token'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
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
		$this->forge->createTable('to_admins', TRUE);
    }

    public function down()
    {
        //Drop Table
        $this->forge->dropTable('to_admins');
    }
}
