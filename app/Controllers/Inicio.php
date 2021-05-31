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
		return json_encode( "Estamos en el metodo.. llego desde el AJAX" );
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