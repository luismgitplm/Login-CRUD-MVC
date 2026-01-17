<?php
require_once 'config/establecer-sesion.php';
require_once 'controllers/VideojuegoController.php'; // incluimos la declaración de la Clase VideojuegoController
require_once 'controllers/AuthController.php';  // el controlador de autentificación y
require_once 'models/User.php';                 // el modelo de usuarios son cargados al empezar
																								// ambos son declaraciones de clases -> orientación a objetos pura


$controller = new AuthController();  // se crea una instancia de controlador de usuario (que incluye conexión, tabla, y operatoria con usuarios)
$vgController = new VideojuegoController();

																							 // Simple enrutamiento basado en la URL. Se concentra aquí todo el redireccionamiento
if (!isset($_REQUEST['action'])) {             // la primera vez, entramos para hacer login y no hay en la URL action definida
    $controller->login();
} else {
    switch ($_REQUEST['action']) {             // más adelante, podemos venir desde el interior con una action particular en la url
        case 'login':
            $controller->login();              // si la action fuera login
            break;
        case 'authenticate':
            $controller->authenticate();      // si hay que autenticar
            break;
        case 'logout':
            $controller->logout();            // si cerramos la sesión
            break;
        case 'index':
            $vgController->index();         // si vamos a la página interna de inicio de la aplicación
            break;
        case 'create':
            $vgController->create();         // se invoca al método create() de VideojuegoController
            break;
        case 'edit':
            $vgController->edit();           // se invoca al método edit() de VideojuegoController
            break;
        case 'delete':
            $vgController->delete();         // se invoca al método delete() de VideojuegoController
            break;
        default:
            $controller->login();
            break;
    }
}