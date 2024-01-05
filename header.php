<?php
session_start();
require_once("BaseDeDatos.php");
require_once("Consultas.php");
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="Recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="Recursos/css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">

    <script src="Recursos/js/functions.js"></script>


    <title>SimpsonDex</title>
</head>

<body>
<header>
    <nav class="d-flex flex-row b-3 p-2 justify-content-between">
        <?php
        if (isset($_SESSION["logeado"]) == 1) {
            echo '
            <div class="centrar logo">
            <a href="indexLogeado.php"><img src="Recursos/img/logo.png" alt="Logo"></a>
        </div>
            ';
        }else{
            echo '<div class="centrar">
            <a href="index.php"><img src="Recursos/img/logo.png" alt="Logo"></a>
        </div>';
        } ?>

        <?php
        if (isset($_SESSION["logeado"]) == 1) {
            echo '<div class="mt-4 d-flex flex-row justify-content-end">
                <h3 class="text-white d-inline-block mr-1">Bienvenido
                    <strong>
                        '.$_SESSION["usuario"].'
                    </strong> 
                </h3>

                <a href="deslogearse.php">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                        Cerrar Sesion
                    </button>
                </a>
            </div>';
        } else {
            echo '
                    <div class="mt-4">
            <form class="formulario d-flex flex-row justify-content-end" action="interno.php" method="post">
                <input type="text" name="name" id="name" placeholder="Usuario" class="form-control mr-1 mb-1">
                <input type="password" name="password" id="password" placeholder="Contraseña"
                       class="form-control mr-1 mb-2">

                <button type="submit" class="btn btn-outline-warning mb-1">Ingresar</button>
            </form>
        </div>
                ';
        }
        ?>

    </nav>
</header>