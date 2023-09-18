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
        
        /*if($_SERVER['REQUEST_METHOD'] === 'POST'){
            print_r('esto es un POST => ' . $_GET['url']);
            exit;
        } else {
            print_r('Esto es otra cosa => ' . $_GET['url']);
            exit;
        }*/
        
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
        $this->metodos();
    }
    
    public function iniciarInstanciaDAO(){
        $className = 'DAO' . $this->tabla;
        if(class_exists($className)){
            $this->instancia = new $className;
        } else {
            print_r('No existe la clase');
            exit;
        }
        
    }

    public function metodos(){
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