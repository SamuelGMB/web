<?php
session_start();
include_once ('logica/conexion.php');
require 'logica/conexion.php';
$user = $_SESSION['user'];
if (isset($user)) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Juccs</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/23208e58b6.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./estilos/style_site.css">
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
            <a href="#" class="_nav-menu-link _nav-link">Inicio</a>
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
    <section class="contain-carousel">
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicadores para saber que imagen esta activa -->
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- Deslizamiento -->
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./images/site_img1.jpg" alt="Image 1" class="d-block _img-carousel img-fluid" style="width:100%;height:85vh">
            <div class="carousel-caption">
            <h3>Conocenos</h3>
            <p>Nuestro servicio y productos</p>
            </div>  
        </div>
        <div class="carousel-item">
            <img src="./images/site_img2.jpg" alt="Image 1" class="d-block _img-carousel img-fluid" style="width:100%;height:85vh">
            <div class="carousel-caption">
            <h3>Publica un articulo</h3>
            <p>Dale una segunda vida a tus articulos !vendiendolos¡</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./images/site_img3.jpg" alt="Image 1" class="d-block _img-carousel img-fluid" style="width:100%;height:85vh">
            <div class="carousel-caption">
            <h3>Compra un articulo</h3>
            <p>Mira lo que tenemos para ofrecerte</p>
            </div> 
        </div>
        </div>

        <!-- Izquierda_Derecha/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        </button>
        </div>
    </section>
    <section class="_contain-articles">
        <h1 class="_contain-articles-title">Articulos</h1>
            <?php
                $consulta=mysqli_query($conexion,"SELECT * from articulo where NOT tipo_articulo = 'agotado' && id_usuario!=".$_SESSION['ider']."");

                while($stock=mysqli_fetch_array($consulta,MYSQLI_NUM))
                {
                    echo" 
                    <div class='_contain_articles-form'>
                    <form class='form' action='./compra1.php' method='post' enctype='multipart/form-data'>
                    
                         <input type='hidden' value='".$stock[0]."' name='idar' />
                         <input type='hidden' value='".$stock[1]."' name='idus' />
                         <div class='_article'>
                            <div class='_img_article'> <input type='hidden' value='".$stock[6]."' name='foto'/> <img class='_articulo' src=".$stock[6]." alt='Imagen del producto'/> </div>
                            <div class='_dato_article'>
                                <label class='_info'> <input type='hidden' value='".$stock[2]."' name='nomb'/> Nombre del articulo: ".$stock[2]."</label>
                                <label class='_info'> <input type='hidden' value='".$stock[3]."' name='val'/> Valor: ".$stock[3]." MXN</label>
                                <label class='_info'> <input type='hidden' value='".$stock[4]."' name='des'/>Descripción: ".$stock[4]."</label>
                                <label class='_info'> <input type='hidden' value='".$stock[5]."' name='tart'/>Tipo: ".$stock[5]."</label>
                                <input class='_info input_article' type='submit' value='Ver mas'>
                                
                            </div>
                         </div>
                         </form></div>";
                }
                
            ?>
    </section>

    <section class="footer">

    </section>
    <!--<a class="usuario" href="#"><?php /*echo $user*/?></a>-->
    </body>
    </html>
<?php
} else {
    header("Location: index.html");
}
?>