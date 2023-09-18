<?php

require_once 'DAOGeneral.php';
require_once '../models/publicaciones.php';
require_once '../responses/response.php';

class DAOPublicaciones extends DAOGeneral{
    
    public function insertar(IModel $obj){
        if($obj instanceof Publicaciones){
            return parent::insertar($obj);
        } else{
            Response::responseErrorInstancia($obj, $this->_obtenerInstanciaModelo());
        }
    }

    public function actualizar(IModel $obj) {
        if($obj instanceof Publicaciones){
            return parent::actualizar($obj);
        } else {
            return Response::responseErrorInstancia($obj, $this->_obtenerInstanciaModelo());
        }
    }

    public function consultar($id) {
        if(!empty($id)){
            return parent::consultar($id);
        } else {
            return Response::responseErrorLlave();
        }
    }

    public function consultarAll() {
        return parent::consultarAll();
    }

    public function eliminar($id) {
        if(!empty($id)){
            return parent::eliminar($id);
        } else {
            return Response::responseErrorLlave();
        }
    }

    public function mapeoDatos(array $data){
        $obj = $this->_obtenerInstanciaModelo();
        $obj->setId($data['id']);
        $obj->setFecha($data['fecha']);
        $obj->setTitulo($data['titulo']);
        $obj->setPrivacidad($data['privacidad']);
        $obj->setIdUsuario($data['id_usuario']);
        return $obj;
    }

    protected function _obtenerInstanciaModelo(){
        return new Publicaciones();
    }
}

?>