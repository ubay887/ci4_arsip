<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'tb_user';
    protected $allowedFields = ['id_dept', 'name_user', 'email', 'password', 'image', 'level', 'is_active', 'created_at', 'updated_at'];
    protected $useTimestamps = TRUE;

    public function getLogin($email, $tbl)
    {
        $builder = $this->db->table($tbl);
        $builder->where('email', $email);
        $log = $builder->get()->getRow();
        return $log;
    }
}
