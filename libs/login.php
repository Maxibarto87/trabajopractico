<?php
session_start();
if ($_POST) {
    require_once("../../app/libs/conexion.php");
    $sentencia = $conexion->prepare("SELECT * 
    FROM usuarios
    WHERE usuario_us=:usuario_us
    AND password=:password");

    $sentencia->bindValue(":usuario_us", $_POST['usuario_us']); // Corregido el nombre del parámetro
    $sentencia->bindValue(":password", $_POST['password']); // Corregido el nombre del parámetro

    $sentencia->execute();

    $usuario = $sentencia->fetch(PDO::FETCH_LAZY);
    if ($usuario) {
        $_SESSION['usuario_us'] = $usuario["usuario_us"]; // Corregido el nombre de la variable
        $_SESSION['logueado'] = true;
        header("Location: index.php");
        exit; // Añadida la función exit para detener la ejecución del script después de redirigir
    } else {
        $mensaje = "Error: el usuario o contraseña son incorrectos.";
    }
}
require_once("../templates/header.php");
?>

<!doctype html>
<html lang="en">

<head>
    <title>Usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Usuarios
                    </div>
                    <div class="card-body">
                        <?php if (isset($mensaje)) { ?>

                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    <?php echo $mensaje ?>
                                </strong>
                            </div>
                        <?php } ?>
                        <script>
                            var alertList = document.querySelectorAll('.alert');
                            alertList.forEach(function (alert) {
                                new bootstrap.Alert(alert)
                            })
                        </script>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="usuario_us" class="form-label">Usuario:</label>
                                <input type="text" class="form-control" name="usuario_us" id="usuario_us"
                                    aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar al sistema</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

<?php require_once("../templates/footer.php"); ?>