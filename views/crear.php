<!-- views/crear.php -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Login-CRUD-MVC/config/controlToken.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Alumno</title>
</head>

<body>
    <h2>Crear Nuevo Alumno</h2>
    <form method="POST" action="index.php?action=create">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Desarrollador: <input type="text" name="desarrollador" required></label><br>
        <label>Genero: <input type="text" name="genero" required></label><br>
        <label>Fecha de Lanzamiento: <input type="date" name="fechaLanzamiento" required></label><br>
        <label>Multijugador: <input type="checkbox" name="multijugador" value="1"></label><br>
        <button type="submit">Añadir videojuego</button>
    </form>
    <p><a href="index.php?action=index">Volver al listado</a></p>
</body>

</html>