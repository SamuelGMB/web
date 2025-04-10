<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register site</title>
    <link rel="stylesheet" href="./estilos/registro_style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="fondo"></div>
    <div class="fondo2"></div>
    <div class="fondo3"></div>
    <div class="fondo4"></div>
    <header>
        <div class="logo-container">
            <h2 class="logo">JUUCS</h2>
        </div>
    </header>
    <div class="registro">
        <h1>Ingresa los siguientes datos</h1>
        <form class="formulario" action="" method="POST">
            <label for="userInput"> Nombre de usuario: </label> 
            <br>
            <input type="text" id="userInput" name="newUser" required="required">
            <br>
            <label for="emailInput"> Correo electronico: </label>
            <br>
            <input type="email" id="emailInput" name="newEmail" required="required">
            <br>
            <label for="passInput"> Contraseña: </label> 
            <br>
            <input type="password" id="passInput" name="newPassword" required="required">
            <br><br>
            <button type="submit" name="btnSubmit"> Enviar </button>
        </form>
        
        <?php
        include_once './logica/conexion.php';

        if (isset($_POST["btnSubmit"])){ 
            $newUser = $_POST['newUser'];
        $newEmail = $_POST['newEmail'];
        $newPassword = $_POST['newPassword'];
        
        $queryStructureLookForUser = 
        "SELECT correo
         FROM usuario
         WHERE correo = '$newEmail'";
        
        
        $checkIfUserExists = mysqli_query($conexion, $queryStructureLookForUser);
        
        if (mysqli_num_rows($checkIfUserExists) == 0) {
            $queryStructureNewUser = 
            "INSERT INTO usuario (nom_usuario, correo, contrasenia)
            VALUES ('$newUser', '$newEmail', '$newPassword')";
        
            $insertNewUser = mysqli_query($conexion, $queryStructureNewUser);
        
            if ($insertNewUser) {
                echo '<script>
                        swal("Bien!", "Se ha registrado con exito, intente entrar a su cuenta", "");
                      </script>;';
            } else {
                echo '<script>
                        swal("Error al registrarse.", "Intente nuevamente", "");
                      </script>;';
            }
        } else {
            echo '<script>
                        swal("El correo electronico que insertaste ya esta en uso", "Intente nuevamente", "");
                      </script>;';
        }
        }
        
        
        ?>
        <p> ¿Ya tienes una cuenta? </p>
        <a href='index.html'> Volver </a>
    </div>
</body>
</html>
