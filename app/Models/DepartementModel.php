<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartementModel extends Model
{
    protected $table = 'tb_dept';
    protected $primaryKey = 'id_dept';
    protected $allowedFields = ['name_dept'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = null)
    {
        if ($id == null) {
            return $this->builder->orderBy('id_dept', 'DESC')->get()->getResultArray();
        } else {
            $this->builder->where('id_dept', $id);
            return $this->builder->orderBy('id_dept', 'DESC')->get()->getRowArray();
        }
    }

    public function addData($data)
    {
        return $this->builder->insert($data);
    }

    public function deleteData($id)
    {
        return $this->builder->delete(['id_dept' => $id]);
    }

    public function updateData($data)
    {
        return $this->builder->update($data, ['id_dept' => $data['id_dept']]);
    }

    public function getCount()
    {
        return $this->builder->countAll();
    }
}
