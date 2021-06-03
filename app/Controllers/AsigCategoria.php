<?php

namespace App\Controllers;
use App\Models\AsigCategoriaModel;
use App\Models\LoteModel;
use App\Models\CategoriasModel;

class AsigCategoria extends BaseController {

    public function __construct(){
		$session = \Config\Services::session();
		if ($session->has('session-marcha') == true && $session->has('session-finca') == true) {
			return false;
		}else{
			header('Location: '.base_url('inicioAdmin'));
			die();
		}
	}

    public function vista_asig_categoria(){

        $asigcategoria_db = new AsigCategoriaModel();
        $lote_db = new LoteModel();
        $categoria_db = new CategoriasModel();

		$data = [
            'titulo' => 'Categoria-Lote',
            'archivo_js' => 'asigcategoria.js'
        ];
        $data['asigcategoria'] = $asigcategoria_db->obtenerListaAsigCategoriabyFinca($this->session->get('session-finca')['id_finca']);
        $data['lotes'] = $lote_db->obtenerListaLotebyFinca($this->session->get('session-finca')['id_finca']);
        $data['categorias'] = $categoria_db->obtenerListaCategoriabyFinca($this->session->get('session-finca')['id_finca']);

		$data_encabezado['session_finca'] = $this->session->get('session-finca');
		echo view('encabezado',$data_encabezado);
		echo view('lote/asignar_categoria',$data);
		echo view('footer');
        echo view('lote/modal_asignar_categoria');
		echo view('scripts');
	}



}