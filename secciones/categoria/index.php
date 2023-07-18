<?php

require_once("../../libs/conexion.php");

if (isset($_GET["txtID"])) {
    // Recolectar datos con método GET
    $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");
    $sentencia = $conexion->prepare("DELETE FROM `categoria` WHERE `id_ct` = :id_ct");
    // Asignar los valores que vienen del método GET
    $sentencia->bindParam(":id_ct", $txtID);
    $sentencia->execute();
    header ("Location: index.php?mensaje=".$mensaje='Categoria eliminada');
    exit();
}

$sentencia = $conexion->prepare("SELECT * FROM `categoria`");
$sentencia->execute();
$lista_categoria = $sentencia->fetchAll(PDO::FETCH_ASSOC);

require_once("../../templates/header.php");
if (isset($_GET["mensaje"])) { ?>

<script>
Swal.fire({
    icon: "success",
    title: "<?php echo $_GET['mensaje']; ?>"
});
</script>

<?php } ?>
<h1>Categoria</h1>   
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="./crear.php" role="button">Agregar Categoria</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de categoria</th>
                    <th scope="col">Descripcion de categoria</th>
                    <th scope="col">Acciones</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista_categoria as $registro) { ?>
                        <tr>
                            <td scope="row">
                                <?php echo $registro['id_ct']; ?>
                            </td>
                            <td>
                                <?php echo $registro['ct_Nombre_categoria']; ?>
                            </td>
                            <td>
                                <?php echo $registro['ct_Descripcion_categoria']; ?>
                            </td>
                            
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id_ct']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="javascript:borrar(<?php echo $registro['id_ct']; ?>)" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
    
    
</div> 
</div> 
<script>
    function borrar(id_ct) {
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
        window.location = 'index.php?txtID=' + id_ct;
        Swal.fire(
        '¡Borrado!',
        'el dato categoria ha sido borrado con éxito',
        'success'
      );
      
    }
  });
}
</script> 
<?php require_once("../../templates/footer.php") ?>