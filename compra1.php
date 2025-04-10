<?php 
session_start();
include_once ('./logica/conexion.php');
if(isset($_SESSION["user"])){

  $consulta=mysqli_query($conexion,"select * from articulo");
  $id_a = mysqli_real_escape_string($conexion,$_POST["idar"]);
  $nom_a = mysqli_real_escape_string($conexion,$_POST["nomb"]);
  $val_a = mysqli_real_escape_string($conexion,$_POST["val"]);
  $des_a = mysqli_real_escape_string($conexion,$_POST["des"]);
  $tip_a = mysqli_real_escape_string($conexion,$_POST["tart"]);
  $fot_a = mysqli_real_escape_string($conexion,$_POST["foto"]);
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->
    <script src="https://kit.fontawesome.com/23208e58b6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./estilos/nuevoprod_style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script defer src="./js/responsive_nav-bar.js"></script>
</head>
  <body>
    <?php
    if($des_a == 'vendido') {
      echo '<script>
      swal("Error!", "Lo sentimos no queda mas de este articulo", "enviaremos un mensaje al vendedor para informarle");
      function salir(){
        window.location.href = "./busqueda.php";
      }
      setTimeout(salir, 3000);
      </script>;';
    }
    else {
      echo '<script>
      function salir(){
        window.location.href = "./busqueda.php";
      }
      </script>;';
    ?>
    <header class="_header">
      <nav class="_nav">
        <label class="logo _nav-link">JUUCS</label>
        <button class="_nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="_nav-menu">
          <li class="_nav-menu-item">
            <a href="./site.php" class="_nav-menu-link _nav-link">Inicio</a>
          </li>
          <li class="_nav-menu-item">
            <a href="./busqueda.php" class="_nav-menu-link _nav-link">Buscar</a>
          </li>
          <li class="_nav-menu-item">
            <a href="./nuevoprod.php" class="_nav-menu-link _nav-link">Publicar</a>
          </li>
          <li class="_nav-menu-item">
            <a href="./contacto.php" class="_nav-menu-link _nav-link">Contacto</a>
          </li>
          <li class="_nav-menu-item">
            <a href="./perfil.php" class="_nav-menu-link _nav-link _nav-menu-link_active">Mi perfil</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="contain-carousel">
      <form class="form" action="" method="post" enctype="multipart/form-data">
        <div class="_ordForm">
          <div class="_div">
            <label for="nomArticulo">Nombre del producto: </label>
            <?php
            echo "<input type='hidden' value='".$id_a."' name='idar'/>";

            echo "<input type='text' value='".$nom_a."' name='nom' disabled/>";
            ?>
          </div>
          <div class="_div">
            <label for="valArticulo">Valor del producto en pesos MXM: </label>
            <?php
              echo "<input type='number' value='".$val_a."' name='val' disabled/>";
            ?>
          </div>
          <div class="_div _tipo">
            <label>Tipo de articulo:
              <?php
              echo "<input type='text' value='".$tip_a."' name='tart' disabled/>";
            ?></label>
            
          </div>
          <div class="_div">
            <label for="nomArticulo">Descripcion del producto: </label>
            <?php
            echo "<input type='text' value='".$des_a."' name='des' disabled/>"; 
            ?>
            </div>
        </div>
        <div class="_ordForm">
          <div class="_div _im">
            <label for="image" class="_sube_img">Imagen del producto:<!---->
            <div class="container-img">
            <?php echo '<img src="'.$fot_a.'" id="imagePrevisualizacion" style="width: 100%;height: 100%;">' ?>
            </div>
            </label>
            </label>
            <!--<input type="file" name="image" accept="image/*" required="required" id="image" disable>-->
            <script src="./js/mostrar_img.js"></script>
          </div>
        </div>
        <?php
          echo "<input type='hidden' value= ".$_SESSION["ider"]." name='idus' />";
        ?>
        <div class="fin_form">
          <label for="subir_form" class="_sube_img _sube">
          <i class="fas fa-cloud-upload-alt"></i> Comprar producto
          </label>
          <input type="submit" value="Subir" id="subir_form" name="btnSubmit">
        </div>
      </form>
      <?php
      
        require './logica/conexion.php';
        if (isset($_POST["btnSubmit"])){
          $id_ar = mysqli_real_escape_string($conexion,$_POST["idar"]);   
  
          $a = mysqli_query($conexion,"UPDATE articulo set valor_articulo='0', desc_articulo='vendido', tipo_articulo='agotado' 
          where id_articulo='$id_ar'");
            //mysqli_free_result($a);
          if($a){
            echo '<script>
            swal("Bien!", "La compra se ha realizado con exito, enviaremos un mensaje al vendedor para que puedan comunicarse", ".");
            setTimeout(salir, 5000);
            </script>;';
            /*echo "<script>alert('La compra se ha realizado con exito, enviaremos un mensaje al vendedor para que puedan comunicarse');</script>";*/
          }
          else {
            echo '<script>
            swal("Error!", "La compra ne se ha podido realizar", ".");
            setTimeout(salir, 3000);
            </script>;';
          }
          
          mysqli_close($conexion);
        }
      ?>
    </div>
    <section class="footer">

    </section>
</html>
<?php
  }
}else{
  echo "No tienes acceso";
}
?>