<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table = 'tb_arsip';
    protected $primaryKey = 'id_arsip';
    protected $useTimestamps = TRUE;
    protected $allowedFields = ['id_category', 'id_dept', 'id_user', 'no_arsip', 'name_file', 'description', 'file'];

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData($id = null)
    {
        if ($id == null) {
            return $this->builder->join('tb_category', 'tb_category.id_category = tb_arsip.id_category', 'left')->join('tb_user', 'tb_user.id_user = tb_arsip.id_user', 'left')->join('tb_dept', 'tb_dept.id_dept = tb_arsip.id_dept', 'left')->get()->getResultArray();
        } else {
            $this->builder->where('id_arsip', $id);
            return $this->builder->get()->getRowArray();
        }
    }

    public function updateData($data)
    {
        return $this->builder->update($data, ['id_arsip' => $data['id_arsip']]);
    }

    public function deleteData($id)
    {
        return $this->builder->delete(['id_arsip' => $id]);
    }

    public function getCount()
    {
        return $this->builder->countAll();
    }
}
