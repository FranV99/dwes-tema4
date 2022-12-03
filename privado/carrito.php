<?php
session_start();

if(!isset($_SESSION['usuario'])){
    echo "<p>¿Que haces aqui?</p>";
    echo "<li><a href='login.php'>Pulsa aqui para iniciar sesión</a></li>";
}
require '../bd/modelo.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de la compra</title>
</head>
<body>
    <header>
        <h1>SuperCarrito Shop</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><strong>Carrito (<?= totalProductos() ?>)</strong></li>
            <li><a href="logout.php">Cerrar sesión</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h1>Cesta de la compra</h1>
            
            <?php
            if ($_SESSION) {
                echo "<ul>";
                foreach ($_SESSION as $producto => $cantidad) {
                    echo <<<END
                        <li>$producto: $cantidad</li>
                    END;
                }
                echo "</ul>";
            } else {
                echo "<p>No hay productos en el carrito de la compra</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <small><em>&copy; El SuperCarrito de la compra</em></small>
    </footer>
</body>
</html>
