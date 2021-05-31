<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table      = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_usuario', 'nombres', 'apellidos', 'correo', 'contrasena'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function insertarRegistro($doc, $nom, $ape, $email, $pass){
        $datos_insert = array(
                                'id_usuario'=>$doc,
                                'nombres'=>$nom,
                                'apellidos'=>$ape,
                                'correo'=>$email,
                                'contrasena'=>md5($pass)
                            );

        $respuesta = $this->insert($datos_insert);
        return ($respuesta==0)? true:false;
    }

    public function obtenerListaUsuarios(){
        $registros = $this->select(['id_usuario AS cedula', 'nombres', 'apellidos', 'correo'])
                        ->find(); 
        return $registros;
    }

    public function validarIngreso($correo, $password){
        $registros = $this->select(['id_usuario'])
                        ->where(['correo'=>$correo, 'contrasena'=>$password])
                        ->find();

        return ( sizeof($registros)!=0 )? true : false;
    }

    public function getDatosSession($correo){
        $registros = $this->select(['id_usuario AS cedula', 'nombres', 'apellidos', 'correo'])
                        ->where(['correo'=>$correo])
                        ->find();
        return $registros[0];
    }

}