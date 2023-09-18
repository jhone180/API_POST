<?php

class Persona  implements IModel{
    public $id;

    public $cedula;

    public $nombre;

    public $telefono;

    public $id_perfil;

    protected $_nomTabla = "persona";

    protected $_primaryKey = "id";

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCedula(){
        return $this->cedula;
    }

    public function setCedula($cedula){
        $this->cedula = $cedula;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getIdPerfil(){
        return $this->id_perfil;
    }

    public function setIdPerfil($idPerfil){
        $this->id_perfil = $idPerfil;
    }

    public function getModel(){
        return new Persona();
    }

    public function getNomTabla() {
        return $this->_nomTabla;
    }

    public function getPrimaryKey(){
        return $this->_primaryKey;
    }

}

?>