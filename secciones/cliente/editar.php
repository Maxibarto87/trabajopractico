<?php
require_once("../../libs/conexion.php");

if (isset($_GET["txtID"])) {
    $txtID = $_GET["txtID"];
    $sentencia = $conexion->prepare("SELECT * FROM `cliente` WHERE `id_cl` = :id_cl");
    $sentencia->bindParam(":id_cl", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
    if (!$registro) {
        echo "No se encontró el registro con el ID: $txtID";
        exit();
    }
    $cl_Nombre = $registro['cl_Nombre'];
    $cl_Apellido = $registro['cl_Apellido'];
    $cl_Email = $registro['cl_Email'];
    $cl_Direccion = $registro['cl_Direccion'];
    $cl_CUIT = $registro['cl_CUIT'];
    $cl_Telefono = $registro['cl_Telefono'];

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $cl_Nombre = $_POST['cl_Nombre'];
    $cl_Apellido = $_POST['cl_Apellido'];
    $cl_Email = $_POST['cl_Email'];
    $cl_Direccion = $_POST['cl_Direccion'];
    $cl_CUIT = $_POST['cl_CUIT'];
    $cl_Telefono = $_POST['cl_Telefono'];
    

    $sentencia = $conexion->prepare("UPDATE `cliente` SET `cl_Nombre` = :cl_Nombre, `cl_Apellido` = :cl_Apellido, `cl_Email` = :cl_Email, `cl_Direccion` = :cl_Direccion, `cl_CUIT` = :cl_CUIT, `cl_Telefono` = :cl_Telefono WHERE `id_cl` = :id_cl");
    $sentencia->bindParam(":id_cl", $txtID);
    $sentencia->bindParam(":cl_Nombre", $cl_Nombre);
    $sentencia->bindParam(":cl_Apellido", $cl_Apellido);
    $sentencia->bindParam(":cl_Email", $cl_Email);
    $sentencia->bindParam(":cl_Direccion", $cl_Direccion);
    $sentencia->bindParam(":cl_CUIT", $cl_CUIT);
    $sentencia->bindParam(":cl_Telefono", $cl_Telefono);
    if ($sentencia->execute()) {
        echo "";
    } else {
        echo "Error al actualizar el registro";
    }
}

require_once("../../templates/header.php");
?>

<div class="card">
        <div class="card-header">
            Editar Cliente
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="cl_Nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="cl_Nombre" id="cl_Nombre" aria-describedby="helpId" placeholder="Ingrese su Nombre">
                        <br>
                  <label for="cl_Apellido" class="form-label">Apellido</label>
                  <input type="text" class="form-control" name="cl_Apellido" id="cl_Apellido" aria-describedby="helpId" placeholder="Ingrese su Apellido">
                        <br>
                  <label for="cl_Email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="cl_Email" id="cl_Email" aria-describedby="emailhelpId" placeholder="Ingrese su Email">
                        <br>
                  <label for="cl_Direccion" class="form-label">Dirección</label>
                  <input type="text" class="form-control" name="cl_Direccion" id="cl_Direccion" aria-describedby="helpId" placeholder="Ingrese su Dirección">
                        <br>
                  <label for="cl_CUIT" class="form-label">CUIT</label>
                  <input type="number" class="form-control" name="cl_CUIT" id="cl_CUIT" aria-describedby="helpId" placeholder="Ingrese Nombre de Categoria">
                        <br>
                  <label for="cl_Telefono" class="form-label">Teléfono</label>
                  <input type="number" class="form-control" name="cl_Telefono" id="cl_Telefono" aria-describedby="helpId" placeholder="Ingrese Descripcion de Categoria">
                        <br>
                 <button type="submit" name="" id="" class="btn btn-primary" role="button">Editar</button>       
                 <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a> <!-- para agregar la direccion se hace asi -->
                </div>
            </form>
        </div>
        
    </div>
<?php require_once("../../templates/footer.php") ?>