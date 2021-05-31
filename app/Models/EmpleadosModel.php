<?php

namespace App\Models;
use CodeIgniter\Model;

class EmpleadosModel extends Model{
    protected $table      = 'empleado';
    protected $primaryKey = 'cedula';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['cedula','nombres', 'apellidos', 'correo', 'telefono', 'tipo_contrato', 'salario', 'finca', 'estado'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function insertarEmpleado($cedula, $nombres, $apellidos, $correo, $telefono, $tipo_contrato, $salario, $finca) {
        $data = array(
            'cedula' => $cedula,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'correo' => $correo,
            'telefono' => $telefono,
            'tipo_contrato' => $tipo_contrato,
            'salario' => $salario,
            'estado' => 'activo',
            'finca' => $finca
        );
        $respuesta = $this->insert($data);
        return $respuesta;
    }

    public function obtenerListaEmpleadosbyFincaInactivos($finca) {
        $sql = "SELECT * FROM empleado WHERE finca = ? AND estado = 'inactivo'";

        $registros = $this->db->query($sql, [$finca]);

        return $registros->getResultArray();
    }

    public function obtenerListaEmpleadosbyFincaActivos($finca) {
        $sql = "SELECT * FROM empleado WHERE finca = ? AND estado = 'activo'";

        $registros = $this->db->query($sql, [$finca]); 

        return $registros->getResultArray();
    }

    public function editarEmpleado($cedula, $nombres, $apellidos, $correo, $telefono, $tipo_contrato, $salario, $finca) {
        $data = array(
            'cedula'=>$cedula,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'correo' => $correo,
            'telefono' => $telefono,
            'tipo_contrato' => $tipo_contrato,
            'salario' => $salario,
            'estado' => 'activo',
            'finca' => $finca
        );
        return $this->update($cedula, $data);
        
    }
	public function editarListaEmpleadosbyFinca($finca) {
        $sql = "UPDATE empleado SET cedula = ?, nombres = ?, apellidos = ? correo = ?, telefono = ?, tipo_contrato = ? salario = ?; ";

        $registros = $this->db->query($sql, [$finca]);

        return $registros->getResultArray();
    }

    public function eliminarEmpleado($id_usuario){
        $ced = $this->escapeString($id_usuario);
        $sql = "UPDATE empleado SET estado='inactivo' WHERE cedula = ?;";

        $empleados = $this->db->query($sql, [$ced]);
        return $empleados->getResult();
    }

    public function restaurarEmpleado($id_usuario){
        $ced = $this->escapeString($id_usuario);
        $sql = "UPDATE empleado SET estado='activo' WHERE cedula = ?;";

        $empleados = $this->db->query($sql, [$ced]);
        return $empleados->getResult();
    }
}