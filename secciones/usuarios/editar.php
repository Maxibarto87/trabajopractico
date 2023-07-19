<?php
require_once("../../libs/conexion.php");
if (isset($_GET["txtID"])) {
    // Recolectar los datos del metodo GET
    $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");
    // Preparar la eliminación de los datos
    $sentencia = $conexion->prepare("SELECT * FROM `usuarios` WHERE id_us=:id_us");
    $sentencia->bindValue(":id_us", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $usuario_us = $registro['usuario_us'];
    $password = $registro['password'];
    $email = $registro['email'];
}
if ($_POST) {
    print_r($_POST);
    // Recolectar los datos del metodo POST
    $txtID = (isset($_POST["txtID"]) ? $_POST["txtID"] : "");
    $usuario_us = (isset($_POST["usuario_us"]) ? $_POST["usuario_us"] : "");
    $password = (isset($_POST["password"]) ? $_POST["password"] : "");
    $email_us = (isset($_POST["email_us"]) ? $_POST["email_us"] : "");
    // Preparar la inserción de los datos
    $sentencia = $conexion->prepare("UPDATE `usuarios` 
                                    SET `usuario_us`=:usuario_us,`password`=:password,`email_us`=:email_us 
                                    WHERE id_us=:id_us");
    // Asignamos los valores que vienen del metodo POST a la consulta
    $sentencia->bindValue(":usuario_us", $usuario_us);
    $sentencia->bindValue(":password", $password);
    $sentencia->bindValue(":email_us", $email_us);
    $sentencia->bindValue(":id_us", $txtID);
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
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" class="form-control" name="txtID" id="txtID" aria-describedby="helpId"
                    value="<?php echo $txtID; ?>" placeholder="" readonly>
                <label for="usuario_us" class="form-label">Nombre del usuario</label>
                <input type="text" class="form-control" name="usuario_us" id="usuario_us" aria-describedby="helpId"
                    value="<?php echo $usuario_us ?>">
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password"
                        value="<?php echo $password ?>">
                </div>
                <div class="mb-3">
                    <label for="email_us" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="email_us" id="email_us" aria-describedby="emailHelpId"
                        value="<?php echo $email ?>">
                </div>
            </div>
            <button type="submit" name="" id="" class="btn btn-primary" role="button">Editar registro</button>
            <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>
<?php require_once("../../templates/footer.php") ?>