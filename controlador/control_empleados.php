<?php

class control_empleados {
    function __construct($objEmpleado)
	{
		$this->objEmpleado=$objEmpleado;
	}
    function guardar() {
        $cedula=$this->objEmpleado->getCedEmpleado();
        $nombre=$this->objEmpleado->getNombreEmpleado();
        $apellido=$this->objEmpleado->getApellidoEmpleado();
        $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
        $apellido = htmlspecialchars($apellido, ENT_QUOTES, 'UTF-8');
        $conn = new conexion;
        $comandoSql = 'INSERT INTO "empleados" ( "cedula", "nombre", "apellido") VALUES (?, ?, ?)';
        $resultado = $conexion->insertar_($comandoSql, $cedula, $nombre, $apellido);
        echo $resultado;
    }
    


}
  