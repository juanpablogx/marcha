<?php namespace App\Controllers;

use App\Models\LoteActividadModel;
use App\Models\LoteModel;
use App\Models\ActividadesModel;

class LoteActividad extends BaseController
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

	public function vista_asig_actividad(){
		$loteactividad_db = new LoteActividadModel();
		$lotes_db = new LoteModel();
		$actividades_db = new ActividadesModel();

		$data = [
					'titulo' => 'Lote-Actividad',
					'archivo_js' => 'lote_actividad.js'
				];

		$data['loteactividad'] = $loteactividad_db->obtenerListaLoteActividadbyFinca($this->session->get('session-finca')['id_finca']);
		$data['lotes'] = $lotes_db->obtenerListaLotebyFinca($this->session->get('session-finca')['id_finca']);
		$data['actividades'] = $actividades_db->get_Actividad($this->session->get('session-finca')['id_finca']);

		$data_encabezado['session_finca'] = $this->session->get('session-finca');
		echo view('encabezado',$data_encabezado);
		echo view('lote/asignar_actividad',$data);
		echo view('footer');
        echo view('lote/modal_loteactividad',$data);
		echo view('scripts',$data);
	}
    
	public function agregarLoteActividad(){

		$lote = $this->request->getPost('lote'); 
		$act = $this->request->getPost('actividad');
		$inicio = $this->request->getPost('f_inicio'); 
		$fin = $this->request->getPost('f_fin');

		if ($lote != '' && $act != '' && $inicio != '' && $fin != '') {

			$loteactividad_db = new LoteActividadModel();
			$respuesta = $loteactividad_db->insertarLoteActividad($lote, $act, $inicio, $fin);

			if($respuesta != false) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se agrego la Relacion exitosamente',
					'id' => $respuesta
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al intentar hacer la Relacion'
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

	public function editarLoteActividadEstado(){
		$id = $this->request->getPost('id_lote'); 
		$estado = $this->request->getPost('estado');

		if ($estado != '') {

			$loteactividad_db = new LoteActividadModel();
			$respuesta = $loteactividad_db->editarLoteActividadEstado($id, $estado);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se edito el estado con exito'
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar el estado'
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

	public function editarLoteActividad(){
		$id = $this->request->getPost('id_lote'); 
		$inicio = $this->request->getPost('edit_inicio'); 
		$fin = $this->request->getPost('edit_fin'); 

		if ($inicio != '' && $fin != '') {

			$loteactividad_db = new LoteActividadModel();
			$respuesta = $loteactividad_db->editarLoteActividad($id, $inicio, $fin);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se editaron las fechas con exito'
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar las fechas'
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

	public function eliminarLoteActividad(){
		$id_loteact = $this->request->getPost('id_lote');

		$loteactividad_db = new LoteActividadModel();

		$respuestavalidacion1 = $loteactividad_db->validarLoteActividaduno($id_loteact);

		$respuestavalidacion2 = $loteactividad_db->validarLoteActividaddos($id_loteact);

		if ($respuestavalidacion1 == 0 && $respuestavalidacion2 == 0){
			$respuesta = $loteactividad_db->eliminarLoteActividad($id_loteact);

			if ($respuesta) {
						$data = [
							'estado'=>true,
							'datos'=>$respuesta
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

	public function filtrarActividadbyEstado() {
		$loteactividad_db = new LoteActividadModel();

		$estado = $this->request->getPost('opcion');
		$finca = $this->session->get('session-finca')['id_finca'];
		
		$respuesta = $loteactividad_db->obtenerListaLoteActividadbyFincaEstado($estado, $finca);
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
