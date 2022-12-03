<?php 
session_start();

if(isset($_SESSION['usuario'])){
    header('location: index.php', true, 302);
    exit();

} 

require 'lib/gestionUsuarios.php';

if ($_POST){
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';

    $esOk = loginUsuario($usuario,$clave);

    if ($esOk) {
        $_SESSION['usuario'] = $usuario;
        header('location: index.php');
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de autenticación</title>
</head>
<body>
    <header>
        <h1>Sistema de autenticación</h1>
    </header>
    <main>
        <h1>Inicia sesión</h1>

        <?php
        if ($_POST) {
            echo "<p>Usuario y/o contraseña no válidos</p>";
        }
        ?>

        <form action="login.php" method="post">
            <p>
                <label for="usuario">Nombre de usuario</label><br>
                <input type="text" name="usuario" id="usuario"
                value="<?php echo $_POST && isset($_POST['usuario']) ? $_POST['usuario'] : ''; ?>">
            </p>
            <p>
                <label for="clave">Contraseña</label><br>
                <input type="password" name="clave" id="clave">
            </p>
            <p>
                <input type="submit" value="Inicia sesión">
            </p>
        </form>
    </main>

    <footer>
        <small>&copy; sitio web</small>
    </footer>
</body>
</html>
