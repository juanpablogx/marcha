<?php

namespace App\Models;
use CodeIgniter\Model;

class HerramientasModel extends Model{
    protected $table      = 'act_inventario';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['actividad_lot', 'producto', 'cantidad', 'tipo'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function insertar_Herramienta($actividad_lot, $producto, $cantidad, $tipo) {
        $data = array(
            'actividad_lot' => $actividad_lot,
            'producto' => $producto,
            'cantidad' => $cantidad,
            'tipo' => $tipo,
        );
        $respuesta = $this->insert($data);
        if($respuesta) {
            return $this->insertID;
        } else {
            return false;
        }
    }

    public function get_herramienta($finca) {

        $sql = "SELECT act_inventario.id AS id, act_inventario.cantidad AS cantidad, act_inventario.tipo AS tipo, inventario.nombre AS nombre, actividad.nombre AS actividad, lote.nombre AS lote, actividad.id_actividad AS cod_actividad, lote.id_lote AS cod_lote, inventario.id_producto AS cod_producto, lote_actividad.id_lot_act AS id_la FROM act_inventario INNER JOIN inventario ON act_inventario.producto = inventario.id_producto INNER JOIN lote_actividad ON act_inventario.actividad_lot = lote_actividad.id_lot_act INNER JOIN actividad ON lote_actividad.actividad = actividad.id_actividad INNER JOIN lote ON lote_actividad.lote = lote.id_lote WHERE inventario.finca = ?";

        $registros = $this->db->query($sql, [$finca]);

        return $registros->getResultArray();
    }
    
    public function editar_Herramienta($id, $actividad_lot, $producto, $cantidad, $tipo) {
        
        $data = array(
            'id'=>$id,
            'actividad_lot' => $actividad_lot,
            'producto' => $producto,
            'cantidad' => $cantidad,
            'tipo' => $tipo
        );
        $respuesta = $this->update($id, $data);
        return $respuesta;
        
    }
    
    public function eliminar_Herramienta($id){
        $act_l = $this->escapeString($id);
        $sql = "DELETE FROM act_inventario WHERE id = ?;";

        $actividades = $this->db->query($sql, [$act_l]);
        return $actividades->getResult();
    }

}