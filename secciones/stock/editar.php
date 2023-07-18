<?php
require_once("../../libs/conexion.php");

if (isset($_GET["txtID"])) {
    $txtID = $_GET["txtID"];
    $sentencia = $conexion->prepare("SELECT * FROM `stock` WHERE `id_st` = :id_st");
    $sentencia->bindParam(":id_st", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
    if (!$registro) {
        echo "No se encontró el registro con el ID: $txtID";
        exit();
    }
    $st_Nombre_del_producto = $registro['st_Nombre_del_producto'];
    $st_Precio_por_unidad = $registro['st_Precio_por_unidad'];
    $st_N_de_existencia = $registro['st_N_de_existencia'];
    $st_Categoria = $registro['st_Categoria'];
    $st_Cantidad_total_en_existencia = $registro['st_Cantidad_total_en_existencia'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $txtID = $_POST['txtID'];
    $st_Nombre_del_producto = $_POST['st_Nombre_del_producto'];
    $st_Precio_por_unidad = $_POST['st_Precio_por_unidad'];
    $st_N_de_existencia = $_POST['st_N_de_existencia'];
    $st_Categoria = $_POST['st_Categoria'];
    $st_Cantidad_total_en_existencia = $_POST['st_Cantidad_total_en_existencia'];

    $sentencia = $conexion->prepare("UPDATE `stock` SET `st_Nombre_del_producto` = :st_Nombre_del_producto, `st_Precio_por_unidad` = :st_Precio_por_unidad, `st_N_de_existencia` = :st_N_de_existencia, `st_Categoria` = :st_Categoria, `st_Cantidad_total_en_existencia` = :st_Cantidad_total_en_existencia WHERE `id_st` = :id_st");
    $sentencia->bindParam(":id_st", $txtID);
    $sentencia->bindParam(":st_Nombre_del_producto", $st_Nombre_del_producto);
    $sentencia->bindParam(":st_Precio_por_unidad", $st_Precio_por_unidad);
    $sentencia->bindParam(":st_N_de_existencia", $st_N_de_existencia);
    $sentencia->bindParam(":st_Categoria", $st_Categoria);
    $sentencia->bindParam(":st_Cantidad_total_en_existencia", $st_Cantidad_total_en_existencia);
    $sentencia->execute();
    header ("Location: index.php?mensaje=".$mensaje='Stock editado correctamente');
}

require_once("../../templates/header.php");
if (isset($_GET["mensaje"])) { ?>

<script>
Swal.fire({
    icon: "success",
    title: "<?php echo $_GET['mensaje']; ?>"
});
</script>

<?php } ?>
<div class="card">
    <div class="card-header">
        Editar
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <input type="hidden" name="txtID" value="<?php echo $txtID; ?>">
                <label for="st_Nombre_del_producto" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" name="st_Nombre_del_producto" id="st_Nombre_del_producto" placeholder="Ingrese el nombre del producto" value="<?php echo $st_Nombre_del_producto; ?>">
                <br>
                <label for="st_Precio_por_unidad" class="form-label">Precio por unidad</label>
                <input type="number" class="form-control" name="st_Precio_por_unidad" id="st_Precio_por_unidad" placeholder="Ingrese su precio por unidad" value="<?php echo $st_Precio_por_unidad; ?>">
                <br>
                <label for="st_N_de_existencia" class="form-label">Número de existencia</label>
                <input type="number" class="form-control" name="st_N_de_existencia" id="st_N_de_existencia" placeholder="Ingrese su número de existencia" value="<?php echo $st_N_de_existencia; ?>">
                <br>
                <label for="st_Categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="st_Categoria" id="st_Categoria" placeholder="Ingrese su categoría" value="<?php echo $st_Categoria; ?>">
                <br>
                <label for="st_Cantidad_total_en_existencia" class="form-label">Cantidad total en existencia</label>
                <input type="number" class="form-control" name="st_Cantidad_total_en_existencia" id="st_Cantidad_total_en_existencia" placeholder="Ingrese la cantidad total en existencia" value="<?php echo $st_Cantidad_total_en_existencia; ?>">
                <br>
                <button type="submit" name="submit" class="btn btn-primary" role="button">Editar</button>
                <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php require_once("../../templates/footer.php"); ?>