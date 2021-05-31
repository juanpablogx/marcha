<?php

namespace App\Models;
use CodeIgniter\Model;

class DepartamentosModel extends Model{
    protected $table      = 'departamentos';
    protected $primaryKey = 'id_departamento';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_departamento', 'departamento'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerListaDeptos() {
        $registros = $this->select(['id_departamento', 'departamento'])->find();
        return $registros;
    }

    public function obtenerDeptobyId($id) {
        $registros = $this->select(['departamento'])->where(['id_departamento'=>$id])->find();
        return $registros[0];
    }

}