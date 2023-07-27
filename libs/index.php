<?php
session_start();
require_once("../templates/header.php");
?>
<br>
<div class="inicio">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenid@ al sistema</h1>
        <p class="palabra">
            <?php echo $_SESSION['usuario_us']; ?>
        </p>
        <!-- <button class="btn btn-primary btn-lg" type="button">Inicio</button> -->
   
    </div>
</div>
   
<?php require_once("../templates/footer.php"); ?>