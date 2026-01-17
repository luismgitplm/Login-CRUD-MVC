<!-- views/editar.php -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Login-CRUD-MVC/config/controlToken.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Videojuego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-primary-subtle">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <form method="POST"
          action="index.php?action=edit&id=<?php echo $videojuego_data->codigo; ?>"
          class="bg-white p-4 rounded shadow"
          style="min-width: 400px;">

        <h3 class="text-center mb-4">Editar Videojuego</h3>

        <input type="hidden" name="codigo"
               value="<?php echo $videojuego_data->codigo; ?>">

        <div class="form-outline mb-3">
            <label class="form-label">Nombre</label>
            <input type="text"
                   name="nombre"
                   class="form-control"
                   value="<?php echo htmlspecialchars($videojuego_data->nombre); ?>"
                   required>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label">Desarrollador</label>
            <input type="text"
                   name="desarrollador"
                   class="form-control"
                   value="<?php echo htmlspecialchars($videojuego_data->desarrollador); ?>"
                   required>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label">Género</label>
            <input type="text"
                   name="genero"
                   class="form-control"
                   value="<?php echo htmlspecialchars($videojuego_data->genero); ?>"
                   required>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label">Fecha de Lanzamiento</label>
            <input type="date"
                   name="fechaLanzamiento"
                   class="form-control"
                   value="<?php echo htmlspecialchars($videojuego_data->fechaLanzamiento); ?>"
                   required>
        </div>

        <div class="form-check mb-4">
            <label class="form-check-label" for="multijugador">
                Multijugador
            </label>
            <input class="form-check-input"
                   type="checkbox"
                   name="multijugador"
                   id="multijugador"
                   <?php echo $videojuego_data->multijugador ? 'checked' : ''; ?>>
        </div>

        <div class="d-grid gap-2">
            <button type="submit"
                    name="update"
                    class="btn btn-primary">
                Actualizar Videojuego
            </button>

            <a href="index.php?action=index"
               class="btn btn-outline-secondary">
                Volver al listado
            </a>
        </div>

    </form>
</div>

</body>
</html>
