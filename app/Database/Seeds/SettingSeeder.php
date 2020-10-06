<?php

namespace App\Database\Seeds;

class SettingSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'name_web' => 'E-Arsip',
            'description' => 'Sistem Elektronik Arsip',
            'image' => 'logo.png',
            'version' => '1.0',
            'link_web' => 'http://acengawahid.my.id',
        ];

        // Using Query Builder
        $this->db->table('tb_setting')->insert($data);
    }
}
