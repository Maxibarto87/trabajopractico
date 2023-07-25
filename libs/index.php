<?php
session_start();
require_once("../templates/header.php");
?>
<br>
<div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenid@ al sistema</h1>
        <p class="col-md-8 fs-4">
            <?php echo $_SESSION['usuario_us']; ?>
        </p>
        <!-- <button class="btn btn-primary btn-lg" type="button">Inicio</button> -->
   
</div>

   <img src="../assets/img/Administración.jpg" alt="Esta es una foto de administracion" class="img">
<?php require_once("../templates/footer.php"); ?>