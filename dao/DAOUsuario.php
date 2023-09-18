<?php

require_once 'DAOGeneral.php';
require_once 'models/usuario.php';
require_once 'responses/response.php';

class DAOUsuario extends DAOGeneral{
    
    public function insertar(IModel $obj){
        if($obj instanceof Usuario){
            return parent::insertar($obj);
        } else{
            Response::responseErrorInstancia($obj, $this->_obtenerInstanciaModelo());
        }
    }

    public function actualizar(IModel $obj) {
        if($obj instanceof Usuario){
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
    
    public function consultarUsuario($usuario) {
        if(!empty($usuario)){
            return parent::consultarUsuario($usuario);
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
        $contasena = trim($data['contrasena']);
        $obj->setId($data['id']);
        $obj->setNombre($data['nombre']);
        $obj->setTelefono($data['telefono']);
        $obj->setEmail($data['email']);
        $obj->setContrasena($contasena);
        return $obj;
    }

    protected function _obtenerInstanciaModelo(){
        return new Usuario();
    }
}

?>