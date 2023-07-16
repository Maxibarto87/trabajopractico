<?php

require_once("../../libs/conexion.php");

if (isset($_GET["txtID"])) {
    // Recolectar datos con método GET
    $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");
    $sentencia = $conexion->prepare("DELETE FROM `proveedor` WHERE `id_pr` = :id_pr");
    // Asignar los valores que vienen del método GET
    $sentencia->bindParam(":id_pr", $txtID);
    $sentencia->execute();
    header("Location: index.php");
    exit();
}

$sentencia = $conexion->prepare("SELECT * FROM `proveedor`");
$sentencia->execute();
$lista_proveedor = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>



<?php require_once("../../templates/header.php") ?>
<h1>Proveedor</h1>   
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="./crear.php" role="button">Agregar Proveedor</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de fantasía</th>
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
            <?php foreach ($lista_proveedor as $registro) { ?>
                        <tr>
                            <td scope="row">
                                <?php echo $registro['id_pr']; ?>
                            </td>
                            <td>
                                <?php echo $registro['pr_Nombre_de_fantasia']; ?>
                            </td>
                            <td>
                                <?php echo $registro['pr_Nombre']; ?>
                            </td>
                            <td>
                                <?php echo $registro['pr_Apellido']; ?>
                            </td>
                            <td>
                                <?php echo $registro['pr_Email']; ?>
                            </td>
                            <td>
                                <?php echo $registro['pr_Direccion']; ?>
                            </td>
                            <td>
                                <?php echo $registro['pr_CUIT']; ?>
                            </td>
                            <td>
                                <?php echo $registro['pr_Telefono']; ?>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id_st']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro['id_st']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                
            </tbody>
        </table>
    </div>
    
    
</div> 
</div> 
<?php require_once("../../templates/footer.php") ?>