<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTopicTable extends Migration
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
			'subject_id'       => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
                'unsigned'       => true
			],
			'topic'       => [
				'type'           => 'TEXT',
			],
		]);

		// Primary_Key
		$this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('subject_id', 'to_subjects', 'id','CASCADE','CASCADE');
		// Create Table
		$this->forge->createTable('to_topics', TRUE);
    }

    public function down()
    {
        //
    }
}
