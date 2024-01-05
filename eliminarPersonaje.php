<?php
require_once("BaseDeDatos.php");

$idPersonaje = $_GET["id"];

$sql = "select * from Personaje WHERE id ='$idPersonaje'";

$resultado = $conexion->query($sql);

$row = $resultado->fetch_assoc();
$img = $row["url_imagen"];
unlink("Recursos/img/personajes/".$img);

$sql = "delete from Personaje where id ='$idPersonaje'";
$conexion->query($sql);
header("Location: indexLogeado.php");

