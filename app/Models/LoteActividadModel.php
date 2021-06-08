<?php

namespace App\Models;
use CodeIgniter\Model;

class LoteActividadModel extends Model{
    protected $table      = 'lote_actividad';
    protected $primaryKey = 'id_lot_act';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['lote', 'actividad', 'fecha_inicio', 'fecha_fin', 'estado'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function insertarLoteActividad($lote, $act, $inicio, $fin) {
        $data = array(
            'lote' => $lote,
            'actividad' => $act,
            'fecha_inicio' => $inicio,
            'fecha_fin' => $fin
        );
        $respuesta = $this->insert($data);
        if($respuesta) {
            return $this->insertID;
        } else {
            return false;
        }
    }

    public function obtenerListaLoteActividadbyFinca($finca) {
        $sql = "SELECT la.id_lot_act AS id, la.lote AS lote, lote.nombre AS nlote, la.actividad AS actividad, actividad.nombre AS nactividad, la.fecha_inicio AS f_inicio, la.fecha_fin AS f_fin, la.estado AS estado FROM lote_actividad AS la INNER JOIN lote ON la.lote = lote.id_lote INNER JOIN actividad ON la.actividad = actividad.id_actividad WHERE lote.finca = ? ORDER BY la.fecha_inicio ASC";

        $registros = $this->db->query($sql, [$finca]);

        return $registros->getResultArray();
    }

    public function obtenerListaLoteActividadbyFincaEstado($estado, $finca) {
        $sql = "SELECT la.id_lot_act AS id, la.lote AS lote, lote.nombre AS nlote, la.actividad AS actividad, actividad.nombre AS nactividad, la.fecha_inicio AS f_inicio, la.fecha_fin AS f_fin, la.estado AS estado FROM lote_actividad AS la INNER JOIN lote ON la.lote = lote.id_lote INNER JOIN actividad ON la.actividad = actividad.id_actividad WHERE lote.finca = ? AND la.estado = ? ORDER BY la.fecha_inicio ASC";

        $registros = $this->db->query($sql, [$finca, $estado]);

        return $registros->getResultArray();
    }

    public function editarLoteActividad($id, $inicio, $fin) {
        $data = array(
            'fecha_inicio' => $inicio,
            'fecha_fin' => $fin
        );
        $respuesta = $this->update($id, $data);
        return $respuesta;
    }

    public function editarLoteActividadEstado($id, $estado) {
        $data = array(
            'estado' => $estado
        );
        $respuesta = $this->update($id, $data);
        return $respuesta;
    }

    public function eliminarLoteActividad($id_loteact){
        $loteactividad = $this->escapeString($id_loteact);
        $sql = "DELETE FROM lote_actividad WHERE id_lot_act = ?;";

        $lotes = $this->db->query($sql, [$loteactividad]);
        return $lotes->getResult();
    }
}