<?php

class empleado_funciones {

    public function __construct() {    
    }

    // function consultar($conexion, $dato) {
    //     $id_ = (int)$dato;
    //     $comandoSql  = ($id === null) ? "SELECT * FROM usuarios": "SELECT * FROM usuarios WHERE id = $id_";
    //     $resultado = $conexion->consulta_($comandoSql);
    //     if($resultado) {
    //         $dato = array();
    //         while($f = $resultado->fetch_assoc()) {
    //             $dato[] = $f;
    //         }
    //         echo json_encode($dato);
    //     }
    // }

    function consultarr($conexion, $dato) {
        $id_ = (int)$dato['id'];
        $comandoSql = ($id_ === null) ? "SELECT * FROM empleados" : "SELECT * FROM empleados WHERE id = :id";
        $resultado = $conexion->consulta_($comandoSql);
        if($resultado) {
            $dato = array();
            while($f = $resultado->fetch_assoc()) {
                $dato[] = $f;
            }
            echo json_encode($dato);
        }
    }
    function consultar($conexion, $dato) {
        $id_ =  $dato;
        $idd = (int)$id_;
        $comandoSql = ($idd === 0) ? "SELECT * FROM empleados" : "SELECT * FROM empleados WHERE id = " . $idd;
        // var_dump($comandoSql);
        $resultado = $conexion->consulta_($comandoSql);
    
        if ($resultado !== null) {
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
            if ($datos !== false) {
                echo json_encode($datos);
            } else {
                echo "No se obtuvieron resultados.";
            }
        } else {
            echo "No se obtuvieron resultados o \$resultado es nulo.";
        }
    }
    
    
    

    function insertar($conexion, $dato) {

        // var_dump($dato);
        $id = null;
        $cedula = $dato['cedula'];
        $nombre = $dato['nombre'];
        $apellido = $dato['apellido'];
        $id = (int)$id; // Asegura que $id sea un entero
        $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
        $apellido = htmlspecialchars($apellido, ENT_QUOTES, 'UTF-8');
        $comandoSql = 'INSERT INTO "empleados" ( "cedula", "nombre", "apellido") VALUES (?, ?, ?)';
        $resultado = $conexion->insertar_($comandoSql, $cedula, $nombre, $apellido);
        echo $resultado;
    }
}