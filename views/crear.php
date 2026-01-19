<!-- views/crear.php -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Login-CRUD-MVC/config/controlToken.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crear Videojuego</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-primary-subtle">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <form method="POST"
          action="index.php?action=create"
          id="form"
          class="bg-white p-4 rounded shadow"
          style="min-width: 400px;">

        <h3 class="text-center mb-4">Crear Nuevo Videojuego</h3>

        <!--Los campos de texto tienen un div en el que se mostrará un mensaje de corrección si es necesario-->
        <div class="form-outline mb-3">
            <label class="form-label">Nombre</label>
            <input type="text"
                   name="nombre"
                   id="nombre"
                   class="form-control"
                   required>
            <div id = "nombreCorreccion" class = "form-text text-danger"></div>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label">Desarrollador</label>
            <input type="text"
                   name="desarrollador"
                   id="desarrollador"
                   class="form-control"
                   required>
            <div id = "desarrolladorCorreccion" class = "form-text text-danger"></div>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label">Género</label>
            <input type="text"
                   name="genero"
                   id="genero"
                   class="form-control"
                   required>
            <div id = "generoCorreccion" class = "form-text text-danger"></div>
        </div>

        <div class="form-outline mb-3">
            <label class="form-label">Fecha de Lanzamiento</label>
            <input type="date"
                   name="fechaLanzamiento"
                   class="form-control"
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
                   value="1">
        </div>

        <div class="d-grid gap-2">
            <button type="submit"
                    id="crear"
                    class="btn btn-primary">
                Añadir Videojuego
            </button>

            <a href="index.php?action=index"
               class="btn btn-outline-secondary">
                Volver al listado
            </a>
        </div>

        <div id="correccionEnvio" class = "form-text text-danger"></div>

    </form>
</div>

<script type="module" src="/Login-CRUD-MVC/public/validacionCrearEditar.js"></script>
</body>
</html>
