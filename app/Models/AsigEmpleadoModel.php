<?php

namespace App\Models;
use CodeIgniter\Model;

class AsigEmpleadoModel extends Model{
    protected $table      = 'asignar_empleado';
    protected $primaryKey = 'id_asignar';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['empleado', 'actividad_l', 'fecha_inicio', 'fecha_fin', 'calificacion', 'descripcion', 'estado'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function insertarActividad($nombre, $descripcion, $finca) {
        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'finca' => $finca
        );
        $respuesta = $this->insert($data);
        if($respuesta) {
            return $this->insertID;
        } else {
            return false;
        }
    }


    public function get_Actividad($finca) {
        $sql = "SELECT id_actividad, nombre, descripcion FROM actividad WHERE finca = ?";

        $registros = $this->db->query($sql, [$finca]); 

        return $registros->getResultArray();
    }

    public function editarActividad($id_actividad, $nombre, $descripcion, $finca) {
        $data = array(
            'id_actividad'=>$id_actividad,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'finca' => $finca
        );
        $respuesta = $this->update($id_actividad, $data);
        return $respuesta;
        
    }

    public function editarActividadByFinca($id_actividad, $nombre, $descripcion, $finca) {

        $id_actividad = $this->escapeString($id_actividad);
        $nombre = $this->escapeString($nombre);
        $descripcion = $this->escapeString($descripcion);
        
        $sql = "UPDATE actividad SET nombre = ?, descripcion = ? WHERE id_actividad = ?;";

        $registros = $this->db->query($sql, [$nombre, $descripcion, $id_actividad]);

        return $registros->getResultArray();
    }

    public function eliminarActividad($id_actividad){
        $act = $this->escapeString($id_actividad);
        $sql = "DELETE FROM actividad WHERE id_actividad = ?;";

        $actividades = $this->db->query($sql, [$act]);
        return $actividades->getResult();
    }

    public function ListaActividad($finca, $opcion) {
        $opcion = $this->escapeString($opcion);

        $sql = "SELECT * FROM actividad WHERE estado = ? AND finca = ?;";
        $registros = $this->db->query($sql, [$opcion, $finca]);

        return $registros->getResultArray();
    }

}