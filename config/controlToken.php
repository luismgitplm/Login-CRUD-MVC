<?php
// Si no hay una sesión activa o el token CSRF no es válido, redirigir al login
if (!isset($_SESSION['idusuario']) || !isset($_SESSION['csrf_token'])) {
    header('Location: /Login-CRUD-MVC/index.php?action=login&error=Debes iniciar sesión para continuar');
    exit();
}

// Verificar el CSRF token (si es necesario) antes de permitir acceso
if (isset($_GET['csrf_token']) && $_GET['csrf_token'] !== $_SESSION['csrf_token']) {
    header('Location: /Login-CRUD-MVC/index.php?action=login&error=Debes iniciar sesión para continuar');
    exit();
}
?>