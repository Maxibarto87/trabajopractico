<?php require_once("../../templates/header.php") ?>
<div class="card">
        <div class="card-header">
            Datos de Proveedores
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="pr_Nombre_de_fantasia" class="form-label">Nombre de Fantasia</label>
                  <input type="text" class="form-control" name="pr_Nombre_de_fantasia" id="pr_Nombre_de_fantasia" aria-describedby="helpId" placeholder="Ingrese su Nombre de Fantasia">  
                        <br>
                  <label for="pr_Nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="pr_Nombre" id="pr_Nombre" aria-describedby="helpId" placeholder="Ingrese su Nombre">
                        <br>
                  <label for="pr_Apellido" class="form-label">Apellido</label>
                  <input type="text" class="form-control" name="pr_Apellido" id="pr_Apellido" aria-describedby="helpId" placeholder="Ingrese su Apellido">
                        <br>
                  <label for="pr_Email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="pr_Email" id="pr_Email" aria-describedby="emailhelpId" placeholder="Ingrese su Email">
                        <br>
                  <label for="pr_Direccion" class="form-label">Dirección</label>
                  <input type="text" class="form-control" name="pr_Direccion" id="pr_Direccion" aria-describedby="helpId" placeholder="Ingrese su Dirección">
                        <br>
                  <label for="pr_CUIT" class="form-label">CUIT</label>
                  <input type="number" class="form-control" name="pr_CUIT" id="pr_CUIT" aria-describedby="helpId" placeholder="Ingrese Nombre de Categoria">
                        <br>
                  <label for="pr_Telefono" class="form-label">Teléfono</label>
                  <input type="number" class="form-control" name="pr_Telefono" id="pr_Telefono" aria-describedby="helpId" placeholder="Ingrese Descripcion de Categoria">
                        <br>
                 <button type="submit" name="" id="" class="btn btn-primary" role="button">Enviar</button>       
                 <a name="" id="" class="btn btn-danger" href="./index.php" role="button">cancelar</a> <!-- para agregar la direccion se hace asi -->
                </div>
            </form>
        </div>
        
    </div>
<?php require_once("../../templates/footer.php") ?>