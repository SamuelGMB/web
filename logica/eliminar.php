<?php
session_start();

include_once('./conexion.php');
require './conexion.php';
  
$id_ar = mysqli_real_escape_string($conexion,$_POST["idar"]); 
 
 $a=mysqli_query($conexion,"DELETE from articulo where id_articulo='$id_ar'");
   //mysqli_free_result($a);
  if($a)
  {
    header("Location: ../perfil.php");
    echo "Usted ".$_SESSION["user"]." ha eliminado exitosamente el articulo";
    echo "</br></br></br>";
 
  }
  else {
    header("Location: ../perfil.php");
    echo "<p>Lo sentimos ".$_SESSION["user"]." ha ocurrido un problema al eliminar</p>";
  }

 mysqli_close($conexion);

 
  ?>


  



</br></br></br>
</br></br></br>
<a href='../site.php'> Volver </a>