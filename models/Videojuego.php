<?php
// models/Alumno.php
class Videojuego
{
    private $conn;
    private $table_name = "videojuegos";

    public $codigo;
    public $nombre;
    public $desarrollador;
    public $genero;
    public $fechaLanzamiento;
    public $multijugador;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para leer todos los alumnos
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY codigo ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para crear un alumno
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, desarrollador=:desarrollador, genero=:genero, fechaLanzamiento=:fechaLanzamiento, multijugador=:multijugador";
        $stmt = $this->conn->prepare($query);

        // Limpiar y enlazar parámetros
        $this->nombre = $this->nombre;
        $this->desarrollador = $this->desarrollador;
        // ... validaciones si fueran necesarias

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":desarrollador", $this->desarrollador);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":fechaLanzamiento", $this->fechaLanzamiento);
        $stmt->bindParam(":multijugador", $this->multijugador, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para leer un solo alumno (para editar)
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE codigo = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->codigo);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nombre = $row['nombre'];
            $this->desarrollador = $row['desarrollador'];
            $this->genero = $row['genero'];
            $this->fechaLanzamiento = $row['fechaLanzamiento'];
            $this->multijugador = $row['multijugador'];
        }
    }

    // Método para actualizar un alumno
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, desarrollador=:desarrollador, genero=:genero, fechaLanzamiento=:fechaLanzamiento, multijugador=:multijugador WHERE codigo=:codigo";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':desarrollador', $this->desarrollador);
        $stmt->bindParam(':genero', $this->genero);
        $stmt->bindParam(':fechaLanzamiento', $this->fechaLanzamiento);
        $stmt->bindParam(':multijugador', $this->multijugador, PDO::PARAM_INT);
        $stmt->bindParam(':codigo', $this->codigo, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para eliminar un alumno
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE codigo = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->codigo, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}