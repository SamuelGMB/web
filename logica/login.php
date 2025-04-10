<?php
session_start();
include_once 'conexion.php';

// Datos obtenidos desde index.html mediante el formulario
$email = $_POST['email'];
$password = $_POST['password'];
$queryStructureLogin = 
    "SELECT
        correo,
        contrasenia,
        nom_usuario,
        id_usuario,
        num_contacto,
        direccion,
        foto_usuario
    FROM
        usuario
    WHERE
        correo = '$email' AND
        contrasenia = '$password'";

// Se valida la info con la conexion y el query
$validateInfo = mysqli_query($conexion, $queryStructureLogin);

if(mysqli_num_rows($validateInfo) == 1) {
    // Exitoso
    $validateInfoArray = mysqli_fetch_array($validateInfo,MYSQLI_NUM);
    $_SESSION['ider'] = $validateInfoArray[3];
    $_SESSION['user'] = $validateInfoArray[2];
    $_SESSION['password'] = $password;
    $_SESSION['email'] = $email;
    $_SESSION['num_contacto'] = $validateInfoArray[4];
    $_SESSION['direccion'] = $validateInfoArray[5];
    $_SESSION['foto'] = $validateInfoArray[6];
    header("Location: ../site.php");
} else {
    // No encontrado
    header("Location: ../index.html");
}
?>