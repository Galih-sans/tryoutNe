<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnswerTable extends Migration
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
			'question_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
			],
			'answer'      => [
				'type'           => 'TEXT',
			],
			'answer_isright'      => [
				'type'           => 'TINYINT',
				'constraint'     => 1,
			],
            'created_by' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'created_at' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
            'updated_at' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
		]);
		// Primary_Key
		$this->forge->addKey('id', TRUE);
		// Create Table
		$this->forge->createTable('to_answers', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('to_answers');
    }
}
