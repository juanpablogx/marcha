<?php

namespace App\Models;
use CodeIgniter\Model;

class AsigCategoriaModel extends Model{
    protected $table      = 'cat_lote';
    protected $primaryKey = 'id_lot_cat';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['lote', 'categoria', 'cantidad'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function obtenerListaAsigCategoriabyFinca($finca) {
        $sql = "SELECT cat_lote.id_lot_cat, lote.nombre AS lote, lote.id_lote, categoria.categoria AS categoria, categoria.id_cat, cat_lote.cantidad FROM cat_lote INNER JOIN lote ON cat_lote.lote = lote.id_lote INNER JOIN categoria ON cat_lote.categoria = categoria.id_cat WHERE lote.finca = ? ORDER BY cat_lote.id_lot_cat DESC";

        $registros = $this->db->query($sql, [$finca]); 

        return $registros->getResultArray();
    }

    public function insertarAsigCategoria($lote, $categoria, $cantidad) {
        $categoria = $this->escapeString($categoria);
        $lote = $this->escapeString($lote);
        $cantidad = $this->escapeString($cantidad);

        $data = array(
            'lote' => $lote,
            'categoria' => $categoria,
            'cantidad' => $cantidad,
        );
        $respuesta = $this->insert($data);
        if($respuesta) {
            return $this->insertID;
        } else {
            return false;
        }
    }

    public function editarAsigCategoria($id, $cantidad) {
        $cantidad = $this->escapeString($cantidad);

        $data = array(
            'cantidad' => $cantidad
        );
        return $this->update($id, $data);
        
    }

    public function eliminarAsigCategoria($id){
        $id = $this->escapeString($id);
        $sql = "DELETE FROM cat_lote WHERE id_lot_cat = ?;";

        $delete = $this->db->query($sql, [$id]);
        return $delete;
    }

}