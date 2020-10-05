<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'tb_setting';
    protected $primaryKey = 'id_setting';
    protected $allowedFields = ['name_web', 'description', 'image', 'version', 'link_web'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getData()
    {
        return $this->builder->get()->getRowArray();
    }

    public function getAllData($id = null)
    {
        if ($id == null) {
            return $this->builder->orderBy('id_setting', 'DESC')->get()->getResultArray();
        } else {
            $this->builder->where('id_setting', $id);
            return $this->builder->orderBy('id_setting', 'DESC')->get()->getRowArray();
        }
    }

    public function updateData($data)
    {
        return $this->builder->update($data, ['id_setting' => $data['id_setting']]);
    }
}
