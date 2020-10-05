<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbUser extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user' => [
				'type' => 'INT',
				'contraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'id_dept' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'name_user' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '128',
			],
			'level' => [
				'type' => 'ENUM("1","2","3")',
				'default' => "1",
				'null' => FALSE,
			],
			'is_active' => [
				'type' => 'ENUM("0","1")',
				'default' => "1",
				'null' => FALSE,
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
		$this->forge->addKey('id_user', TRUE);
		$this->forge->createTable('tb_user');
	}

	public function down()
	{
		$this->forge->dropTable('tb_user');
	}
}
