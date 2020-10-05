<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbDept extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_dept' => [
				'type' => 'INT',
				'contraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'name_dept' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			]
		]);
		$this->forge->addKey('id_dept', TRUE);
		$this->forge->createTable('tb_dept');
	}

	public function down()
	{
		$this->forge->dropTable('tb_dept');
	}
}
