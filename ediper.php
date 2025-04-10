<?php 
session_start();
include_once ('logica/conexion.php');
require 'logica/conexion.php';  
?>
<html>
   <head>
      <meta charset="utf-8"/>
      <title>Editar perfil</title>
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
        <form class="form" action="./logica/percambio.php" method="post" enctype="multipart/form-data">
          <div class="_ordForm">
            <div class="_div">
              <label for="nomu">Cambiar nombre de usurario: </label>
              <?php
              $trae_usuario = mysqli_query($conexion,"select * from usuario where id_usuario=".$_SESSION['ider']);
              echo "<input type='hidden' value='".$_SESSION['ider']."' name='nomb' />";

              echo "<td> <input type='text' value='".$_SESSION['user']."' name='nom' /> </td>";
              ?>
            </div>
            <div class="_div">
              <label for="corr">Correo: </label>
              <?php
              echo "<td> <input type='email' value='".$_SESSION['email']."' name='ema' required='required' readonly/> </td>"; 
              ?>
              </div>
              <div class="_div">
                <label for="cont">Cambiar contraseña: </label>
                <?php
                echo "<td> <input type='text' value='".$_SESSION['password']."' name='con'  /> </td>"; 
                ?>
              </div>
              <div class="_div">
                <label for="dire">Cambiar direccion de envio: </label>
                <?php
                echo "<td> <input type='text' value='".$_SESSION['direccion']."' name='dir'  /> </td>"; 
                ?>
              </div>
              <div class="_div">
              <label for="numu">Cambiar numero de telefono: </label>
                <?php
                echo "<input type='number' value='".$_SESSION['num_contacto']."' name='tel' />";
                
              ?>  
              </div>
            
          </div>
          <div class="_ordForm">
            <div class="_div _im">
              <label for="image" class="_sube_img">Sube una foto de perfil:<!---->
              <div class="container-img">
                <img src="./images/camara.png" id="imagePrevisualizacion" style="width: 100%;height: 100%;">
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
            echo "<i class='fas fa-cloud-upload-alt'></i> Guardar perfil";
            ?>
            </label>
            <input type="submit" value="Subir" id="subir_form">
            <label for="borrar_form" class="_sube_img _sube">
            <i class="fas fa-eraser"></i> Cancelar
            </label>
            <input type="reset" value="Borrar" id="borrar_form">
          </div>
        </form>
        <?php
        echo "</form>";
        ?>
      </div>

      <section class="footer">
      
      </section>
    </body>
</html>