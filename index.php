<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once "./controlador/conexion.php";
require_once "./vista/empleado_funciones.php";
$conn = new conexion;
$empleados = new empleado_funciones;

$metodo = $_SERVER['REQUEST_METHOD'];
switch($metodo) {
    case 'GET':
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        $empleados->consultar($conn, $id);
        break;
    case 'POST':
        $empleados->insertar($conn, json_decode(file_get_contents('php://input'), true) );
        break;
    default: 
    echo "Método no permitido";
    break;
}




?>