<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOffers extends Migration
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
            'type'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'start_date'         => [
                'type'           => 'DATETIME',
            ],
            'end_date'           => [
                'type'           => 'DATETIME',
            ],
            'description'        => [
                'type'           => 'TEXT',
            ],
            'discount_amount'    => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'discount_percentage' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'status'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'created_by' => [
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
            'offer_code' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        // Primary_Key
        $this->forge->addKey('id', TRUE);
        // Create Table
        $this->forge->createTable('to_offers', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('to_offers');
    }
}
