<?php

require_once 'DAOGeneral.php';
require_once '../models/persona.php';
require_once '../responses/response.php';

class DAOPersona extends DAOGeneral{
    
    public function insertar(IModel $obj){
        if($obj instanceof Persona){
            return parent::insertar($obj);
        } else{
            Response::responseErrorInstancia($obj, $this->_obtenerInstanciaModelo());
        }
    }

    public function actualizar(IModel $obj) {
        if($obj instanceof Persona){
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
        $obj->setCedula($data['cedula']);
        $obj->setNombre($data['nombre']);
        $obj->setTelefono($data['telefono']);
        $obj->setIdPerfil($data['id_perfil']);
        return $obj;
    }

    protected function _obtenerInstanciaModelo(){
        return new Persona();
    }
}

?>