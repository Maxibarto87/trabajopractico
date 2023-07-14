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
                <tr class="">
                    <td scope="row">ID</td>
                    <td>Nombre del Producto</td>
                    <td>Precio Por unidad</td>
                    <td>Número de existencia</td>
                    <td>Categoria</td>
                    <td>Cantidad total en existencia</td>
                    <td>
                        <a name="" id="" class="btn btn-info" href="#" role="button">Editar</a> 
                        <a name="" id="" class="btn btn-danger" href="#" role="button">Eliminar</a>
                    </td>
                        
                
                </tr>
                
            </tbody>
        </table>
    </div>
    
    
</div> 
</div>  
<?php require_once("../../templates/footer.php") ?>