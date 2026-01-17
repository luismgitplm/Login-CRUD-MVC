<!-- views/editar.php -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Login-CRUD-MVC/config/controlToken.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
</head>

<body>
    <h2>Editar Alumno</h2>
    <!-- Usamos $videojuego_data que viene del controlador -->
    <form method="POST" action="index.php?action=edit&id=<?php echo $videojuego_data->codigo; ?>">
        <input type="hidden" name="codigo" value="<?php echo $videojuego_data->codigo; ?>">
        <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($videojuego_data->nombre); ?>" required></label><br>
        <label>Desarrollador: <input type="text" name="desarrollador" value="<?php echo htmlspecialchars($videojuego_data->desarrollador); ?>" required></label><br>
        <label>Genero: <input type="text" name="genero" value="<?php echo htmlspecialchars($videojuego_data->genero); ?>" required></label><br>
        <label>Fecha de Lanzamiento: <input type="date" name="fechaLanzamiento" value="<?php echo htmlspecialchars($videojuego_data->fechaLanzamiento); ?>" required></label><br>
        <label>Multijugador: <input type="checkbox" name="multijugador" <?php echo $videojuego_data->multijugador ? 'checked' : ''; ?>></label><br>
        <button type="submit" name="update">Actualizar Videojuego</button>
    </form>
    <p><a href="index.php?action=index">Volver al listado</a></p>
</body>

</html>