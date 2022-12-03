<?php
session_start();
//Si el usuario esta logueado, ¿que hace aqui? Lo echamos.
if(isset($_SESSION['usuario'])){
    echo "<p>¿Que haces aqui?</p>";
    echo "<li><a href='login.php'>Pulsa aqui para iniciar sesión/a></li>";
}

require 'lib/gestionUsuarios.php';

if ($_POST) {
    $errores = registroUsuario(
        isset($_POST['usuario']) ? $_POST['usuario'] : '',
        isset($_POST['clave']) ? $_POST['clave'] : '',
        isset($_POST['repite_clave']) ? $_POST['repite_clave'] : ''
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
</head>
<body>
    <header>
        <h1>Sistema de autenticación</h1>
    </header>
    <main>
        <h1>Regístrate</h1>
    <?php if(!$_POST || ($_POST && $errores)) { ?>    
        <form action="registro.php" method="post">
            <p>
                <label for="usuario">Nombre de usuario</label><br>
                <input type="text" name="usuario" id="usuario" 
                value="<?php echo $_POST && isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : '' ?>">
                <?php
                if (isset($errores) && isset($errores['usuario'])) {
                    echo "<p>{$errores['usuario']}</p>";
                } 
                ?>
            </p>
            <p>
                <label for="clave">Contraseña</label><br>
                <input type="password" name="clave" id="clave"
                value="<?php echo $_POST && isset($_POST['clave']) ? $_POST['clave'] : '' ?>">
                <?php
                if (isset($errores) && isset($errores['clave'])) {
                    echo "<p>{$errores['clave']}</p>";
                } 
                ?>
            </p>
            <p>
                <label for="repite_clave">Repite la contraseña</label><br>
                <input type="password" name="repite_clave" id="repite_clave"
                value="<?php echo $_POST && isset($_POST['repetir_clave']) ? $_POST['repetir_clave'] : '' ?>">
                <?php
                if (isset($errores) && isset($errores['repite_clave'])) {
                    echo "<p>{$errores['repite_clave']}</p>";
                } 
                ?>
            </p>
            <p>
                <input type="submit" value="Registrarse">
            </p>
        </form> 
        <?php 
        } else {
            echo "<p>Te has registrado correctamente</p>";
            echo "<li><a href='login.php'>Pulsa aqui para hacer login</a></li>";
        }
           
        ?>
    </main>

    <footer>
        <small>&copy; sitio web</small>
    </footer>
</body>
</html>
