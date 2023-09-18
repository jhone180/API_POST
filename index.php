<?php

header("Access-Control-Allow-Origin: *");
require_once 'dao/DAOPerfil.php';
require_once 'dao/DAOMascotas.php';
require_once 'dao/DAOUsuario.php';
require_once 'responses/response.php';

class API{


    public $tabla;
    public $accion;
    public $id;
    public $instancia;

    public function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $this->tabla = $url[0];
        $this->accion = $url[1];
        $this->id = $url[2];
        $this->inicio();
        
    }

    public function inicio(){
        $this->iniciarInstanciaDAO();
        $this->validacionMetodoHTTP();
    }
    
    public function iniciarInstanciaDAO(){
        $className = 'DAO' . $this->tabla;
        if(class_exists($className)){
            $this->instancia = new $className;
        } else {
            echo Response::responseErrorGeneral('No existe la instancia solicitada.');
            exit;
        }
        
    }

    public function validacionMetodoHTTP(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $this->metodosGET();
        } elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->metodosPOST();
        } elseif($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->metodosDELETE();
        } else {
            echo Response::responseErrorHTTP();
        }
    }

    public function metodosGET(){
        switch($this->accion){
            case 'consultar':
                echo $this->instancia->consultar($this->id);
                break;
            case 'consultarUsuario':
                echo $this->instancia->consultarUsuario($this->id);
                break;
            case 'consultarMascota':
                echo $this->instancia->consultarMascota($this->id);
                break;
            case 'consultarAll':
                echo $this->instancia->consultarAll($this->id);
                break;
            default:
                echo Response::responseErrorAccion();
        }
    }

    public function metodosPOST(){
        switch($this->accion){
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

    public function metodosDELETE(){
        switch($this->accion){
            case 'eliminar':
                echo $this->instancia->eliminar($this->id);
                break;
            default:
                echo Response::responseErrorAccion();
        }
    }
}

new API();

?>