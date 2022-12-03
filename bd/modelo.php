<?php

echo "<p>¿Que haces aqui?</p>";
echo "<li><a href='login.php'>Pulsa aqui para iniciar sesión/a></li>";




$productos = [
    ['id' => 'pan', 'valor' => 'Pan'],
    ['id' => 'aceite', 'valor' => 'Aceite'],
    ['id' => 'platano', 'valor' => 'Plátano'],
    ['id' => 'arroz', 'valor' => 'Arroz']
];

function totalProductos(): int {
    $numero = 0;
    if ($_SESSION) {
        foreach ($_SESSION as $cantidad) {
            $numero += intval($cantidad);
        }
    }
    return $numero;
}

?>
