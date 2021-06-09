<?php

namespace App\Controllers;
use App\Models\CategoriasModel;

class Categoria extends BaseController
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

	public function vista_categoria()
	{
		$categoria_db = new CategoriasModel();


		$data = [
					'titulo' => 'Categoria',
					'archivo_js' => 'categorias.js'
				];

		$data['categorias'] = $categoria_db->obtenerListaCategoriabyFinca($this->session->get('session-finca')['id_finca']);

		$data_encabezado['session_finca'] = $this->session->get('session-finca');
		echo view('encabezado',$data_encabezado);;
		echo view('categoria/categoria',$data);
		echo view('footer');
		echo view('categoria/modal_categoria',$data);
		echo view('scripts',$data);
	}

	public function agregarCategoria()
	{
		$categoria = $this->request->getPost('nom_categ');
		$tipo = $this->request->getPost('t_categoria'); 
		$produce = $this->request->getPost('tp_prod');

		$finca = $this->session->get('session-finca')['id_finca'];  

		if ($categoria != '' && $tipo != '' && $produce != '') {
			$categoria_db = new CategoriasModel();
			$respuesta = $categoria_db->insertarCategoria($categoria, $tipo, $produce, $finca);

			if($respuesta != false) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se resgistro la categoria exitosamente',
					'id' => $respuesta
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al registar la categoria'
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

	public function listarCategoria() {
		$finca = $this->session->get('session-finca')['id_finca'];
		$categoria_db = new CategoriasModel();

		$respuesta = $categoria_db->obtenerListaCategoriabyFinca($finca);

		if(count($respuesta) > 0) {
			return json_encode($respuesta);
		} else {
			return json_encode(false);
		}
	}

	public function EliminarCategoria()
	{
		$id_categoria = $this->request->getPost('id_categoria');

		$categoria_db = new CategoriasModel();

		$respuestavalidacion = $categoria_db->validarCategoria($id_categoria);

		if ($respuestavalidacion == 0){
			$respuesta = $categoria_db->eliminarCategoria($id_categoria);

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
		} else {
			$data = [
				'estado'=> false,
				'mensaje'=> "Este campo no puede ser Eliminado, porque lo esta usando en otra tabla"
			];
		}
		echo json_encode($data);
	}

	public function editarCategoria(){

		$id_cate = $this->request->getPost('id_cate');
		$categoria = $this->request->getPost('edit_categoria'); 
		$tipo = $this->request->getPost('edit_tipocategoria'); 
		$produce = $this->request->getPost('edit_producido'); 

		if ($categoria != '' && $tipo != '' && $produce != '') {

			$categoria_db = new CategoriasModel();
			$respuesta = $categoria_db->editarCategoria($id_cate, $categoria, $tipo, $produce);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se edito la categoria exitosamente',
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar la categoria'
				);
				
			}
		}else{
			$data = array(
				'estado' => 'error',
				'mensaje' => 'No puede dejar campos vacios'
			);

			}
			return json_encode($data);
	}

}