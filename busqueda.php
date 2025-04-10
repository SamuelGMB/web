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
    <title>Buscar</title>
    <script src="https://kit.fontawesome.com/23208e58b6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./estilos/style_busca.css">
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
            <a href="#" class="_nav-menu-link _nav-link">Buscar</a>
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
        <div class="_contain-busqueda">
            <h1 > Buscar articulos </h1>
            <input type="text" id="formulario" class="form-control">
            <button class="btn btn-info" id="boton">Buscar</button>
        </div>
        <div class="_contain-articles" id="resultado">
        </div>
    </section>
    <?php
    if (!function_exists('json_encode'))
    {
        function json_encode($a=false)
        {
            if (is_null($a)) return 'null';
            if ($a === false) return 'false';
            if ($a === true) return 'true';
            if (is_scalar($a))
            {
                if (is_float($a))
                {
                    // Always use "." for floats.
                    return floatval(str_replace(",", ".", strval($a)));
                }
    
                if (is_string($a))
                {
                    static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
                    return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
                }
                else
                return $a;
            }
            $isList = true;
            for ($i = 0, reset($a); $i < count($a); $i++, next($a))
            {
                if (key($a) !== $i)
                {
                    $isList = false;
                    break;
                }
            }
            $result = array();
            if ($isList)
            {
                foreach ($a as $v) $result[] = json_encode($v);
                return '[' . join(',', $result) . ']';
            }
            else
            {
                foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
                return '{' . join(',', $result) . '}';
            }
        }
    }
    ?>
    
    <script>
    // 'productos' es un array de dos dimensiones [][]. Si te das cuenta ocupe
    // la misma consulta que tenias para tu tabla, no ocupas entenderla mas alla de que
    // se obtienen los datos de la BD y lo estoy poniendo en un array de JS.
    // El primer indice indica el producto [0], [1], [2], etc.
    // El segundo indice indica el dato en particular de cada producto:
    // [0] = nombre del producto
    // [1] = valor del producto
    // [2] = descripcion del producto
    // [3] = descripcion del producto
    var productos = <?php 
        $consulta=mysqli_query($conexion,"select * from articulo where id_usuario!=".$_SESSION['ider']);
        $arrayProductos = array();
        while($stock=mysqli_fetch_array($consulta,MYSQLI_NUM)) { 
            $tempArrayThisProduct = array();
            array_push($tempArrayThisProduct, $stock[0], $stock[1], $stock[2], $stock[3], $stock[4], $stock[5], $stock[6]); 
            array_push($arrayProductos, $tempArrayThisProduct);
            unset($tempArrayThisProduct);
        }    
        echo json_encode($arrayProductos);
    ?>;

    // 'formulario' es la parte que rellena el usuario, el termino que quiere buscar pues.
    // 'boton' es un boton opcional de busqueda, realmente es si lo quieres colocar o no igual funciona.
    // 'resultado' es lo que se va a filtrar y actualizar conforme el usuario actualize el valor de 'formulario'.
    const formulario = document.querySelector('#formulario');
    const boton = document.querySelector('#boton'); 
    const resultado = document.querySelector('#resultado');
    
    // 'filtrar' hace el filtrado comparando lo que inserta el usuario en 'formulario' con los valores de los
    // productos. 
    const filtrar = ()=>{
        
        // Es un reinicio para cada mantener limpio el resultado cuando se llame la funcion
        resultado.innerHTML = '';
        const texto = formulario.value.toLowerCase();
        // El for entra en el primer indice y los recorre todos. A cada uno checa su nombre y hace la comparacion
        for (let producto of productos) {
            console.log(producto[2]);
            let busca = producto[2].toLowerCase();
            // Si aqui quieres obtener algun dato ya que estas dentro del primer indice solo pon el valor que quieras del segundo indice:
            // [0] = nombre del producto
            // [1] = valor del producto
            // [2] = descripcion del producto
            // [3] = Imagen del producto
            // Por ejemplo para el valor seria: let valor = producto[1];
            if (busca.indexOf(texto) !== -1) {
                    resultado.innerHTML += ` 
                      <div class='_contain_articles-form'>
                        <form class='form' action='./compra1.php' method='post' enctype='multipart/form-data'>
                          <input type='hidden' value='${producto[0]}' name='idar' />
                          <input type='hidden' value='${producto[1]}' name='idus' />
                          <div class='_article'>
                            <div class='_img_article'> <input type='hidden' value='${producto[6]}' name='foto'/> <img class='_articulo' src="${producto[6]}" alt='Imagen del producto'/> </div>
                              <div class='_dato_article'>
                                <label class='_info'> <input type='hidden' value='${producto[2]}' name='nomb'/>Nombre del articulo: ${producto[2]}</label>
                                <label class='_info'> <input type='hidden' value='${producto[3]}' name='val'/>Valor: ${producto[3]} MXN</label>
                                <label class='_info'> <input type='hidden' value='${producto[4]}' name='des'/>Descripción: ${producto[4]}</label>
                                <label class='_info'> <input type='hidden' value='${producto[5]}' name='tart'/>Tipo: ${producto[5]}</label>
                                <input class='_info input_article' type='submit' value='Ver mas'> 
                              </div>
                          </div>
                        </form>
                      </div>`;
            }
        }

        if (resultado.innerHTML === '') {
            resultado.innerHTML += `<li>Producto no encontrado</>`;
            }
        }
        
        // Listener del boton en caso de que lo pongas o no
        boton.addEventListener('click', filtrar);
        // listener del campo del formulario, se actualiza cada que el usuario teclea
        formulario.addEventListener('keyup', filtrar);
        
        // Se llama a 'filtrar' desde un principio para que se listen todos los productos.
        filtrar();
    </script>
    <section class="footer">

    </section>
</body>
</html>
<?php
} else {
    header("Location: index.html");
}
?>