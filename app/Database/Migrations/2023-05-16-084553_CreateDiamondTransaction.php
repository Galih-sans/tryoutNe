<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiamondTransaction extends Migration
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
                'unsigned'       => true
            ],
            'package_id'       => [
                'type'           => 'CHAR',
                'constraint'     => 36,
                'unsigned'       => true
            ],
            'offer_id'       => [
                'type'           => 'CHAR',
                'constraint'     => 36,
                'unsigned'       => true
            ],
            'transaction_id'       => [
                'type'           => 'TEXT',
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
            'deleted_at' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);
        // Primary_Key
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('student_id', 'to_students', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('package_id', 'to_diamond_packages', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('offer_id', 'to_offers', 'id', 'CASCADE', 'CASCADE');
        // Create Table
        $this->forge->createTable('to_diamond_transaction', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('to_diamond_transaction');
    }
}
