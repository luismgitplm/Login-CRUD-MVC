<!-- views/listar.php -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Login-CRUD-MVC/config/controlToken.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Videojuegos (MVC)</title>
    <style>                            
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .message {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Listado de Videojuegos</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="message">
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

    <p><a href="index.php?action=create">Añadir Nuevo Videojuego</a></p>

    <table>
        <thead>
            <tr>
                <th>Código Videojuego</th>
                <th>Nombre</th>
                <th>Desarrollador</th>
                <th>Genero</th>
                <th>Fecha de Lanzamiento</th>
                <th>Multijugador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videojuegos as $Videojuego): ?><!-- Videojuego es una colección de filas de la tabla -->
                <tr>
                    <td><?php echo $Videojuego['codigo']; ?></td>
                    <td><?php echo htmlspecialchars($Videojuego['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($Videojuego['desarrollador']); ?></td>
                    <td><?php echo htmlspecialchars($Videojuego['genero']); ?></td>
                    <td><?php echo htmlspecialchars($Videojuego['fechaLanzamiento']); ?></td>
                    <td><?php echo $Videojuego['multijugador'] ? 'Sí' : 'No'; ?></td>
                    <td>
                        <!-- en la última celda incluimos los botones para ir a borrar o editar una fila -->
                        <a href="index.php?action=edit&id=<?php echo $Videojuego['codigo']; ?>">Editar</a> |
                        <a href="index.php?action=delete&id=<?php echo $Videojuego['codigo']; ?>" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>