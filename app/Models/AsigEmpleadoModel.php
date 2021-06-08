<?php

namespace App\Models;
use CodeIgniter\Model;

class AsigEmpleadoModel extends Model{
    protected $table      = 'asignar_empleado';
    protected $primaryKey = 'id_asignar';

    protected $returnType = 'array';
    protected $useSoftDeletes = false; 

    protected $allowedFields = ['empleado', 'actividad_l', 'calificacion'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function insertarAsignarEmpleado($empleado, $actividad_l) {
        $data = array(
            'empleado' => $empleado,
            'actividad_l' => $actividad_l
        );
        $respuesta = $this->insert($data);
        if($respuesta) {
            return $this->insertID;
        } else {
            return false;
        }
    }

    public function obtenerListaAsigEmp($finca) {

        $sql = "SELECT asignar_empleado.id_asignar, asignar_empleado.empleado, asignar_empleado.actividad_l, asignar_empleado.calificacion, empleado.nombres, empleado.apellidos, actividad.nombre AS nomact, lote.nombre AS nomlote FROM asignar_empleado INNER JOIN empleado ON asignar_empleado.empleado = empleado.id_empleado INNER JOIN lote_actividad ON  asignar_empleado.actividad_l = lote_actividad.id_lot_act INNER JOIN lote ON lote_actividad.lote = lote.id_lote INNER JOIN actividad ON lote_actividad.actividad = actividad.id_actividad WHERE empleado.finca = ?";

        $registros = $this->db->query($sql, [$finca]);

        return $registros->getResultArray();
    }

    public function editarAsigEmpleado($id_asig_empleado, $calificacion) {
        $data = array(
            'id_asignar'=>$id_asig_empleado,
            'calificacion' => $calificacion,
        );
        $respuesta = $this->update($id_asig_empleado, $data);
        return $respuesta;
        
    }


    public function eliminarAsigEmp($id_asig_empleado){
        $asig = $this->escapeString($id_asig_empleado);
        $sql = "DELETE FROM asignar_empleado WHERE id_asignar = ?;";

        $asig_empleado = $this->db->query($sql, [$asig]);
        return $asig_empleado->getResult();
    }

}