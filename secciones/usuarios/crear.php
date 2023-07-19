<?php
if ($_POST) {
    print_r($_POST);
    require_once("../../libs/conexion.php");
    // Recolectar los datos del metodo POST
    $usuario_us = (isset($_POST["usuario_us"]) ? $_POST["usuario_us"] : "");
    $password = (isset($_POST["password"]) ? $_POST["password"] : "");
    $email_us = (isset($_POST["email_us"]) ? $_POST["email_us"] : "");
    // Preparar la inserción de los datos
    $sentencia = $conexion->prepare("INSERT INTO `usuarios` (`id_us`, `usuario_us`, `password`, `email_us`) 
                                                VALUES (NULL, :usuario_us, :password, :email_us);");
    // Asignamos los valores que vienen del metodo POST a la consulta
    $sentencia->bindValue(":usuario_us", $usuario_us);
    $sentencia->bindValue(":password", $password);
    $sentencia->bindValue(":email_us", $email_us);
    $sentencia->execute();
    header("Location:index.php");
}
require_once("../../templates/header.php") ?>
<div class="card">
    <div class="card-header">
        Usuarios
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="usuario_us" class="form-label">Nombre del usuario</label>
                <input type="text" class="form-control" name="usuario_us" id="usuario_us" aria-describedby="helpId"
                    placeholder="">
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="email_us" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="email_us" id="email_us" aria-describedby="emailHelpId"
                        placeholder="abc@mail.com">
                </div>
            </div>
            <button type="submit" name="" id="" class="btn btn-primary" role="button">Agregar registro</button>
            <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>
<?php require_once("../../templates/footer.php") ?>