<?php

class Perfil implements IModel{
    public $id;

    public $nombre_usuario;

    public $telefono;

    public $nombre_mascota;

    public $descripcion;

    protected $_nomTabla = "perfil";

    protected $_primaryKey = "id";

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombreUsuario(){
        return $this->nombre_usuario;
    }

    public function setNombreUsuario($nombreUsuario){
        $this->nombre_usuario = $nombreUsuario;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getNombreMascota(){
        return $this->nombre_mascota;
    }

    public function setNombreMascota($nombreMascota){
        $this->nombre_mascota = $nombreMascota;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getModel(){
        return new perfil();
    }

    public function getNomTabla() {
        return $this->_nomTabla;
    }

    public function getPrimaryKey(){
        return $this->_primaryKey;
    }

}

?>