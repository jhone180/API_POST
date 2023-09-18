<?php

require_once 'IDataBase.php';
require_once 'db/conection.php';
require_once 'responses/response.php';

abstract class DAOGeneral extends Connection implements IDataBase{


    protected $_columnas;

    protected $_valores;

    /**
     * 
     */
    public function insertar(IModel $obj){
        $this->validarObjeto($obj);
        $respuesta = $this->insertarValores($obj);
        return $respuesta;
    }

    /**
     * 
     */
    public function actualizar(IModel $obj){
        $this->validarObjeto($obj);
        $respuesta = $this->actualizarValores($obj);
        return $respuesta;
    }

    /**
     * 
     */
    public function consultar($id){
        $respuesta = $this->validarParametroConsulta($id);
        return $respuesta;
    }
    
    /**
     * 
     */
    public function consultarUsuario($usuario){
        $respuesta = $this->validarParametroConsultaUsuario($usuario);
        return $respuesta;
    }
    
    /**
     * 
     */
    public function consultarMascota($idUsuario){
        $respuesta = $this->validarParametroConsultaMascota($idUsuario);
        return $respuesta;
    }

    /**
     * 
     */
    public function consultarAll(){
        $respuesta = $this->consultarValoresAll();
        return $respuesta;
    }

    /**
     * 
     */
    public function eliminar($id){
        $respuesta = $this->validarParametroEliminar($id);
        return $respuesta;
    }

    /**
     * 
     */
    public function validarObjeto(IModel $obj){
        foreach($obj as $key => $valor){
            if(!empty($valor)){
                $this->_columnas[] = $key;
                $this->_valores[] = $valor;
            }
        }
    }

    /**
     * 
     */
    public function insertarValores(IModel $obj){
        $tabla = $obj->getNomTabla();
        $columnasString = implode(', ', $this->_columnas);
        $valoresString = implode(', ', array_fill(0, count($this->_valores), '?'));

        $query = $this->connect()->prepare("INSERT INTO $tabla ($columnasString) VALUES ($valoresString)");
        if($query->execute($this->_valores)){
            $respuesta = Response::responseRegistrar();
        }
        return $respuesta;
    }

    /**
     * 
     */
    public function actualizarValores(IModel $obj) {
        $tabla = $obj->getNomTabla();
        $id = $obj->getId();
        $primaryKey = $obj->getPrimaryKey();
        $columnasString = implode(' = ?, ', $this->_columnas) . ' = ?';
    
        $query = $this->connect()->prepare("UPDATE $tabla SET $columnasString WHERE $primaryKey = ?");
        $valores = array_merge($this->_valores, [$id]);
    
        if($query->execute($valores)){
            $respuesta = Response::responseActulizar();
        }
        return $respuesta;
    }

    /**
     * 
     */
    public function validarParametroConsulta($id){
        if(!empty($id)){
            $respuesta = $this->consultarValores($id);
        }
        return $respuesta;
    }
    
    /**
     * 
     */
    public function validarParametroConsultaUsuario($usuario){
        if(!empty($usuario)){
            $respuesta = $this->consultarValoresUsuario($usuario);
        }
        return $respuesta;
    }
    
    /**
     * 
     */
    public function validarParametroConsultaMascota($idUsuario){
        if(!empty($idUsuario)){
            $respuesta = $this->consultarValoresMascota($idUsuario);
        }
        return $respuesta;
    }

    /**
     * 
     */
    public function consultarValores($id){
        $obj = $this->_obtenerInstanciaModelo();
        $tabla = $obj->getNomTabla();
        $primaryKey = $obj->getPrimaryKey();
        $query = $this->connect()->prepare("SELECT * FROM $tabla WHERE $primaryKey = ?");
        $query->execute([$id]);
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $resultado = array_shift($resultado);
        header('Content-Type: application/json');
        $json = json_encode($resultado);
        return $json;
    }
    
    /**
     * 
     */
    public function consultarValoresMascota($id){
        $obj = $this->_obtenerInstanciaModelo();
        $tabla = $obj->getNomTabla();
        $primaryKey = $obj->getPrimaryKey();
        $query = $this->connect()->prepare("SELECT * FROM $tabla WHERE id_dueño = ?");
        $query->execute([$id]);
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $resultado = array_shift($resultado);
        header('Content-Type: application/json');
        $json = json_encode($resultado);
        return $json;
    }
    
    /**
     * 
     */
    public function consultarValoresUsuario($usuario){
        $obj = $this->_obtenerInstanciaModelo();
        $tabla = $obj->getNomTabla();
        $primaryKey = $obj->getPrimaryKey();
        $query = $this->connect()->prepare("SELECT * FROM $tabla WHERE nombre = ?");
        $query->execute([$usuario]);
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $resultado = array_shift($resultado);
        header('Content-Type: application/json');
        $json = json_encode($resultado);
        return $json;
    }

    /**
     * 
     */
    public function consultarValoresAll(){
        $obj = $this->_obtenerInstanciaModelo();
        $tabla = $obj->getNomTabla();
        $query = $this->connect()->prepare("SELECT * FROM $tabla");
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        $json = json_encode($resultado);
        return $json;
    }

    /**
     * 
     */
    public function validarParametroEliminar($id){
        if(!empty($id)){
            $respuesta = $this->eliminarRegistro($id);
        } else {
            $respuesta = Response::responseErrorLlave();
        }
        return $respuesta;
    }

    /**
     * 
     */
    public function eliminarRegistro($id){
        $obj = $this->_obtenerInstanciaModelo();
        $tabla = $obj->getNomTabla();
        $primaryKey = $obj->getPrimaryKey();
        $query = $this->connect()->prepare("DELETE FROM $tabla WHERE $primaryKey = ?");
        if($query->execute([$id])){
            $respuesta = Response::responseEliminar();
        }
        return $respuesta;
    }

    /**
     * 
     */
    abstract protected function _obtenerInstanciaModelo();
    
    
}

?>