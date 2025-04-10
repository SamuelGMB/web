<?php 
include_once ('logica/conexion.php');
require 'logica/conexion.php';
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
      <title>Editar</title>
      <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->
      <script src="https://kit.fontawesome.com/23208e58b6.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="./estilos/nuevoprod_style.css">
      <script defer src="./js/responsive_nav-bar.js"></script>
   </head>
   <body>
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
        <form class="form" action="./logica/cambio.php" method="post" enctype="multipart/form-data">
          <div class="_ordForm">
            <div class="_div">
              <label for="nomArticulo">Nombra tu producto: </label>
              <?php
              echo "<input type='hidden' value='".$id_a."' name='idar'/>";
              echo "<input type='hidden' value='".$nom_a."' name='nomb' />";

              echo "<td> <input type='text' value='".$nom_a."' name='nom' /> </td>";
              ?>
            </div>
            <div class="_div">
              <label for="valArticulo">Escribe el valor del producto en pesos MXM: </label>
              <?php
               echo "<td> <input type='number' value='".$val_a."' name='val' /> </td>";
              ?>
            </div>
            <div class="_div _tipo">
              <label>Escoje el tipo de articulo:
                <?php
                echo "<div><input class='salto' type='radio' name='tart' class='form-input' value='juego'><i>Videojuego</i></div>
                      <div><input class='salto' type='radio' name='tart' class='form-input' value='consola'><i>Consola</i></div>
                      <div><input class='salto' type='radio' name='tart' class='form-input' value='accesorio'><i>Accesorio</i></div>";
                ?>
              </label>
              
            </div>
            <div class="_div">
              <label for="nomArticulo">Descripcion del producto: </label>
              <?php
              echo "<td> <input type='text' value='".$des_a."' name='des'  /> </td>"; 
              ?>
              </div>
          </div>
          <div class="_ordForm">
            <div class="_div _im">
              <label for="image" class="_sube_img">Sube una foto del producto:<!---->
              <div class="container-img">
              <?php echo '<img src="'.$fot_a.'" id="imagePrevisualizacion" style="width: 100%;height: 100%;">' ?>
              </div>
              </label>
              <label for="image" class="_sube_img _sube">
              <i class="fas fa-image"></i> Subir imagen
              </label>
              <input type="file" name="image" accept="image/*" id="image">
              <script src="./js/mostrar_img.js"></script>
            </div>
          </div>
          <?php
            echo "<input type='hidden' value= ".$_SESSION["ider"]." name='idus' />";
          ?>
          <div class="fin_form">
            <label for="subir_form" class="_sube_img _sube">
              <?php
            echo "<i class='fas fa-cloud-upload-alt'></i> Guardar edicion";
            ?>
            </label>
            <input type="submit" value="Subir" id="subir_form">
          </div>
        </form>
        <form class="form" action="./logica/eliminar.php" method="post" enctype="multipart/form-data">
          <?php
          echo "<input type='hidden' value='".$id_a."' name='idar'/>";
          ?>
          <div class="fin_form">
          <label for="borrar_form" class="_sube_img _sube">
              <i class="fas fa-eraser"></i> Eliminar articulo
          </label>
          <input type="reset" value="Borrar" id="borrar_form">
          </div>
        </form>
      </div>
      <section class="footer">
      
      </section>
    </body>
</html>
