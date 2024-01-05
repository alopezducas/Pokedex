<?php
$archivoConfig = "Recursos/Config.ini";
$configuracion = parse_ini_file("Recursos/Config.ini", true);

$host = $configuracion["Conexion"]["host"];
$usuario = $configuracion["Conexion"]["usuario"];
$clave = $configuracion["Conexion"]["clave"];
$bd = $configuracion["Conexion"]["basedatos"];

$conexion = new mysqli($host, $usuario, $clave, $bd);
