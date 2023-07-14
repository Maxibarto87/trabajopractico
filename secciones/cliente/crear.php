<?php require_once("../../templates/header.php") ?>
<div class="card">
        <div class="card-header">
            Datos de Clientes
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                  <label for="cl_Nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="cl_Nombre" id="cl_Nombre" aria-describedby="helpId" placeholder="Ingrese su Nombre">
                  <br>
                  <label for="cl_Apellido" class="form-label">Apellido</label>
                  <input type="text" class="form-control" name="cl_Apellido" id="cl_Apellido" aria-describedby="helpId" placeholder="Ingrese su Apellido">
                  <br>
                  <label for="cl_Email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="cl_Email" id="cl_Email" aria-describedby="emailhelpId" placeholder="Ingrese su Email">
                  <br>
                  <label for="cl_Direccion" class="form-label">Dirección</label>
                  <input type="text" class="form-control" name="cl_Direccion" id="cl_Direccion" aria-describedby="helpId" placeholder="Ingrese su Dirección">
                  <br>
                  <label for="cl_CUIT" class="form-label">CUIT</label>
                  <input type="number" class="form-control" name="cl_CUIT" id="cl_CUIT" aria-describedby="helpId" placeholder="Ingrese su Numero de CUIT">
                  <br>
                  <label for="cl_Telefono" class="form-label">Teléfono</label>
                  <input type="number" class="form-control" name="cl_Telefono" id="cl_Telefono" aria-describedby="helpId" placeholder="Ingrese su Numero de Teléfono">
                  <br>
                 <button type="submit" name="" id="" class="btn btn-primary" role="button">Enviar</button>       
                 <a name="" id="" class="btn btn-danger" href="./index.php" role="button">cancelar</a> <!-- para agregar la direccion se hace asi -->
                </div>
            </form>
        </div>
        
    </div>
<?php require_once("../../templates/footer.php") ?>