<?php
  session_start();  //vamos a usar sesiones
  include_once('./conexion.php');
  require './conexion.php';
  $nom_u = mysqli_real_escape_string($conexion,$_POST["idus"]);   
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      </head>
      <body>
      </body>
  </html>';

  echo '<script>
  function salir(){
    window.location.href = "../nuevoprod.php";
  }
  </script>';

  $tot = 2;
  $revisar = $_FILES["image"]["tmp_name"];
  if($revisar !== false){
    $img_direction = "../uploads/";
    $real_img= "./uploads/".basename( $_FILES['image']['name']); 
    $img_direction = $img_direction . basename( $_FILES['image']['name']);
    while(file_exists($img_direction)){//Revisa si la imagen existe y genera la validación correspondiente
      $img_direction = "../uploads/($tot)".basename( $_FILES['image']['name']);
      $real_img= "./uploads/($tot)".basename( $_FILES['image']['name']);
      $tot++;
    } 
    if(move_uploaded_file($_FILES['image']['tmp_name'], $img_direction)){ 
      $sub = mysqli_query ($conexion,"INSERT into articulo (id_usuario,nom_articulo,valor_articulo,desc_articulo,tipo_articulo,images)
      values ('$nom_u','$nom_a','$val_a','$des_a','$tip_a','$real_img')");
          // Condicional para verificar la subida del articulo
          if($sub){
            echo '<script>
            swal("Bien!", "Articulo agregado con exito", ".");
            setTimeout(salir, 3000);
            </script>';
          }else{
            echo '<script>
            swal("Error inesperado!", "El articulo no ha sido agregado", ".");
            setTimeout(salir, 3000);
            </script>';
          } 
    }else{
      echo '<script>
            swal("Error!", "La imagen no se ha podido agregar", ".");
            setTimeout(salir, 3000);
            </script>';
    } 

        // Si el usuario no selecciona ninguna imagen
  }else{
    echo '<script>
            swal("Error!", "No olvide llenar todos los campos", ".");
            setTimeout(salir, 5000);
            </script>';
  }


    mysqli_close($conexion);
?>