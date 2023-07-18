<?php

require_once("../../libs/conexion.php");

if (isset($_GET["txtID"])) {
    // Recolectar datos con método GET
    $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");
    $sentencia = $conexion->prepare("DELETE FROM `stock` WHERE `id_st` = :id_st");
    // Asignar los valores que vienen del método GET
    $sentencia->bindParam(":id_st", $txtID);
    $sentencia->execute();
    header ("Location: index.php?mensaje=".$mensaje='Stock Eliminado');
    exit();
}

$sentencia = $conexion->prepare("SELECT * FROM `stock`");
$sentencia->execute();
$lista_stock = $sentencia->fetchAll(PDO::FETCH_ASSOC);



require_once("../../templates/header.php");
if (isset($_GET["mensaje"])) { ?>

<script>
Swal.fire({
    icon: "success",
    title: "<?php echo $_GET['mensaje']; ?>"
});
</script>

<?php } ?>
<h1>Stock</h1>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Stock</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Precio por unidad</th>
                        <th scope="col">Numero de existencia</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cantidad total en existencia</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_stock as $registro) { ?>
                        <tr>
                            <td scope="row">
                                <?php echo $registro['id_st']; ?>
                            </td>
                            <td>
                                <?php echo $registro['st_Nombre_del_producto']; ?>
                            </td>
                            <td>
                                <?php echo $registro['st_Precio_por_unidad']; ?>
                            </td>
                            <td>
                                <?php echo $registro['st_N_de_existencia']; ?>
                            </td>
                            <td>
                                <?php echo $registro['st_Categoria']; ?>
                            </td>
                            <td>
                                <?php echo $registro['st_Cantidad_total_en_existencia']; ?>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id_st']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id_st']; ?>)" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function borrar(id_st) {
  // index.php?txtID=
  Swal.fire({
    title: '¿Desea borrar el stock?',
    text: '¡No podrás recuperarlo!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, borrarlo'
  }).then((result) => {
    if (result.isConfirmed) {
        window.location = 'index.php?txtID=' + id_st;
        Swal.fire(
        '¡Borrado!',
        'El stock ha sido borrado con éxito',
        'success'
      );
      
    }
  });
}
</script>
<?php require_once("../../templates/footer.php"); ?>