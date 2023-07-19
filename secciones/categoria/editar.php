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

    $sentencia = $conexion->prepare("UPDATE `categoria` SET `ct_Nombre_categoria` = :ct_Nombre_categoria, `ct_Descripcion_categoria` = :ct_Descripcion_categoria WHERE `id_ct` = :id_ct");
    $sentencia->bindParam(":id_ct", $txtID);
    $sentencia->bindParam(":ct_Nombre_categoria", $ct_Nombre_categoria);
    $sentencia->bindParam(":ct_Descripcion_categoria", $ct_Descripcion_categoria);
    $sentencia->execute(); 

    $mensaje = 'Categoria editada correctamente';
    header("Location: index.php?mensaje=" . urlencode($mensaje));
    exit;
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
            <label for="txtID" class="form-label">ID:</label>
                <input type="text" class="form-control" name="txtID" id="txtID" aria-describedby="helpId">
                <label for="ct_Nombre_categoria" class="form-label">Editar nombre de categoria</label>
                <input type="text" class="form-control" name="ct_Nombre_categoria" id="ct_Nombre_categoria" aria-describedby="helpId" placeholder="Ingrese su nombre de categoria" value="<?php echo $ct_Nombre_categoria; ?>">
                <br>
                <label for="ct_Descripcion_categoria" class="form-label">Editar descripción de categoria</label>
                <input type="text" class="form-control" name="ct_Descripcion_categoria" id="ct_Descripcion_categoria" aria-describedby="helpId" placeholder="Ingrese su descripción de categoria" value="<?php echo $ct_Descripcion_categoria; ?>">
                <br>
                <button type="submit" class="btn btn-primary" role="button">Editar</button>
                <a class="btn btn-danger" href="./index.php" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require_once("../../templates/footer.php"); ?>