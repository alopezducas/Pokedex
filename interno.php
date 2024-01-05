<?php
require_once("BaseDeDatos.php");
$sql = "select * from Usuario";

$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
$nombre = $row["usuario"];
$contra = $row["contrasenia"];

echo $_POST["name"];
if ($_POST["name"] == $nombre && $_POST["password"] == $contra) {

    session_start();
    $_SESSION["logeado"] = 1;
    $_SESSION["usuario"] = $_POST["name"];
    header("Location: indexLogeado.php");

}else{
    header("Location: index.php?error=true");

}