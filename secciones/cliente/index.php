<?php

require_once("../../libs/conexion.php");

if (isset($_GET["txtID"])) {
    // Recolectar datos con método GET
    $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");
    $sentencia = $conexion->prepare("DELETE FROM `cliente` WHERE `id_cl` = :id_cl");
    // Asignar los valores que vienen del método GET
    $sentencia->bindParam(":id_cl", $txtID);
    $sentencia->execute();
    header ("Location: index.php?mensaje=".$mensaje='Cliente editado correctamente');
    exit();
}

$sentencia = $conexion->prepare("SELECT * FROM `cliente`");
$sentencia->execute();
$lista_cliente = $sentencia->fetchAll(PDO::FETCH_ASSOC);

require_once("../../templates/header.php");
if (isset($_GET["mensaje"])) { ?>

<script>
Swal.fire({
    icon: "success",
    title: "<?php echo $_GET['mensaje']; ?>"
});
</script>

<?php } ?>
<h1>Cliente</h1>   
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="./crear.php" role="button">Agregar cliente</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">CUIT</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista_cliente as $registro) { ?>
                        <tr>
                            <td scope="row">
                                <?php echo $registro['id_cl']; ?>
                            </td>
                            <td>
                                <?php echo $registro['cl_Nombre']; ?>
                            </td>
                            <td>
                                <?php echo $registro['cl_Apellido']; ?>
                            </td>
                            <td>
                                <?php echo $registro['cl_Email']; ?>
                            </td>
                            <td>
                                <?php echo $registro['cl_Direccion']; ?>
                            </td>
                            <td>
                                <?php echo $registro['cl_CUIT']; ?>
                            </td>
                            <td>
                                <?php echo $registro['cl_Telefono']; ?>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id_cl']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id_cl']; ?>)" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
        </table>
    </div>
    <script>
    function borrar(id_cl) {
  // index.php?txtID=
  Swal.fire({
    title: '¿Desea borrar cliente?',
    text: '¡No podrás recuperarlo!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, borrarlo'
  }).then((result) => {
    if (result.isConfirmed) {
        window.location = 'index.php?txtID=' + id_cl;
        Swal.fire(
        '¡Borrado!',
        'El dato cliente ha sido borrado con éxito',
        'success'
      );
      
    }
  });
}
</script> 
    <?php require_once("../../templates/footer.php") ?>