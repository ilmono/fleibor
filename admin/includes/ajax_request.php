<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }
    include '../includes.php';
    $html = '';

    switch ($_GET['action']) {
        case 'getSelectPermisos':
            $user = new User();
            $html = $user->selectPermisos($_GET["categoria"]);
            break;
        case 'getSelectEnvaseMedidas':
            $product = new Producto();
            $html = $product->getCheckMedidas($_GET["envase"]);
            break;
        case 'getSelectMedidaUnidades':
            $product = new Producto();
            $html = $product->getCheckUnidades($_GET["medida"]);
            break;
        case 'getMedidasByEnvase':
            $product = new Producto();
            $html = $product->renderOptionsProductByEnvase($_GET["envase"], 0);
            break;
        case 'getSelectUnidadesPedidos':
            $product = new Producto();
            $html = $product->renderOptionsUnidadesPedidos($_GET["id_producto"], $_GET["id_medida"]);
            break;
    }
    echo $html;

