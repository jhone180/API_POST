<?php

class CitasMedicas implements IModel{
    public $id;

    public $ubicacion;

    public $hora;

    public $fecha;

    public $id_doctor;

    protected $_nomTabla = "citas_medicas";

    protected $_primaryKey = "id";

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion){
        $this->ubicacion = $ubicacion;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getIdDoctor(){
        return $this->id_doctor;
    }

    public function setIdDoctor($idDoctor){
        $this->id_doctor = $idDoctor;
    }

    public function getModel(){
        return new CitasMedicas();
    }

    public function getNomTabla() {
        return $this->_nomTabla;
    }

    public function getPrimaryKey(){
        return $this->_primaryKey;
    }

}

?>