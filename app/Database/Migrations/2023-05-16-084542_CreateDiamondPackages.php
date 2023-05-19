<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiamondPackages extends Migration
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
            'name'       => [
                'type'           => 'TEXT',
            ],
            'price'       => [
                'type'           => 'DOUBLE',
            ],
            'amount'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'description'       => [
                'type'           => 'TEXT',
            ],
            'created_by'       => [
                'type'           => 'CHAR',
                'constraint'     => 36,
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
        // Create Table
        $this->forge->createTable('to_diamond_packages', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('to_diamond_packages');
    }
}
