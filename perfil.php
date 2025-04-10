<?php
   session_start();
   include_once('logica/conexion.php');
   if(isset($_SESSION["user"]))
   {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->
    <script src="https://kit.fontawesome.com/23208e58b6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./estilos/style_profile.css">
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
            <a href="./ediper.php" class="_nav-menu-link _nav-link _nav-menu-link_active">Editar perfil</a>
          </li>
          <li class="_nav-menu-item">
            <a href="./logica/logout.php" class="_nav-menu-link _nav-link _nav-menu-link_active" target="_self">Salir</a>
          </li>
        </ul>
      </nav>
    </header>
    <section class="contain-carousel">
        <?php
          $trae_usuario = mysqli_query($conexion,"select * from usuario where id_usuario=".$_SESSION['ider']);
         
          echo '<div class="perfil-img">
                  <img class="perfil" src="'.$_SESSION["foto"].'" alt="imagen de perfil" style="width: 250px; height: 250px;">
                  <p class="inf-contacto">'.$_SESSION["email"].'</p>
                  <p class="inf-contacto">'.$_SESSION["num_contacto"].'</p>
                </div> 
                <div class="_separador"></div>
                <div class="perfil-info">
                  <h1 class="info">'.$_SESSION["user"].'</h1>
                  <p class="info">Info sobre la persona</p>
                  <p class="info"></p>
                  <p class="info">'.$_SESSION["direccion"].'</p>
                  <p class="info">Publicaciones realizadas</p>
                  <section class="_contain-articles">';
              
                  $consulta=mysqli_query($conexion,"select * from articulo where id_usuario=".$_SESSION['ider']);

                  while($stock=mysqli_fetch_array($consulta,MYSQLI_NUM))
                  {
                      echo" 
                      <div class='_contain_articles-form'>
                        <form class='form' action='./editar.php' method='post' enctype='multipart/form-data'>
                          <input type='hidden' value='".$stock[0]."' name='idar' />
                          <input type='hidden' value='".$stock[1]."' name='idus' />
                          <div class='_article'>
                            <div class='_img_article'> <input type='hidden' value='".$stock[6]."' name='foto'/> <img class='_articulo' src=".$stock[6]." alt='Imagen del producto'/> </div>
                              <div class='_dato_article'>
                                <label class='_info'> <input type='hidden' value='".$stock[2]."' name='nomb'/>Nombre del articulo: ".$stock[2]."</label>
                                <label class='_info'> <input type='hidden' value='".$stock[3]."' name='val'/>Valor: ".$stock[3]." MXN</label>
                                <label class='_info'> <input type='hidden' value='".$stock[4]."' name='des'/>Descripción: ".$stock[4]."</label>
                                <label class='_info'> <input type='hidden' value='".$stock[5]."' name='tart'/>Tipo: ".$stock[5]."</label>
                                <input class='_info input_article' type='submit' value='Editar o borrar'> 
                              </div>
                          </div>
                        </form>
                      </div>";

                    }
                    
                ?>
              </section>

        </div>
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