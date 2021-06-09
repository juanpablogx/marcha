<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoriasModel extends Model{
    protected $table      = 'categoria';
    protected $primaryKey = 'id_cat';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['categoria','tipo', 'produce', 'finca'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function insertarCategoria($categoria, $tipo, $produce, $finca) {
        $data = array(
            'categoria' => $categoria,
            'tipo' => $tipo,
            'produce' => $produce,
            'finca' => $finca
        );
        $respuesta = $this->insert($data);
        if($respuesta) {
            return $this->insertID;
        } else {
            return false;
        }
    }

    public function obtenerListaCategoriabyFinca($finca) {
        $sql = "SELECT * FROM categoria WHERE finca = ? ORDER BY id_cat DESC";

        $registros = $this->db->query($sql, [$finca]); 

        return $registros->getResultArray();
    }

    public function eliminarCategoria($id_categoria){
        $id = $this->escapeString($id_categoria);
        $sql = "DELETE FROM categoria WHERE id_cat = ?;";

        $categorias = $this->db->query($sql, [$id]);
        return $categorias; 
    }

    public function editarCategoria($id_categoria, $categoria, $tipo, $produce) {
        $id = $this->escapeString($id_categoria);
        $categoria = $this->escapeString($categoria);
        $tipo = $this->escapeString($tipo);
        $produce = $this->escapeString($produce);

        $sql = "UPDATE categoria SET categoria = ?, tipo = ?, produce = ? WHERE id_cat = ?;";
        $actualizacion = $this->db->query($sql, [$categoria, $tipo, $produce, $id]);
        return $actualizacion;
    }

    public function validarCategoria($id_categoria) {
        $sql = "SELECT COUNT(cat_lote.categoria) AS repeticiones FROM cat_lote INNER JOIN categoria ON cat_lote.categoria = categoria.id_cat WHERE categoria.id_cat = ?";

        $registros = $this->db->query($sql, [$id_categoria]); 

        return $registros->getResultArray()[0]['repeticiones']; 
    }

}