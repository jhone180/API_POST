<?php

class Doctores implements IModel{
    public $id;

    public $nombre;

    public $telefono;

    public $especialidad;

    public $id_veterinaria;

    protected $_nomTabla = "doctores";

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

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getEspecialidad(){
        return $this->especialidad;
    }

    public function setEspecialidad($especialidad){
        $this->especialidad = $especialidad;
    }

    public function getIdVeterinaria(){
        return $this->id_veterinaria;
    }

    public function setIdVeterinaria($idVeterinaria){
        $this->id_veterinaria = $idVeterinaria;
    }

    public function getModel(){
        return new Doctores();
    }

    public function getNomTabla() {
        return $this->_nomTabla;
    }

    public function getPrimaryKey(){
        return $this->_primaryKey;
    }

}

?>