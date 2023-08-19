<?php
//Declaracion de variables para la conexion a la BD
$server = 'localhost';
$user = 'root';
$password = '';
$db = "si_cum";

$conexion = mysqli_connect($server, $user, $password, $db);
if(!$conexion){
    die('Error de conexion en la BD,'.mysqli_connect_error());
    exit();
}
//echo '<script> alert("Conexion Exitosa");</script>';
mysqli_query($conexion, 'SET NAMES "utf8"');