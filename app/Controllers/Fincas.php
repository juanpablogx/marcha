<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DepartamentosModel;
use App\Models\MunicipiosModel;
use App\Models\FincasModel;

class Fincas extends BaseController {
	
	public function __construct(){
		$session = \Config\Services::session();
		if ($session->has('session-marcha')) {
			return false;
		}else{
			header('Location: '.base_url('Ingreso'));
			die();
		}
	}

	public function index(){ 
		$fincas_db = new FincasModel();
		$deptos_db = new DepartamentosModel();

		$data['deptos'] = $deptos_db->obtenerListaDeptos();
		$data['fincas'] = $fincas_db->obtenerListaFincasbyUser($this->session->get('session-marcha')['cedula']);
		$data['session'] = $this->session->get('session-marcha');
		return view('fincas_inicio', $data);
	}

	public function obtenerMunicipios() {
		$depto = $this->request->getPost('depto');
		$mun_db = new MunicipiosModel();

		$registros = $mun_db->obtenerMunbyDepto($depto);
		return json_encode($registros);
	}

	public function agregarFinca() {
		
		$nombre = $this->request->getPost('nombre'); 
		$usuario = $this->session->get('session-marcha')['cedula']; 
		$extension = $this->request->getPost('extension'); 
		$departamento = $this->request->getPost('departamento'); 
		$municipio = $this->request->getPost('municipio');

		$fincas_db = new FincasModel();
		$respuesta = $fincas_db->insertarFinca($nombre, $usuario, $extension, $departamento, $municipio);

		if($respuesta != false) {
			$data = array(
				'estado' => 'ok',
				'mensaje' => 'Se creó la finca exitosamente',
				'id' => $respuesta
			);
		} else {
			$data = array(
				'estado' => 'error',
				'mensaje' => 'Ocurrió un error al crear la finca'
			);
		}
		return json_encode($data);
	}
	public function editarFincas(){
		$id_finca = $this->request->getPost('id_finca'); 
		$nombre = $this->request->getPost('edit_nombre');  
		$extension = $this->request->getPost('edit_extension'); 
		if ($nombre != '' && $extension != '') {

			$finca_db = new  FincasModel();
			$respuesta = $finca_db->editarFinca($id_finca, $nombre, $extension);

			if($respuesta) {
				$data = array(
					'estado' => 'ok',
					'mensaje' => 'Se edito la finca exitosamente'
				);
			} else {
				$data = array(
					'estado' => 'error',
					'mensaje' => 'Ocurrió un error al editar la finca'
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
}