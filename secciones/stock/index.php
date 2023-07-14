<?php require_once("../../libs/conexion.php");

$sentencia=$conexion->prepare("SELECT * FROM `stock`");
$sentencia->execute();
$lista_stock = $sentencia->fetchAll(PDO::FETCH_ASSOC);

print_r($lista_stock)

?>

<?php require_once("../../templates/header.php") ?>
<h1>Stock</h1>   
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Stock</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table">
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
                <?php foreach ($lista_stock as $registro) {?>
    

                <tr class="">
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
                        <a name="" id="" class="btn btn-info" href="#" role="button">Editar</a> 
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                    </td>
                        
                
                </tr>
                <?php }?>
    
        
            </tbody>
        </table>
    </div>
    
    
</div> 
</div>  
<?php require_once("../../templates/footer.php") ?>