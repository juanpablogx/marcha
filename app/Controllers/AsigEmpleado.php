<?php

namespace App\Controllers;

use App\Models\LoteActividadModel;
use App\Models\AsigEmpleadoModel;
use App\Models\EmpleadosModel;

class AsigEmpleado extends BaseController
{ 

	public function __construct(){
		$session = \Config\Services::session(); 
		if ($session->has('session-marcha') == true && $session->has('session-finca') == true) {
			return false;
		}else{
			header('Location: '.base_url('inicioAdmin'));
			die();
		}
	}

	public function vista_asig_empleado(){
        $asigempleado_db = new EmpleadosModel();
		$activida_l_db = new LoteActividadModel();
		$mostrar_db = new AsigEmpleadoModel();

		$data = [
					'titulo' => 'Asignar Empleado',
					'archivo_js' => 'asignar_empleado.js'
				];
				
		$data['mostrar_asig_emp'] = $mostrar_db->obtenerListaAsigEmp($this->session->get('session-finca')['id_finca']);
		$data['actividad_l'] = $activida_l_db->obtenerListaLoteActividadbyFinca($this->session->get('session-finca')['id_finca']);
		$data['asig_emp'] = $asigempleado_db->obtenerListaEmpleadosbyFincaActivos($this->session->get('session-finca')['id_finca']);

		$data_encabezado['session_finca'] = $this->session->get('session-finca');
		echo view('encabezado',$data_encabezado);;
		echo view('actividad/asignar_empleado',$data);
		echo view('footer');
		echo view('actividad/modal_asignar_empleado',$data);
		echo view('scripts');
	}


	public function agregarAsignarEmpleado(){

		$empleado = $this->request->getPost('cod_empleado'); 
		$actividad_l = $this->request->getPost('cod_act');

		if ($empleado != '' && $actividad_l != '') {

			$asignarEmp_db = new AsigEmpleadoModel();
			$respuesta = $asignarEmp_db->insertarAsignarEmpleado($empleado, $actividad_l);

			if($respuesta != false) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se agrego Asignar Empleado exitosamente',
					'id' => $respuesta
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al agregar Asignar Empleado',
					'id' => $respuesta
				);
			}
		}else{
			$data = array(
				'estado' => 'error',
				'mensaje' => 'Debe llenar Todos los campos'
			);

		}
		return json_encode($data);

	}

	public function editarAsigEmp(){
		$id_asig_empleado = $this->request->getPost('id_asig_empleado'); 
		$calificacion = $this->request->getPost('edit_cod_calificar');  

		if ($calificacion != '') {

			$asig_empleado_db = new AsigEmpleadoModel();
			$respuesta = $asig_empleado_db->editarAsigEmpleado($id_asig_empleado, $calificacion);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se edito Asignar Empleado exitosamente'
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar Asignar Empleado'
				);
			}
		}else{
			$data = array(
				'estado' => 'error',
				'mensaje' => 'Debe llenar Todos los campos'
			);

		}
		return json_encode($data);

	}
	public function eliminarAsigEmpleado(){
		$id_asig_empleado = $this->request->getPost('id_asig_empleado');

		$asig_empleado_db = new  AsigEmpleadoModel();
		$respuesta = $asig_empleado_db->eliminarAsigEmp($id_asig_empleado);

		if ($respuesta) {
					$data = [
						'estado'=>true,
						'datos'=>$respuesta
					];
		}else{
					$data = [
						'estado'=>"ERROR"
					];
		}
		echo json_encode($data);
	}
}