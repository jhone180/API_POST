<?php

require_once '../dao/DAOPerfil.php';
require_once '../responses/response.php';

class API{


    public $tabla;
    public $accion;
    public $id;
    public $instancia;

    public function __construct() {
        $this->tabla = $_GET['tabla'];
        $this->accion = $_GET['_accion'];
        $this->id = $_GET['id'];
        $this->inicio();
    }

    public function inicio(){
        if($this->tabla == 'perfil'){
            $this->instancia = new DAOPerfil();
        }
        $this->metodos();
    }

    public function metodos(){
        switch($this->accion){
            case 'consultar':
                echo $this->instancia->consultar($this->id);
                break;
            case 'consultarAll':
                echo $this->instancia->consultarAll($this->id);
                break;
            case 'eliminar':
                echo $this->instancia->eliminar($this->id);
                break;
            case 'actualizar':
                $json = file_get_contents('php://input');
                $array = json_decode($json, true);
                $obj = $this->instancia->mapeoDatos($array);
                echo $this->instancia->actualizar($obj);
                break;
            case 'registrar':
                $json = file_get_contents('php://input');
                $array = json_decode($json, true);
                $obj = $this->instancia->mapeoDatos($array);
                echo $this->instancia->insertar($obj);
                break;
            default:
                echo Response::responseErrorAccion();       
        }
    }

}

new API();

?>