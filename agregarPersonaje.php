<?php
require_once("BaseDeDatos.php");
require_once("funciones.php");

$id = $_POST["id"];
$ciudad = $_POST["ciudad"];
$descripcion = $_POST["descripcion"];
$direccionCarpetaImagenes = "Recursos/img/personajes/";

$nombreDeImagenDeseado = $_POST["nombre"];


if ($_FILES["imagen"]["error"] > 0) {

    header("Location: nuevoPersonaje.php");
    exit();
} else {
    $nombreDeImagenSubida = $_FILES["imagen"]["name"];

    $nombreDeImagenCambiado = funcionCambiarNombreImagen($nombreDeImagenSubida, $nombreDeImagenDeseado);

    $destino = $direccionCarpetaImagenes . $nombreDeImagenCambiado;

    move_uploaded_file(
        $_FILES["imagen"]["tmp_name"],
        $destino
    );
    $sql = "INSERT INTO Personaje(id, nombre, ciudad, url_imagen, descripcion) 
            VALUES (".$id.",'".$nombreDeImagenDeseado."','".$ciudad."','".$nombreDeImagenCambiado."','".$descripcion."')";

    $conexion->query($sql);
    header("Location: indexLogeado.php");
    exit();
}
