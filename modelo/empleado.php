<?php
	
	class empleados {
     public $ced;
     public $nombre;
     public $apellido;

     function __construct($ced,$nombre,$apellido) {
        $this->ced=$ced;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
     }

     function setCedulaEMPLEADO($ced){
        $this->ced=$ced;
    }
    function getCedEmpleado() {
        return $this->ced;
        
    }
    function setNombreEMPLEADO($nombre){
        $this->nombre=$nombre;
    }
    function getNombreEmpleado() {
        return $this->nombre;
        
    }
    function setApellidoEMPLEADO($apellido){
        $this->apellido=$apellido;
    }
    function getApellidoEmpleado() {
        return $this->apellido;
        
    }
    }