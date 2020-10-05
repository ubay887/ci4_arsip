<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbCategory extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_category' => [
				'type' => 'INT',
				'contraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'name_category' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
		]);
		$this->forge->addKey('id_category', TRUE);
		$this->forge->createTable('tb_category');
	}

	public function down()
	{
		$this->forge->dropTable('tb_category');
	}
}
