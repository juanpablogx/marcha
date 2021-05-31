<?php

namespace App\Models;
use CodeIgniter\Model;

class MunicipiosModel extends Model{
    protected $table      = 'municipios';
    protected $primaryKey = 'id_municipio';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_municipio', 'municipio', 'departamento_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerMunbyDepto($depto) {
        $registros = $this->select(['id_municipio', 'municipio'])->where(['departamento_id'=>$depto])->find();
        return $registros;
    }

}