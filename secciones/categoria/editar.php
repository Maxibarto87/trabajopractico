<?php
require_once("../../libs/conexion.php");

if (isset($_GET["txtID"])) {
    $txtID = $_GET["txtID"];
    $sentencia = $conexion->prepare("SELECT * FROM `categoria` WHERE `id_ct` = :id_ct");
    $sentencia->bindParam(":id_ct", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
    if (!$registro) {
        echo "No se encontró el registro con el ID: $txtID";
        exit();
    }
    $ct_Nombre_categoria = $registro['ct_Nombre_categoria'];
    $ct_Descripcion_categoria = $registro['ct_Descripcion_categoria'];
  

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $ct_Nombre_categoria = $_POST['ct_Nombre_categoria'];
    $ct_Descripcion_categoria = $_POST['ct_Descripcion_categoria'];
   
    

    $sentencia = $conexion->prepare("UPDATE `categoria` SET `ct_Nombre_categoria` = :ct_Nombre_categoria, `ct_Descripcion_categoria` WHERE `id_ct` = :id_ct");
    $sentencia->bindParam(":id_ct", $txtID);
    $sentencia->bindParam(":ct_Nombre_categoria", $ct_Nombre_categoria);
    $sentencia->bindParam(":ct_Descripcion_categoria", $ct_Descripcion_categoria);
  
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
            Editar Categoria
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="ct_Nombre_categoria" class="form-label">Editar nombre de categoria</label>
                  <input type="text" class="form-control" name="ct_Nombre_categoria" id="ct_Nombre_categoria" aria-describedby="helpId" placeholder="Ingrese su nombre de categoria">  
                        <br>
                  <label for="ct_Descripcion_categoria" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="ct_Descripcion_categoria" id="ct_Descripcion_categoria" aria-describedby="helpId" placeholder="Ingrese su descripcion de categoria">
                        <br>
                <button type="submit" name="" id="" class="btn btn-primary" role="button">Editar</button>       
                 <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a> <!-- para agregar la direccion se hace asi -->
                </div>
            </form>
        </div>
        
    </div>
<?php require_once("../../templates/footer.php") ?>