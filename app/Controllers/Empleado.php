<?php

namespace App\Controllers;
use App\Models\EmpleadosModel;

class Empleado extends BaseController
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

	public function vista_empleado(){

		$empleados_db = new EmpleadosModel();

		$data = [
					'titulo' => 'Empleado',
					'archivo_js' => 'empleados.js'
				];
		$data['empleados'] = $empleados_db->obtenerListaEmpleadosbyFincaActivos($this->session->get('session-finca')['id_finca']);

		$data_encabezado['session_finca'] = $this->session->get('session-finca');
		echo view('encabezado',$data_encabezado);
		echo view('empleados/empleado',$data);
		echo view('footer');
		echo view('empleados/modal_empleado',$data);
		echo view('scripts', $data);
	}

	public function obtenerEmpleados() {
		$finca = $this->session->get('session-finca')['id_finca'];
		$empleados_db = new EmpleadosModel();
		$opcion = $this->request->getPost('opcion');

		if($opcion == 'inactivos') {
			$respuesta = $empleados_db->obtenerListaEmpleadosbyFincaInactivos($finca);
		} else {
			$respuesta = $empleados_db->obtenerListaEmpleadosbyFincaActivos($finca);
		}

		if(count($respuesta) > 0) {
			return json_encode($respuesta);
		} else {
			return json_encode(false);
		}
	}

	public function agregarEmpleado(){

		$cedula = $this->request->getPost('cedula');
		$nombres = $this->request->getPost('nombre'); 
		$apellido = $this->request->getPost('apellido'); 
		$correo = $this->request->getPost('email'); 
		$telefono = $this->request->getPost('cel'); 
		$tipo_contrato = $this->request->getPost('t_contrato');
		$salario = $this->request->getPost('salario');
		$finca = $this->session->get('session-finca')['id_finca'];  

		if ($cedula != '' && $nombres != '' && $apellido != '' && $correo != '' && $telefono != '' && $tipo_contrato != '' && $salario != '') {
			$empleado_db = new EmpleadosModel();
			$respuesta = $empleado_db->insertarEmpleado($cedula, $nombres, $apellido, $correo, $telefono, $tipo_contrato, $salario, $finca);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se resgistro el empleado exitosamente'
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al registar el empleado'
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
	public function editar_Empleado(){

		$cedula = $this->request->getPost('edit_cedula');
		$nombres = $this->request->getPost('edit_nombre'); 
		$apellido = $this->request->getPost('edit_apellido'); 
		$correo = $this->request->getPost('edit_email'); 
		$telefono = $this->request->getPost('edit_celular'); 
		$tipo_contrato = $this->request->getPost('edit_contrato');
		$salario = $this->request->getPost('edit_salario'); 
		$finca = $this->session->get('session-finca')['id_finca']; 

		if ($cedula != '' && $nombres != '' && $apellido != '' && $correo != '' && $telefono != '' && $tipo_contrato != '' && $salario != '') {

			$empleado_db = new EmpleadosModel();
			$respuesta = $empleado_db->editarEmpleado($cedula, $nombres, $apellido, $correo, $telefono, $tipo_contrato, $salario, $finca);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se edito el empleado exitosamente',
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar el empleado'
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

	public function eliminarEmpleado(){
		$id_usuario = $this->request->getPost('cedula');

		$obj_usuarios = new EmpleadosModel();
		$respuesta = $obj_usuarios->eliminarEmpleado($id_usuario);

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

	public function restaurarEmpleado(){
		$id_usuario = $this->request->getPost('cedula');

		$obj_usuarios = new EmpleadosModel();
		$respuesta = $obj_usuarios->restaurarEmpleado($id_usuario);

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

