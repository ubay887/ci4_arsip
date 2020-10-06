<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'id_dept' => '1',
            'name_user' => 'Aceng Abdul Wahid',
            'email'    => 'admin@acengawahid.my.id',
            'password' => '$2y$10$WTPJsQJEYTy6MXxUbN1T9O3WP9wrnMzFVnGvRckvVxneVU.98nUiq',
            'image' => 'default.png',
            'level' => '1',
            'is_active' => '1',
        ];

        // Using Query Builder
        $this->db->table('tb_user')->insert($data);
    }
}
