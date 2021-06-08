<?php

namespace App\Controllers;
use App\Models\InventarioModel;

class Inventario extends BaseController
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

	public function vista_inventario(){

		$inventario_db = new InventarioModel();

		$data = [
			'titulo' => 'Inventario',
			'archivo_js' => 'inventario.js'
		];
		$data['inventario'] = $inventario_db->obtenerListaInventariobyFinca($this->session->get('session-finca')['id_finca']);
		// $data['inventario'] = $inventario_db->obtenerListaInventario();
		
		$data_encabezado['session_finca'] = $this->session->get('session-finca');
		echo view('encabezado',$data_encabezado);;
		echo view('inventario/inventario',$data);
		echo view('footer');
		echo view('inventario/modal_inventario',$data);
		echo view('scripts',$data);
	}

	public function agregarInventario(){

		$nombre = $this->request->getPost('nombre');
		$descripcion = $this->request->getPost('descripcion'); 
		$medida = $this->request->getPost('medida'); 
		$tipo = $this->request->getPost('tipo'); 
		$precio_und = $this->request->getPost('precio_und'); 
		$stock = $this->request->getPost('stock');
		$finca = $this->session->get('session-finca')['id_finca'];

		if ($nombre != '' && $medida != '' && $tipo != '' && $precio_und != '' && $stock != '' && $finca != '') {
			$inventario_db = new InventarioModel();
			$respuesta = $inventario_db->insertarInventario($nombre, $descripcion, $medida, $tipo, $precio_und, $stock, $finca);

			if($respuesta != false) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se resgistro el articulo exitosamente',
					'lastid' => $respuesta
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al registar el articulo'
				);
			}
		}else{
			$data = array(
				'estado' => 'error',
				'mensaje' => 'Debe llenar Todos los campos (excepto descripción)'
			);

		}
		return json_encode($data);

	}

	public function editarInventario(){

		$id = $this->request->getPost('id_producto');
		$nombre = $this->request->getPost('nombre');
		$descripcion = $this->request->getPost('descripcion'); 
		$medida = $this->request->getPost('medida'); 
		$tipo = $this->request->getPost('tipo'); 
		$precio_und = $this->request->getPost('precio_und'); 
		$stock = $this->request->getPost('stock');
		$finca = $this->session->get('session-finca')['id_finca'];

		if ($id != '' && $nombre != '' && $medida != '' && $tipo != '' && $precio_und != '' && $stock != '') {

			$inventario_db = new InventarioModel();
			$respuesta = $inventario_db->editarInventario($id, $nombre, $descripcion, $medida, $tipo, $precio_und, $stock, $finca);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se edito el articulo exitosamente',
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar el articulo'
				);
				
			}
		}else{
			$data = array(
				'estado' => 'error',
				'mensaje' => 'Debe llenar Todos los campos (excepto descripción)'
			);

			}
			return json_encode($data);
	}

	public function eliminarInventario(){
		$id_producto = $this->request->getPost('id_producto');

		$inventario_db = new InventarioModel();
		$respuesta = $inventario_db->eliminarInventario($id_producto);

		if ($respuesta) {
			$data = array(
				'estado' => 'ok',
				'mensaje' => 'Se eliminó el articulo exitosamente',
			);
		}else{
			$data = array(
				'estado' => 'error',
				'mensaje' => 'Ocurrió un error al eliminar el articulo'
			);
		}
		echo json_encode($data);
	}
}