<?php

class Mascotas  implements IModel{
    public $id;

    public $nombre;

    public $raza;

    public $peso;

    public $id_dueño;

    protected $_nomTabla = "mascotas";

    protected $_primaryKey = "id";

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getRaza(){
        return $this->raza;
    }

    public function setRaza($raza){
        $this->raza = $raza;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function getIdDueño(){
        return $this->id_dueño;
    }

    public function setIdDueño($idDueño){
        $this->id_dueño = $idDueño;
    }

    public function getModel(){
        return new Mascotas();
    }

    public function getNomTabla() {
        return $this->_nomTabla;
    }

    public function getPrimaryKey(){
        return $this->_primaryKey;
    }

}

?>