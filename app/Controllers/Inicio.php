<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class Inicio extends BaseController {
	
	public function index(){
		$usuarios_db = new UsuariosModel();
		$datos['lista_usuarios'] = $usuarios_db->obtenerListaUsuarios();
		return view('inicio', $datos);
	}

	// public function getListaUsuariosAjax(){
	// 	$usuarios_db = new UsuariosModel();
	// 	$datos['lista_usuarios'] = $usuarios_db->obtenerListaUsuarios();
	// 	return json_encode($datos);
	// }

	public function paginaRegistro(){
		return view('registro');
	}

	public function paginaIngreso(){
		return view('ingreso');
	}

	public function email_recuperar(){
		$correo = $this->request->getPost('correo');
		$usuario_db = new UsuariosModel();
		$respuesta = $usuario_db->validarCorreo($correo);

		if(count($respuesta) > 0) {
			$email = \Config\Services::email();

			$config['protocol'] = 'smtp';
			$config['SMTPHost'] = 'smtp.gmail.com';
			$config['SMTPUser'] = 'pruebamarcha351@gmail.com';
			$config['SMTPPass'] = 'marchasena1#';
			// $config['SMTPPort'] = 465;
			// $config['SMTPCrypto'] = 'ssl';
			$config['mailType'] = 'html';
			// $config['wordWrap'] = true;
			// $config['charset']  = 'utf-8';

			$email->initialize($config);
			$email->setFrom('pruebamarcha351@gmail.com', 'Equipo MARCHA');
			$email->setTo($correo);

			$token = uniqid();

			// Pendiente por mejorar
			$mensaje = '<h1 style="background-color: #234F1E; color: #fff; text-align: center;">Equipo MARCHA - Recuperación de Cuenta</h1>
						<p style="text-align: center;">Deberás cambiar tu contraseña para recuperar la cuenta.</p>
						<div style="display: flex; justify-content: center;">
							<a href="'.base_url('cambiarContrasena').'/'.$token.'" style="background-color: #77942E; color: #fff; padding: 5px; border: none; border-radius: 3px; text-decoration: none;">Haz click aquí</a>
						</div>';

			$email->setSubject('Recuperar la cuenta');
			$email->setMessage($mensaje);

			if($email->send()) {
				$respuesta = $usuario_db->insertarToken($token, $correo);
				if($respuesta) {
					$data = array(
						'estado' => true,
						'mensaje' => 'Se envió correctamente el email. Revisa tu correo'
					);
				} else {
					$data = array(
						'estado' => false,
						'mensaje' => 'Error al crear el token'
					);
				}
			} else {
				$data = array(
					'estado' => false,
					'mensaje' => 'Hubo un error al enviar el email'
				);
			}
		} else {
			$data = array(
				'estado' => false,
				'mensaje' => 'El correo brindado no pertenece a un usuario'
			);
		}

		return json_encode($data);
	}

	public function vista_cambiar_pass($token) {
		if($token != '' || $token != NULL) {
			$usuario_db = new UsuariosModel();
			$respuesta = $usuario_db->validarToken($token);
			if(count($respuesta) > 0) {
				$data['token'] = $token;
				$this->session->set($data);
				return view('cambiar_pass');
			} else {
				header('Location: '.base_url('Ingreso'));
				die();
			}
		} else {
			header('Location: '.base_url('Ingreso'));
			die();
		}
	}

	public function editarContrasena() {
		$pass = $this->request->getPost('contrasena');
		$confpass = $this->request->getPost('confcontrasena');

		if(($pass != '' || $confpass != '') && $pass == $confpass) {
			$usuario_db = new UsuariosModel();
			$respuesta = $usuario_db->editarContrasena($confpass, $this->session->get('token'));
			if($respuesta) {
				$resultado = $usuario_db->eliminarToken($this->session->get('token'));
				if($resultado) {
					$this->session->remove('token');
					return redirect('Ingreso');
				} else {
					$data = [
						'estado' => 'error',
						'mensaje' => 'Problema con el token'
					];
					return view('cambiar_pass', $data);
				}
			} else {
				$data = [
					'estado' => 'error',
					'mensaje' => 'Problema al cambiar la contraseña'
				];
				return view('cambiar_pass', $data);
			}
		} else {
			$data = [
				'estado' => 'error',
				'mensaje' => 'Las contraseñas no coinciden'
			];
			return view('cambiar_pass', $data);
		}
	}

	public function crearRegistroUsuario(){
		$doc = $_POST['documento'];
		$nom = $_POST['nombre'];
		$ape = $_POST['apellido'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$conpass = $_POST['confi_pass']; 

		if ($pass == $conpass){

			$usuario_db = new UsuariosModel();
			$resultadoval = $usuario_db->validarCorreo($email);
			$resultadovalced = $usuario_db->validarCedula($doc);

			if (COUNT($resultadoval) < 1 && COUNT($resultadovalced) < 1) {

				$resultado = $usuario_db->insertarRegistro($doc, $nom, $ape, $email, $pass);

				if ($resultado) {
					$datos = array(
								"estado" => "OK", 
								"mensaje" => "Registro Exitoso "
								);
				} else {
					$datos = array("estado" => "ERROR", 
									"mensaje" => "Algo salió mal. Por favor intentelo nuevamente"
									);
				}
			} else {
				$datos = array("estado" => "ERROR", 
								"mensaje" => "Su cedula o Correo ya fueron registrados."
								);
			}

		} else {
			$datos = array(
						"estado" => "ERROR", 
						"mensaje" => "La contraseña no coincide intentelo de nuevo!"
						);
		}

		return json_encode($datos);
	}
 

	public function validarDatosIngreso(){
		$correo = $this->request->getPost('email');
		$password = md5($this->request->getPost('password'));

		$usuario_db = new UsuariosModel();
		$validar = $usuario_db->validarIngreso($correo, $password);

		if ($validar) {
			/* Buscar datos para la sesion */
			$datos['session-marcha'] = $usuario_db->getDatosSession($correo);

			/* Crear la sesion */
			$this->session->set($datos);

			/* redirigir al inicio del administrador */
			return redirect('inicioAdmin','refresh');
		}else{
			/*Devolver a la vista de login con un mensaje de error*/
			$data['mensaje_ingreso'] = 'ERROR';
			$data['valor_email'] = $correo;
			$data['pass'] = $password;
			return view('ingreso', $data);
		}
	}

	public function cerrarSesion(){
		$this->session->destroy();
		return redirect('Ingreso','refresh');
	}


}