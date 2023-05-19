<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLogBalance extends Migration
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
            'student_id'       => [
                'type'           => 'CHAR',
                'constraint'     => 36,
            ],
            'type'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'amount'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'timestamp'       => [
                'type'           => 'DATETIME',
            ],
            'total'       => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
            ],
            'status'       => [
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
        $this->forge->addForeignKey('student_id', 'to_students', 'id', 'CASCADE', 'CASCADE');
        // Create Table
        $this->forge->createTable('to_balance_log', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('to_balance_log');
    }
}
