<?php
   session_start();
   include_once('logica/conexion.php');
   if(isset($_SESSION["user"]))
   {
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8"/>
  <title>Agregar articulo</title>
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
            <a href="#" class="_nav-menu-link _nav-link">Publicar</a>
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
    <?php/*
      echo "¿Que articulo deseas agregar ".$_SESSION["user"]."?";*/
    ?>
    </br></br></br>
    <div class="contain-carousel">
    <form class="form" action="./logica/insertarprod.php" method="post" enctype="multipart/form-data">
      <div class="_ordForm">
        <div class="_div">
          <label for="nomArticulo">Nombra tu producto: </label>
          <input type="text" name="nom" required="required" id="nomArticulo">
        </div>
        <div class="_div">
          <label for="valArticulo">Escribe el valor del producto en pesos MXM: </label>
          <input type="number" name="val" required="required" id="valArticulo">
        </div>
        <div class="_div _tipo">
          <label>Escoje el tipo de articulo:</label>
          <div><input class="salto" type="radio" name="tart" class="form-input" value="juego"><i>Videojuego</i></div>
          <div><input class="salto" type="radio" name="tart" class="form-input" value="consola"><i>Consola</i></div>
          <div><input class="salto" type="radio" name="tart" class="form-input" value="accesorio"><i>Accesorio</i></div>
        </div>
        <div class="_div">
          <label for="nomArticulo">Descripcion del producto: </label>
          <input type="text" name="des" required="required" id="desArt">
        </div>

      </div>
      <div class="_ordForm">
        <div class="_div _im">
          <label for="image" class="_sube_img">Sube una foto del producto:<!---->
          <div class="container-img">
            <img src="./images/camara.png" id="imagePrevisualizacion" style="width: 100%;height: 100%;">
          </div>
          </label>
          <label for="image" class="_sube_img _sube">
            <i class="fas fa-image"></i> Subir imagen
          </label>
          <input type="file" name="image" accept="image/*" required="required" id="image">
          <script src="./js/mostrar_img.js"></script>
        </div>
      </div>

      <?php
        echo "<input type='hidden' value= ".$_SESSION["ider"]." name='idus' />";
      ?>
      <div class="fin_form">
          <label for="subir_form" class="_sube_img _sube">
            <i class="fas fa-cloud-upload-alt"></i> Guardar publicación
          </label>
          <input type="submit" value="Subir" id="subir_form">
          <label for="borrar_form" class="_sube_img _sube">
            <i class="fas fa-eraser"></i> Cancelar
          </label>
          <input type="reset" value="Borrar" id="borrar_form">
      </div>
      </form>
      </div>
    <!--<a href="site.php" target="_self">Regresar</a>-->
    <section class="footer">
      
    </section>
   </body>
</html>
<?php
}
else
{
  echo "No tienes acceso";
}
?>
