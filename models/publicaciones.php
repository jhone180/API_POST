<?php

class Publicaciones implements IModel{
    public $id;

    public $fecha;

    public $titulo;

    public $privacidad;

    public $id_usuario;

    protected $_nomTabla = "publicaciones";

    protected $_primaryKey = "id";

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getPrivacidad(){
        return $this->privacidad;
    }

    public function setPrivacidad($privacidad){
        $this->privacidad = $privacidad;
    }

    public function getIdUsuario(){
        return $this->id_usuario;
    }

    public function setIdUsuario($idUsuario){
        $this->id_usuario = $idUsuario;
    }

    public function getModel(){
        return new Publicaciones();
    }

    public function getNomTabla() {
        return $this->_nomTabla;
    }

    public function getPrimaryKey(){
        return $this->_primaryKey;
    }

}

?>