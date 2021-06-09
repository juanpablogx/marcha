<?php

namespace App\Controllers;
use App\Models\ActividadesModel;

class Actividad extends BaseController
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

	public function vista_actividad(){

		$actividad_db = new ActividadesModel();

		$data = [
					'titulo' => 'Actividad',
					'archivo_js' => 'actividades.js'
				];

		$data['actividades'] = $actividad_db->get_Actividad($this->session->get('session-finca')['id_finca']);

		$data_encabezado['session_finca'] = $this->session->get('session-finca');
		echo view('encabezado',$data_encabezado);;
		echo view('actividad/actividad',$data);
		echo view('footer');
		echo view('actividad/modal_actividad',$data);
		echo view('scripts',$data);
	}

	public function agregarActividad(){

		$nombre = $this->request->getPost('nombre'); 
		$descripcion = $this->request->getPost('descripcion');
		$finca = $this->session->get('session-finca')['id_finca'];  

		if ($nombre != '' && $descripcion != '') {

			$actividad_db = new ActividadesModel();
			$respuesta = $actividad_db->insertarActividad($nombre, $descripcion, $finca);

			if($respuesta != false) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se agrego la Actividad exitosamente',
					'id' => $respuesta
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al agregar Actividad'
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

	public function editarActividad(){
		$id_actividad = $this->request->getPost('id_actividad'); 
		$nombre = $this->request->getPost('nombre'); 
		$descripcion = $this->request->getPost('descripcion');
		$finca = $this->session->get('session-finca')['id_finca'];  

		if ($nombre != '' && $descripcion != '') {

			$actividad_db = new ActividadesModel();
			$respuesta = $actividad_db->editarActividad($id_actividad, $nombre, $descripcion, $finca);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se edito la Actividad exitosamente'
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar Actividad'
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
	public function eliminarActividad(){
		$id_actividad = $this->request->getPost('id_actividad');

		$actividad_db = new ActividadesModel();
		$respuestavalidacion = $actividad_db->validarActividad($id_actividad);

		if ($respuestavalidacion == 0){
			$respuesta = $actividad_db->eliminarActividad($id_actividad);

			if ($respuesta) {
						$data = [
							'estado'=> true,
							'datos'=> $respuesta
						];
			}else{
						$data = [
							'estado'=> false,
							'mensaje'=> "No se pudo eliminar este campo, intentelo mas tarde"
						];
			}
		} else {
			$data = [
				'estado'=> false,
				'mensaje'=> "Este campo no puede ser Eliminado, porque lo esta usando en otra tabla"
			];
		}

		echo json_encode($data);
	}
	public function filtrarActividad() {
		$finca = $this->session->get('session-finca')['id_finca'];
		$opcion = $this->request->getPost('opcion');
		
		$actividad_db = new ActividadesModel();
		$respuesta = $actividad_db->ListaActividad($finca, $opcion);
		if (count($respuesta) > 0) {
			$data = [
				'estado'=>true,
				'datos'=>$respuesta
			];
		}else{
			$data = [
				'estado'=> false
			];
		}
		return json_encode($data);
	}
}