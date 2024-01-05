<?php
require_once("BaseDeDatos.php");
require_once("funciones.php");
$idViejo = $_GET["idViejo"];
if (!empty($_POST["nombre"])) {
    $sql = 'update Personaje set nombre = "' . $_POST["nombre"] . '" where Personaje.id=' . $idViejo;
    $conexion->query($sql);
}
if (isset($_POST["ciudad"])) {
    $sql = 'update Personaje set ciudad = "' . $_POST["ciudad"] . '" where Personaje.id=' . $idViejo;
    $conexion->query($sql);
}
if (isset($_POST["descripcion"])) {
    $sql = 'update Personaje set descripcion = "' . $_POST["descripcion"] . '" where Personaje.id=' . $idViejo;
    $conexion->query($sql);
}

if ($_FILES["imagen"]["error"] <= 0) {

    $sql = "select * from Personaje WHERE id ='$idViejo'";
    $resultado = $conexion->query($sql);
    $row = $resultado->fetch_assoc();
    $img = $row["url_imagen"];
    $nombre = $row["nombre"];
    unlink("Recursos/img/personajes/" . $img);


    $nombreDeImagenSubida = $_FILES["imagen"]["name"];
    $nombreDeImagenCambiado = funcionCambiarNombreImagen($nombreDeImagenSubida, $nombre);
    $destino = "Recursos/img/personajes/" . $nombreDeImagenCambiado;


    move_uploaded_file(
        $_FILES["imagen"]["tmp_name"],
        $destino
    );

    $sql = 'update Personaje set url_imagen = "' . $nombreDeImagenCambiado . '" where Personaje.id=' . $idViejo;
    $conexion->query($sql);
}
if (!empty($_POST["id"])) {
    $sql = 'update Personaje set id = ' . $_POST["id"] . ' where Personaje.id=' . $idViejo;
    $conexion->query($sql);
}
header("Location: indexLogeado.php");
