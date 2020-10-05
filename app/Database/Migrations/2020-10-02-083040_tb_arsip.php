<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbArsip extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_arsip' => [
				'type' => 'INT',
				'contraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'id_category' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'id_dept' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'id_user' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'no_arsip' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
			'name_file' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
			'description' => [
				'type' => 'TEXT',
				'null' => TRUE,
			],
			'file' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
		]);
		$this->forge->addKey('id_arsip', TRUE);
		$this->forge->createTable('tb_arsip');
	}

	public function down()
	{
		$this->forge->dropTable('tb_arsip');
	}
}
