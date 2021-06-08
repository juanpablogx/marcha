<?php

namespace App\Models;
use CodeIgniter\Model;

class InventarioModel extends Model {
    protected $table      = 'inventario';
    protected $primaryKey = 'id_producto';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_producto', 'nombre', 'descripcion', 'medida', 'tipo', 'precio_und', 'stock', 'finca'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function insertarInventario($nombre, $descripcion, $medida, $tipo, $precio_und, $stock, $finca) {
        $nombre = $this->escapeString($nombre);
        // $descripcion = $this->escapeString($descripcion);
        $medida = $this->escapeString($medida);
        $tipo = $this->escapeString($tipo);
        $precio_und = $this->escapeString($precio_und);
        $stock = $this->escapeString($stock);

        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'medida' => $medida,
            'tipo' => $tipo,
            'precio_und' => $precio_und,
            'stock' => $stock,
            'finca' => $finca
        );
        $respuesta = $this->insert($data);
        if($respuesta) {
            return $this->insertID;
        } else {
            return false;
        }
    }

    public function obtenerListaInventariobyFinca($finca) {
        $sql = "SELECT * FROM inventario WHERE finca = ? AND NOT stock = 0  ORDER BY id_producto DESC";

        $registros = $this->db->query($sql, [$finca]); 

        return $registros->getResultArray();
    }

    public function editarInventario($id_producto, $nombre, $descripcion, $medida, $tipo, $precio_und, $stock) {
        $nombre = $this->escapeString($nombre);
        // $descripcion = $this->escapeString($descripcion);
        $medida = $this->escapeString($medida);
        $tipo = $this->escapeString($tipo);
        $precio_und = $this->escapeString($precio_und);
        $stock = $this->escapeString($stock);

        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'medida' => $medida,
            'tipo' => $tipo,
            'precio_und' => $precio_und,
            'stock' => $stock
        );
        return $this->update($id_producto, $data);
        
    }

    public function eliminarInventario($id_producto){
        $id = $this->escapeString($id_producto);
        $sql = "DELETE FROM inventario WHERE id_producto = ?;";

        $delete = $this->db->query($sql, [$id]);
        return $delete;
    }
    
}