<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoles extends Migration
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
            'role_name'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'ha_class' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_subject' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_topic' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_test' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_bank_soal' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_siswa' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_hasil_test' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_kelola_admin' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_kelola_role' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_paket_diamond' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_balance_siswa' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_log_balance' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_transaksi_diamond' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
            'ha_offers' => [
                'type'           => 'TINYINT',
                'constraint'     => 14,
                'default' => 0,
            ],
        ]);
        // Primary_Key
        $this->forge->addKey('id', TRUE);
        // Create Table
        $this->forge->createTable('to_roles', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('to_roles');
    }
}
