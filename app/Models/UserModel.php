<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = TRUE;
    protected $allowedFields = ['id_dept', 'name_user', 'email', 'password', 'image', 'level', 'is_active'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = null)
    {
        if ($id == null) {
            return $this->builder->orderBy('id_user', 'DESC')->get()->getResultArray();
        } else {
            $this->builder->where('id_user', $id);
            return $this->builder->orderBy('id_user', 'DESC')->get()->getRowArray();
        }
    }

    public function updateData($data)
    {
        return $this->builder->update($data, ['id_user' => $data['id_user']]);
    }

    public function deleteData($id)
    {
        return $this->builder->delete(['id_user' => $id]);
    }

    public function getCount()
    {
        return $this->builder->countAll();
    }
}
