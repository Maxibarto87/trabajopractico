<?php
require_once("../../libs/conexion.php");

if (isset($_GET["txtID"])) {
    $txtID = $_GET["txtID"];
    $sentencia = $conexion->prepare("SELECT * FROM `proveedor` WHERE `id_pr` = :id_pr");
    $sentencia->bindParam(":id_pr", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
    if (!$registro) {
        echo "No se encontró el registro con el ID: $txtID";
        exit();
    }
    $pr_Nombre_de_fantasia = $registro['pr_Nombre_de_fantasia'];
    $pr_Nombre = $registro['pr_Nombre'];
    $pr_Apellido = $registro['pr_Apellido'];
    $pr_Email = $registro['pr_Email'];
    $pr_Direccion = $registro['pr_Direccion'];
    $pr_CUIT = $registro['pr_CUIT'];
    $pr_Telefono = $registro['pr_Telefono'];

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $pr_Nombre_de_fantasia = $_POST['pr_Nombre_de_fantasia'];
    $pr_Nombre = $_POST['pr_Nombre'];
    $pr_Apellido = $_POST['pr_Apellido'];
    $pr_Email = $_POST['pr_Email'];
    $pr_Direccion = $_POST['pr_Direccion'];
    $pr_CUIT = $_POST['pr_CUIT'];
    $pr_Telefono = $_POST['pr_Telefono'];
    

    $sentencia = $conexion->prepare("UPDATE `proveedor` SET `pr_Nombre_de_fantasia` = :pr_Nombre_de_fantasia, `pr_Nombre` = :pr_Nombre, `pr_Apellido` = :pr_Apellido, `pr_Email` = :pr_Email, `pr_Direccion` = :pr_Direccion, `pr_CUIT` = :pr_CUIT, `pr_Telefono` = :pr_Telefono WHERE `id_pr` = :id_pr");
    $sentencia->bindParam(":id_pr", $txtID);
    $sentencia->bindParam(":pr_Nombre_de_fantasia", $pr_Nombre_de_fantasia);
    $sentencia->bindParam(":pr_Nombre", $pr_Nombre);
    $sentencia->bindParam(":pr_Apellido", $pr_Apellido);
    $sentencia->bindParam(":pr_Email", $pr_Email);
    $sentencia->bindParam(":pr_Direccion", $pr_Direccion);
    $sentencia->bindParam(":pr_CUIT", $pr_CUIT);
    $sentencia->bindParam(":pr_Telefono", $pr_Telefono);
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
            Editar Proveedores
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="pr_Nombre_de_fantasia" class="form-label">Nombre de Fantasia</label>
                  <input type="text" class="form-control" name="pr_Nombre_de_fantasia" id="pr_Nombre_de_fantasia" aria-describedby="helpId" placeholder="Ingrese su Nombre de Fantasia">  
                        <br>
                  <label for="pr_Nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="pr_Nombre" id="pr_Nombre" aria-describedby="helpId" placeholder="Ingrese su Nombre">
                        <br>
                  <label for="pr_Apellido" class="form-label">Apellido</label>
                  <input type="text" class="form-control" name="pr_Apellido" id="pr_Apellido" aria-describedby="helpId" placeholder="Ingrese su Apellido">
                        <br>
                  <label for="pr_Email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="pr_Email" id="pr_Email" aria-describedby="emailhelpId" placeholder="Ingrese su Email">
                        <br>
                  <label for="pr_Direccion" class="form-label">Dirección</label>
                  <input type="text" class="form-control" name="pr_Direccion" id="pr_Direccion" aria-describedby="helpId" placeholder="Ingrese su Dirección">
                        <br>
                  <label for="pr_CUIT" class="form-label">CUIT</label>
                  <input type="number" class="form-control" name="pr_CUIT" id="pr_CUIT" aria-describedby="helpId" placeholder="Ingrese Nombre de Categoria">
                        <br>
                  <label for="pr_Telefono" class="form-label">Teléfono</label>
                  <input type="number" class="form-control" name="pr_Telefono" id="pr_Telefono" aria-describedby="helpId" placeholder="Ingrese Descripcion de Categoria">
                        <br>
                 <button type="submit" name="" id="" class="btn btn-primary" role="button">Editar</button>       
                 <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a> <!-- para agregar la direccion se hace asi -->
                </div>
            </form>
        </div>
        
    </div>
<?php require_once("../../templates/footer.php") ?>