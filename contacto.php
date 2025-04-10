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
    <title>Contacto</title>
    <script src="https://kit.fontawesome.com/23208e58b6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./estilos/style_contacto.css">
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
            <a href="#" class="_nav-menu-link _nav-link">Contacto</a>
          </li>
          <li class="_nav-menu-item">
            <a href="./perfil.php" class="_nav-menu-link _nav-link _nav-menu-link_active">Mi perfil</a>
          </li>
        </ul>
      </nav>
    </header>
    <section class="contain-carousel">
      <a class="_info-cont" >UNIVERSIDAD AUTONOMA DE MEXICO FACULTAD DE ESTUDIOS SUPERIORES CUAUTITLAN </a>
      <a href="https://www.facebook.com/" class="_info-cont _link-cont" >ESCLAVOS DEL CONOCIMIENTO</a>
      <a class="_info-cont" >SEMINARIO DE COMERCIO ELECTRONICO</a>
      <a class="_info-cont" >INTEGRANTES DEL EQUIPO:</a>
      <a href="https://www.facebook.com/" class="_info-cont _link-cont" >SAMUEL GERARDO MEJIA BALDERAS</a>
      <a href="https://www.facebook.com/" class="_info-cont _link-cont" >MATA CID KEVIN LEVI</a>
      <a href="https://www.facebook.com/Jonathan.CJMC" class="_info-cont _link-cont" >SALAZAR VAZQUEZ DIEGO ANTONIO</a>
      <a href="https://www.facebook.com/" class="_info-cont _link-cont" >VALDEZ GUILLEN IAN ADAIR</a>
      <a href="https://www.facebook.com/" class="_info-cont _link-cont" >HERNANDEZ MARTINEZ KEVIN GABRIEL</a>
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