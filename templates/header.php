<?php
$url_base = "http://localhost/app/"
?>
<!doctype html>
<html lang="en">

<head>
<title>Administracion</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS v5.2.1 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
</head>

<body>
<header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $url_base ?>login.php" aria-current="page">Inicio<span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base?>secciones/stock">Stock</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base?>secciones/cliente">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base?>secciones/categoria">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base?>secciones/proveedor">Proveedor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base?>secciones/usuarios">usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base?>/libs/cerrar.php">Cerrar</a>
            </li>
        </ul>
    </nav>
    
</header>
<main class="container">
    <br>
