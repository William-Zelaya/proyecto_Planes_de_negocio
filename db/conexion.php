<?php
date_default_timezone_set('America/El_Salvador');

class Database {
    private $host = 'localhost'; // Cambia esto si es necesario
    private $db_name = 'deco'; // Cambia esto por el nombre de tu base de datos
    private $username = 'root'; // Cambia esto por tu usuario de MySQL
    private $password = ''; // Cambia esto por tu contraseña de MySQL
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>