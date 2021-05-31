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

}