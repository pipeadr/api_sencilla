<?php
class conexion {
    private $server;
    private $user;
    private $pass;
    private $database;
    private $conexion;
    private $conn;


    public function __construct() {
        $listadatos = $this->datosConexion();
        foreach($listadatos as $key => $value) {
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->pass = $value['DB_PASSWORD'];
            $this->database = $value['database'];
            $dsn = "pgsql:host=$this->server;dbname=postgres;user=$this->user;password=$this->pass";
            // $dsn = "pgsql:host=localhost;dbname=postgres;user=root;password=1234";
            try {
                $this->conn = new PDO($dsn);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
                exit();
            }
        }
        
    
  
    }

      private function datosConexion() {
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents( $direccion. "/". "config");
        return json_decode($jsondata, true);
      }
    


      public function consulta_w($comandoSql) {
        $resultado = $this->conn->query($comandoSql);
        // $this->conn->close();
        return $resultado;
    }
    public function consulta_($comandoSql) {
        $stmt = $this->conn->prepare($comandoSql);
    
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conn->errorInfo()[2]);
        }
    
        if ($stmt->execute()) {
            return $stmt;  // Devuelve el objeto PDOStatement directamente
        } else {
            die("Error en la ejecución de la consulta: " . $stmt->errorInfo()[2]);
        }
    }
    
    
    

      public function insertar_($comandoSql, $cedula, $nombre, $apellido) {
        $stmt = $this->conn->prepare($comandoSql);
        
        if ($stmt) {
            // $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->bindParam(1, $cedula, PDO::PARAM_STR);
            $stmt->bindParam(2, $nombre, PDO::PARAM_STR);
            $stmt->bindParam(3, $apellido, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                return "Registro exitoso";
            } else {
                return "Error al insertar el registro: " . $stmt->errorInfo()[2];
            }
        } else {
            return "Error en la preparación del statement: " . $this->conn->error;
        }
    }
    

}
?>