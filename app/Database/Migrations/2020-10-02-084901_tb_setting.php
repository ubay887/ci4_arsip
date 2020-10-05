<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbSetting extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_setting' => [
				'type' => 'INT',
				'constraint' => 1,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'name_web' => [
				'type' => 'VARCHAR',
				'constraint' => '128'
			],
			'description' => [
				'type' => 'TEXT',
				'null' => TRUE
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
			'version' => [
				'type' => 'VARCHAR',
				'constraint' => '10',
			],
			'link_web' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
		]);
		$this->forge->addKey('id_setting', TRUE);
		$this->forge->createTable('tb_setting');
	}

	public function down()
	{
		$this->forge->dropTable('tb_setting');
	}
}
