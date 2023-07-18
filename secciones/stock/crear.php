<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../../libs/conexion.php");

    // Recolectar datos del método POST
    $st_Nombre_del_producto = isset($_POST["st_Nombre_del_producto"]) ? $_POST["st_Nombre_del_producto"] : "";
    $st_Precio_por_unidad = isset($_POST["st_Precio_por_unidad"]) ? $_POST["st_Precio_por_unidad"] : "";
    $st_N_de_existencia = isset($_POST["st_N_de_existencia"]) ? $_POST["st_N_de_existencia"] : "";
    $st_Categoria = isset($_POST["st_Categoria"]) ? $_POST["st_Categoria"] : "";
    $st_Cantidad_total_en_existencia = isset($_POST["st_Cantidad_total_en_existencia"]) ? $_POST["st_Cantidad_total_en_existencia"] : "";

    // Preparar la inserción de datos
    $sentencia = $conexion->prepare("INSERT INTO stock (st_Nombre_del_producto, st_Precio_por_unidad, st_N_de_existencia, st_Categoria, st_Cantidad_total_en_existencia) VALUES (:st_Nombre_del_producto, :st_Precio_por_unidad, :st_N_de_existencia, :st_Categoria, :st_Cantidad_total_en_existencia)");

    $sentencia->bindParam(":st_Nombre_del_producto", $st_Nombre_del_producto);
    $sentencia->bindParam(":st_Precio_por_unidad", $st_Precio_por_unidad);
    $sentencia->bindParam(":st_N_de_existencia", $st_N_de_existencia);
    $sentencia->bindParam(":st_Categoria", $st_Categoria);
    $sentencia->bindParam(":st_Cantidad_total_en_existencia", $st_Cantidad_total_en_existencia);

    if ($sentencia->execute()) {
    header("Location:index.php?mensaje='stock creado correctamente'");

}
}
?>

<?php require_once("../../templates/header.php"); ?>
<div class="card">
    <div class="card-header">
        Agregar Stock
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="st_Nombre_del_producto" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" name="st_Nombre_del_producto" id="st_Nombre_del_producto" placeholder="Ingrese el nombre del producto">
                <br>
                <label for="st_Precio_por_unidad" class="form-label">Precio por unidad</label>
                <input type="number" class="form-control" name="st_Precio_por_unidad" id="st_Precio_por_unidad" placeholder="Ingrese su precio por unidad">
                <br>
                <label for="st_N_de_existencia" class="form-label">Número de existencia</label>
                <input type="number" class="form-control" name="st_N_de_existencia" id="st_N_de_existencia" placeholder="Ingrese su número de existencia">
                <br>
                <label for="st_Categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="st_Categoria" id="st_Categoria" placeholder="Ingrese su categoría">
                <br>
                <label for="st_Cantidad_total_en_existencia" class="form-label">Cantidad total en existencia</label>
                <input type="number" class="form-control" name="st_Cantidad_total_en_existencia" id="st_Cantidad_total_en_existencia" placeholder="Ingrese la cantidad total en existencia">
                <br>
                <button type="submit" name="submit" class="btn btn-primary" role="button">Enviar</button>
                <a name="" id="" class="btn btn-danger" href="./index.php" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?php require_once("../../templates/footer.php"); ?>