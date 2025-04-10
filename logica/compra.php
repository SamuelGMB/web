<?php
session_start();
include_once('./conexion.php');
require './conexion.php';

$id_ar = mysqli_real_escape_string($conexion,$_POST["idar"]);   
 
$a = mysqli_query($conexion,"UPDATE articulo set valor_articulo='0', desc_articulo='vendido', tipo_articulo='agotado' 
where id_articulo='$id_ar'");
  //mysqli_free_result($a);
if($a){
  header("Location: ../compra1.php");
}
else {
  header("Location: ../compra1.php");
}

mysqli_close($conexion);


?>

