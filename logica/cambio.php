<?php
session_start();

include_once('./conexion.php');
require './conexion.php';

  $id_ar = mysqli_real_escape_string($conexion,$_POST["idar"]); 
  $nom_a = mysqli_real_escape_string($conexion,$_POST["nom"]);
  $val_a = mysqli_real_escape_string($conexion,$_POST["val"]);
  $des_a = mysqli_real_escape_string($conexion,$_POST["des"]);
  $tip_a = mysqli_real_escape_string($conexion,$_POST["tart"]);
 
  echo '<!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar</title>
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->
        <script src="https://kit.fontawesome.com/23208e58b6.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      </head>
      <body>
      </body>
  </html>';
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
        $sub=mysqli_query($conexion,"update articulo set nom_articulo='$nom_a', valor_articulo='$val_a', desc_articulo='$des_a', tipo_articulo='$tip_a', images='$real_img'
        where id_articulo='$id_ar'");
                    // Condicional para verificar la subida del articulo
            if($sub){
              echo '<script>swal("Bien!", "La edición se ha realizado con exito", ".");
            window.location.href = "../perfil.php";</script>;';
            }else{
              header("Location: ../perfil.php");
            } 
      }else{
        $sub=mysqli_query($conexion,"update articulo set nom_articulo='$nom_a', valor_articulo='$val_a', desc_articulo='$des_a', tipo_articulo='$tip_a'
        where id_articulo='$id_ar'");
        if($sub){
          echo '<script>swal("Bien!", "La edición se ha realizado con exito", ".");
            window.location.href = "../perfil.php";</script>;';
        }else{
          header("Location: ../perfil.php");
        } 
      }
    }
 mysqli_close($conexion);

 
?>