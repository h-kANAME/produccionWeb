<?php
include_once('../inc/con_db.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['mail'];
$clave = $_POST['clave'];
$acceso = 2;

if ($connect) {

    $validacion = "SELECT * FROM usuarios WHERE usuario = '$mail'";
    $comprobacion = $connect->query($validacion);

    foreach ($comprobacion as $row) {

        $validarUsuario = $row['usuario'];
    }

    echo $validarUsuario . '<br>';

    if ($validarUsuario) {
        echo 'Mail en uso, intente recuperar contraseña';
    } else {
        $consulta = "INSERT INTO usuarios (nombre, apellido, usuario, clave, permiso, tipo_acceso) VALUES ('$nombre', '$apellido', '$mail', '$clave', '2', 'Usuario');";

        $respuesta = $connect->exec($consulta);

        header("location:../inicio.php");
    }
}
