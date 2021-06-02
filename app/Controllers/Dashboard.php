<?php

namespace App\Controllers;

use App\Models\FincasModel;

class Dashboard extends BaseController
{

    public function __construct(){
		$session = \Config\Services::session();
		if ($session->has('session-marcha')) {
			return false;
		}else{
			header('Location: '.base_url('Ingreso'));
			die();
		}
	}

    public function inicio_dashboard($id_finca) {
        $fincas_db = new FincasModel();
        $id_user = $this->session->get('session-marcha')['cedula'];
        $datos['session-finca'] = $fincas_db->getDatosSession($id_finca, $id_user);
        $this->session->set($datos);
        $data = [
            'titulo' => 'Bienvenido',
            'finca' => $this->session->get('session-finca'),
            'usuario' => $id_user
        ];

        $data_encabezado['session_finca'] = $this->session->get('session-finca');
        echo view('encabezado',$data_encabezado);
        echo view('dashboard',$data);
        echo view('footer');
        echo view('scripts');
    }
}