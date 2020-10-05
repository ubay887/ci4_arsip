<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'tb_category';
    protected $primaryKey = 'id_category';
    protected $allowedFields = ['name_category'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = null)
    {
        if ($id == null) {
            return $this->builder->orderBy('id_category', 'DESC')->get()->getResultArray();
        } else {
            $this->builder->where('id_category', $id);
            return $this->builder->orderBy('id_category', 'DESC')->get()->getRowArray();
        }
    }

    public function addData($data)
    {
        return $this->builder->insert($data);
    }

    public function deleteData($id)
    {
        return $this->builder->delete(['id_category' => $id]);
    }

    public function updateData($data)
    {
        return $this->builder->update($data, ['id_category' => $data['id_category']]);
    }

    public function getCount()
    {
        return $this->builder->countAll();
    }
}
