<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../../libs/conexion.php");

    // Recolectar datos del método POST
    $ct_Nombre_categoria = isset($_POST["ct_Nombre_categoria"]) ? $_POST["ct_Nombre_categoria"] : "";
    $ct_Descripcion_categoria = isset($_POST["ct_Descripcion_categoria"]) ? $_POST["ct_Descripcion_categoria"] : "";


    // Preparar la inserción de datos
    $sentencia = $conexion->prepare("INSERT INTO categoria (ct_Nombre_categoria, ct_Descripcion_categoria) VALUES (:ct_Nombre_categoria, :ct_Descripcion_categoria)");

    $sentencia->bindParam(":ct_Nombre_categoria", $ct_Nombre_categoria);
    $sentencia->bindParam(":ct_Descripcion_categoria", $ct_Descripcion_categoria);


    $sentencia->execute();
    header("Location:index.php?mensaje='Categoria creado correctamente'");
     
}
?>

<?php require_once("../../templates/header.php")?>
    <div class="card">
        <div class="card-header">
            Datos de Categorias
        </div>
        <div class="card-body">
            <form action="" method="post" class="reservation">
                <div class="mb-3">
                  <label for="ct_Nombre_categoria" class="form-label">Nombre de Categoria</label>
                  <input type="text" class="form-control" name="ct_Nombre_categoria" id="ct_Nombre_categoria" aria-describedby="helpId" placeholder="Ingrese Nombre de Categoria">
                  <br>
                  <label for="ct_Descripcion_categoria" class="form-label">Descripcion de Categoria</label>
                  <input type="text" class="form-control" name="ct_Descripcion_categoria" id="ct_Descripcion_categoria" aria-describedby="helpId" placeholder="Ingrese Descripcion de Categoria">
                  <br>
                 <button type="submit" name="" id="" class="btn btn-primary" role="button">Enviar</button>       
                 <a name="" id="" class="btn btn-danger" href="./index.php" role="button">cancelar</a> <!-- para agregar la direccion se hace asi -->
                </div>
            </form>
        </div>
        
    </div>
    <?php require_once("../../templates/footer.php") ?> 
