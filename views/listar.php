<!-- views/listar.php -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Login-CRUD-MVC/config/controlToken.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Videojuegos (MVC)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <?php if (isset($_GET['message'])): ?>
        <div class="text-center alert alert-success">
            <?php
            // aquí se mostrarían los diferentes mensajes de confirmación tras la realización
            // de cualquiera de las 3 operaciones restantes: crear, modificar, eliminar
            // ya que volveremos a esta vista
            if ($_GET['message'] == 'created') echo 'Videojuego añadido correctamente.';
            if ($_GET['message'] == 'updated') echo 'Videojuego actualizado correctamente.';
            if ($_GET['message'] == 'deleted') echo 'Videojuego eliminado correctamente.';
            ?>
        </div>
    <?php endif; ?>

  <div class="container mt-4">
    <h1 class="text-center">Listado de Videojuegos</h1>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-primary text-center">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Desarrollador</th>
                <th>Género</th>
                <th>Fecha de Lanzamiento</th>
                <th>Multijugador</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($videojuegos as $Videojuego): ?>
                <tr>
                    <td class="text-center">
                        <?php echo $Videojuego['codigo']; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($Videojuego['nombre']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($Videojuego['desarrollador']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($Videojuego['genero']); ?>
                    </td>

                    <td class="text-center">
                        <?php echo htmlspecialchars($Videojuego['fechaLanzamiento']); ?>
                    </td>

                    <td class="text-center">
                        <span class="badge bg-<?php echo $Videojuego['multijugador'] ? 'primary' : 'secondary'; ?>">
                            <?php echo $Videojuego['multijugador'] ? 'Sí' : 'No'; ?>
                        </span>
                    </td>

                    <td class="text-center">
                        <a href="index.php?action=edit&id=<?php echo $Videojuego['codigo']; ?>"
                           class="btn btn-sm btn-outline-warning">
                            Editar
                        </a>
                        <a href="index.php?action=delete&id=<?php echo $Videojuego['codigo']; ?>"
                           class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('¿Estás seguro?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?action=create"
        class="btn btn-sm btn-outline-primary">
        Añadir nuevo videojuego
    </a>

</div>

    <a href="index.php?action=logout">Cerrar sesión (Volver al login)</a>
</body>

</html>