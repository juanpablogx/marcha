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

		$finca_db = new FincasModel();
		$cantidad = $finca_db->cantidad_fincas($usuario);

		if($cantidad < 3){

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
		else{
			$data = array(
				'estado' => 'error',
				'mensaje' => 'Sobrepasa el limite de fincas permitidas'
			);
			return json_encode($data);
		}	
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

	public function peticionEliminarFinca(){
		$id_finca = $this->request->getPost('id_finca');
		$asunto = $this->request->getPost('asunto');

		if($id_finca != '' && $asunto != '') {
			$email = \Config\Services::email();

			$config['protocol'] = 'smtp';
			$config['SMTPHost'] = 'smtp.gmail.com';
			$config['SMTPUser'] = 'salicitudesmarcha@gmail.com';
			$config['SMTPPass'] = 'marchasena2#';
			// $config['SMTPPort'] = 465;
			// $config['SMTPCrypto'] = 'ssl';
			$config['mailType'] = 'html';
			// $config['wordWrap'] = true;
			// $config['charset']  = 'utf-8';

			$id_solicitud = uniqid();
			$user = $this->session->get('session-marcha')['correo'];

			$email->initialize($config);
			$email->setFrom('salicitudesmarcha@gmail.com', 'Solicitudes');
			$email->setTo('pruebamarcha351@gmail.com');

			$mensaje = '<h1 style="background-color: #234F1E; color: #fff; text-align: center;">Solicitud de Eliminar Finca</h1>
						<p style="text-align: center;">ID solicitud: '.$id_solicitud.'</p>
						<p style="text-align: center;">Correo usuario: '.$user.'</p>
						<p style="text-align: center;">ID finca: '.$id_finca.'</p>
						<p style="text-align: center;">Asunto: '.$asunto.'</p>';

			$email->setSubject('Solicitud Eliminar Finca');
			$email->setMessage($mensaje);

			if($email->send()) {
				$data = array(
					'estado' => true,
					'mensaje' => 'Se envió correctamente la petición. Se responderá prontamente.'
				);
			} else {
				$data = array(
					'estado' => false,
					'mensaje' => 'Hubo un error al enviar la petición'
				);
			}
		} else {
			$data = array(
				'estado' => false,
				'mensaje' => 'Los campos son obligatorios'
			);
		}

		return json_encode($data);
	}
}