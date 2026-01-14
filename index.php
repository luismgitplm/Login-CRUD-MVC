<?php
// index.php (controlador de rutas)

require_once 'controllers/VideojuegoController.php'; // incluimos la declaración de la Clase VideojuegoController

$controller = new VideojuegoController();            // creamos una instancia del controlador de alumno

// Determina qué acción se solicita, si no hubiera ninguna, por defecto adoptamos index
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Llama al método correspondiente del controlador
switch ($action) {
    case 'index':
        $controller->index();          // se invoca al método index() de VideojuegoController
        break;
    case 'create':
        $controller->create();         // se invoca al método create() de VideojuegoController
        break;
    case 'edit':
        $controller->edit();           // se invoca al método edit() de VideojuegoController
        break;
    case 'delete':
        $controller->delete();         // se invoca al método delete() de VideojuegoController
        break;
    default:
        $controller->index();          // por defecto, se invoca a index()
        break;
}