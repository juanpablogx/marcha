<?php

namespace App\Controllers;
use App\Models\HerramientasModel;
use App\Models\InventarioModel;
use App\Models\LoteActividadModel;

class Herramientas extends BaseController
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

	public function vista_herramientas(){

		$herramientas_db = new HerramientasModel();
		$inventario_db = new InventarioModel();
		$lote_actividad_db = new LoteActividadModel();


		$data = [
					'titulo' => 'Herramientas',
					'archivo_js' => 'herramientas.js'
				];

		$data['herramientas'] = $herramientas_db->get_herramienta($this->session->get('session-finca')['id_finca']);

		$data['inventario'] = $inventario_db->obtenerListaInventariobyFinca($this->session->get('session-finca')['id_finca']);

		$data['actividad_l'] = $lote_actividad_db->obtenerListaLoteActividadbyFinca($this->session->get('session-finca')['id_finca']);

		$data_encabezado['session_finca'] = $this->session->get('session-finca');
		echo view('encabezado',$data_encabezado);
		echo view('actividad/herramientas',$data);
		echo view('footer');
		echo view('actividad/modal_herramientas',$data);
		echo view('scripts',$data);
	}

	public function agregarHerramienta(){

		$actividad_lot = $this->request->getPost('cod_actL'); //lo q esta en el name
		$producto = $this->request->getPost('cod_producto');
		$cantidad = $this->request->getPost('cantidad'); 
		$tipo = $this->request->getPost('tipo');   

		if ($actividad_lot != '' && $producto != '' && $cantidad != '' && $tipo != '') {

			$herramientas_db = new HerramientasModel();
			$respuesta = $herramientas_db->insertar_Herramienta($actividad_lot, $producto, $cantidad, $tipo);

			if($respuesta != false) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se agrego la Herramienta exitosamente',
					'id'=> $respuesta
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al agregar Herramienta'
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

	public function editarHerramienta(){
		$id = $this->request->getPost('id');
		$actividad_lot = $this->request->getPost('edit_cod_actL'); //name
		$producto = $this->request->getPost('edit_cod_producto');
		$cantidad = $this->request->getPost('edit_cantidad'); 
		$tipo = $this->request->getPost('edit_tipo');   

		if ($actividad_lot != '' && $producto != '' && $cantidad != '' && $tipo != '') {

			$herramientas_db = new HerramientasModel();
			$respuesta = $herramientas_db->editar_Herramienta($id, $actividad_lot, $producto, $cantidad, $tipo);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se edito la Herramienta exitosamente'
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar Herramienta'
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

	public function eliminarHerramienta(){
		$id = $this->request->getPost('id');

		$herramientas_db = new HerramientasModel();
		$respuesta = $herramientas_db->eliminar_Herramienta($id);

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
