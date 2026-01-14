<?php
// controllers/videojuegoController.php
include_once 'config/Database.php';
include_once 'models/videojuego.php';

class videojuegoController
{
    private $db;
    private $videojuego;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->videojuego = new Videojuego($this->db);
    }

    public function index()
    {
        $stmt = $this->videojuego->read();
        $videojuegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/listar.php';
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->videojuego->nombre = $_POST['nombre'];
            $this->videojuego->desarrollador = $_POST['desarrollador'];
            $this->videojuego->genero = $_POST['genero'];
            $this->videojuego->fechaLanzamiento = $_POST['fechaLanzamiento'];
            $this->videojuego->multijugador = isset($_POST['multijugador']) ? 1 : 0;

            if ($this->videojuego->create()) {
                header("Location: index.php?action=index&message=created");
                exit();
            } else {
                $error = "Error al crear videojuego.";
                include 'views/crear.php'; // Recargar vista con error
            }
        } else {
            include 'views/crear.php';
        }
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lógica de actualización (UPDATE)
            $this->videojuego->codigo = $_POST['codigo'];
            $this->videojuego->nombre = $_POST['nombre'];
            $this->videojuego->desarrollador = $_POST['desarrollador'];
            $this->videojuego->genero = $_POST['genero'];
            $this->videojuego->fechaLanzamiento = $_POST['fechaLanzamiento'];
            $this->videojuego->multijugador = isset($_POST['multijugador']) ? 1 : 0;

            if ($this->videojuego->update()) {
                header("Location: index.php?action=index&message=updated");
                exit();
            } else {
                $error = "Error al actualizar.";
            }
        }

        // Lógica para mostrar el formulario de edición (READ ONE)
        if (isset($_GET['id'])) {
            $this->videojuego->codigo = $_GET['id'];
            $this->videojuego->readOne();
            if ($this->videojuego->nombre) {
                $videojuego_data = (object)['codigo' => $this->videojuego->codigo, 'nombre' => $this->videojuego->nombre, 'desarrollador' => $this->videojuego->desarrollador, 'genero' => $this->videojuego->genero, 'fechaLanzamiento' => $this->videojuego->fechaLanzamiento, 'multijugador' => $this->videojuego->multijugador];
                include 'views/editar.php';
            } else {
                echo "videojuego no encontrado.";
            }
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->videojuego->codigo = $_GET['id'];
            if ($this->videojuego->delete()) {
                header("Location: index.php?action=index&message=deleted");
                exit();
            } else {
                header("Location: index.php?action=index&message=error_delete");
                exit();
            }
        }
    }
}