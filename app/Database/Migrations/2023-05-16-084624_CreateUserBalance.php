<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserBalance extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'          => [
                'type'           => 'CHAR',
                'constraint'     => 36,
                'unsigned'       => true,
                // 'auto_increment' => true
            ],
            'balance'       => [
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
        $this->forge->addKey('user_id', TRUE);
        // Create Table
        $this->forge->createTable('users_balance', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('users_balance');
    }
}
