<?php

require_once 'DAOGeneral.php';
require_once 'models/mascotas.php';
require_once 'responses/response.php';

class DAOMascotas extends DAOGeneral{
    
    public function insertar(IModel $obj){
        if($obj instanceof Mascotas){
            return parent::insertar($obj);
        } else{
            Response::responseErrorInstancia($obj, $this->_obtenerInstanciaModelo());
        }
    }

    public function actualizar(IModel $obj) {
        if($obj instanceof Mascotas){
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
    
    public function consultarMascota($id) {
        if(!empty($id)){
            return parent::consultarMascota($id);
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
        $obj->setNombre($data['nombre']);
        $obj->setRaza($data['raza']);
        $obj->setPeso($data['peso']);
        $obj->setIdDueño($data['id_dueño']);
        return $obj;
    }

    protected function _obtenerInstanciaModelo(){
        return new Mascotas();
    }
}

?>