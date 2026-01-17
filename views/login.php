<?php
// views/login.php 
if (isset($_SESSION['usuario_logueado'])) {  // si el usuario estuviera ya logeado, lo derivamos al inicio interno
    header("Location: ./dashboard.php");    // nosotros haremos comprobación de token
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Formulario de registro</title>
</head>
<body class="bg-primary-subtle">
    <div id="wrapper" class="container d-flex justify-content-center align-items-center text-center  min-vh-100">
    <form action="/Login-CRUD-MVC/index.php?action=authenticate" method="post" id="formulario">
        <div>
            <h3>Inicie Sesión</h3>
        </div>

        <!-- Aquí se mostrarán los errores desde dentro de la aplicación-->
         <?php
            if (isset($_GET['error'])){
                echo '<div class = "alert alert-danger">';
                echo $_GET['error'];
                echo '</div>';
                unset($_GET['error']);
            }
         ?>

        <div class="row mb-4">
            <div class="col">
            <div data-mdb-input-init class="form-outline">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"><!-- token enviado oculto -->
                <input type="text" id="idusuario" name="idusuario" class="form-control" />
                <label class="form-label" for="idusuario">Nombre</label>
                <div id = "idusuarioCorreccion" class = "form-text text-danger"></div>
            </div>
            </div>
            <div class="col">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="apellidos" name="apellidos" class="form-control" />
                <label class="form-label" for="apellidos">Apellidos</label>
            </div>
            </div>
        </div>

        
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control" />
            <label class="form-label" for="email">Email</label>
        </div>

        
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control" />
            <label class="form-label" for="password">Contraseña</label>
            <div id = "passwordCorreccion" class = "form-text text-danger"></div>
        </div>

       
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>
        <div id = "envioCorreccion" class = "form-text text-danger"></div>

    </form>
    </div>

    <script src="/Login-CRUD-MVC/public/validacion.js"></script>
</body>
</html>