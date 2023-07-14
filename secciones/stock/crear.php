<?php require_once("../../templates/header.php") ?>
<div class="card">
        <div class="card-header">
            Datos de Stock
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="st_Nombre_del_producto" class="form-label">Nombre del Producto</label>
                  <input type="text" class="form-control" name="st_Nombre_del_producto" id="st_Nombre_del_producto" aria-describedby="helpId" placeholder="Ingrese el nombre de producto">  
                        <br>
                  <label for="st_Precio_por_unidad" class="form-label">Precio por unidad</label>
                  <input type="number" class="form-control" name="st_Precio_por_unidad" id="st_Precio_por_unidad" aria-describedby="helpId" placeholder="Ingrese su precio por unidad">
                        <br>
                  <label for="st_N_de_existencia" class="form-label">Numero de existencia</label>
                  <input type="number" class="form-control" name="st_N_de_existencia" id="st_N_de_existencia" aria-describedby="helpId" placeholder="Ingrese su numero de existencia">
                        <br>
                  <label for="st_Categoria" class="form-label">Categoria</label>
                  <input type="text" class="form-control" name="	st_Categoria" id="	st_Categoria" aria-describedby="helpId" placeholder="Ingrese su categoria">
                        <br>
                  <label for="st_Cantidad_total_en_existencia" class="form-label">Cantidad total en existencia</label>
                  <input type="number" class="form-control" name="st_Cantidad_total_en_existencia" id="st_Cantidad_total_en_existencia" aria-describedby="helpId" placeholder="Ingrese cantidad total en existencia">
                        <br>
                 <button type="submit" name="" id="" class="btn btn-primary" role="button">Enviar</button>       
                 <a name="" id="" class="btn btn-danger" href="./index.php" role="button">cancelar</a> <!-- para agregar la direccion se hace asi -->
                </div>
            </form>
        </div>
        
    </div>
<?php require_once("../../templates/footer.php") ?>