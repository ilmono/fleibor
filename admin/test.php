<?php
echo '<pre>';
include 'includes.php';
$product = new Producto();
$medidas = $product->renderOptionsProductByEnvase(2);

echo '</pre>';