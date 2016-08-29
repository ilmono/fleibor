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
        case 'addItemPedido':
            $pedido = new Pedido();
            $html = $pedido->addItem($_GET["data"]);
            break;
        case 'getCartHtml':
            $pedido = new Pedido();
            $html = $pedido->getCartHtml($_SESSION['cart'], true);
            break;
        case 'clearCart':
            $pedido = new Pedido();
            $html = $pedido->clearCart();
            break;
        case 'removeProduct':
            $pedido = new Pedido();
            $result = $pedido->removeProduct($_GET["key"]);
            if($result > 0 ){
                $html = $pedido->getCartHtml($_SESSION['cart'], true);
            }else if($result == 0 ){
                $html = '';
            }
            break;
        case 'removeSubProduct':
            $pedido = new Pedido();
            $result = $pedido->removeSubProduct($_GET["key"], $_GET["subKey"]);
            if($result > 0 ){
                $html = $pedido->getCartHtml($_SESSION['cart'], true);
            }else if($result == 0 ){
                $html = '';
            }
            break;
        case 'realizarPedido':
            $html = false;
            $pedido = new Pedido();
            $result = $pedido->agregarPedido($_SESSION['usuario'], $_SESSION['cart'], $_GET['comentario']);
            if($result == true){
                $pedido->clearCart();
                $html = true;
            }
            break;
    }
    echo $html;

