<?php
session_start();

include_once('./conexion.php');
require './conexion.php';
  
  $nom_u = mysqli_real_escape_string($conexion,$_POST["nom"]);
  $con_u = mysqli_real_escape_string($conexion,$_POST["con"]);
  $dir_u = mysqli_real_escape_string($conexion,$_POST["dir"]);
  $tel_u = mysqli_real_escape_string($conexion,$_POST["tel"]);
  
    $_SESSION['user'] = $nom_u;
    $_SESSION['password'] = $con_u;
    $_SESSION['num_contacto'] = $tel_u;
    $_SESSION['direccion'] = $dir_u;
    $nombu=$_POST["nomb"];

    echo '<!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      </head>
      <body>
      </body>
  </html>';

  echo '<script>
  function salir(){
    window.location.href = "../perfil.php";
  }
  </script>';

    $tot = 2;
    $revisar = $_FILES["image"]["tmp_name"];
    if($revisar !== false){
      $img_direction = "../puploads/";
      $real_img= "./puploads/".basename( $_FILES['image']['name']); 
      $img_direction = $img_direction . basename( $_FILES['image']['name']);
      while(file_exists($img_direction)){//Revisa si la imagen existe y genera la validación correspondiente
        $img_direction = "../puploads/($tot)".basename( $_FILES['image']['name']);
        $real_img= "./puploads/($tot)".basename( $_FILES['image']['name']);
        $tot++;
      } 
      if(move_uploaded_file($_FILES['image']['tmp_name'], $img_direction)){ 
        $sub=mysqli_query($conexion,"update usuario  set  nom_usuario='$nom_u', contrasenia='$con_u', direccion='$dir_u', num_contacto='$tel_u', foto_usuario='$real_img' where id_usuario='$nombu' ");
            // Condicional para verificar la subida del articulo
            if($sub){
              $_SESSION['foto'] = $real_img;
              echo '<script>
            swal("Bien!", "Tu perfil se ha editado con exito", ".");
            setTimeout(salir, 3000);
            </script>';
            }else{
              echo '<script>
            swal("Error!", "No se ha podido editar el perfil", ".");
            setTimeout(salir, 5000);
            </script>';
            } 
      }else{
        $sub=mysqli_query($conexion,"update usuario set  nom_usuario='$nom_u', contrasenia='$con_u', direccion='$dir_u', num_contacto='$tel_u' where id_usuario='$nombu' ");
        if($sub){
          echo '<script>
            swal("Bien!", "Tu perfil se ha editado con exito", ".");
            setTimeout(salir, 3000);
            </script>';
        }else{
          echo '<script>
            swal("Error!", "No se ha podido editar el perfil", ".");
            setTimeout(salir, 3000);
            </script>';
        } 
      } 
  
          // Si el usuario no selecciona ninguna imagen
    }else{
      header("Location: ../perfil.php");
    }

   //mysqli_free_result($a);

  mysqli_close($conexion);

?>