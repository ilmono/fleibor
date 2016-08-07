<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
include 'includes.php';
$pedidos = new Pedido();
$pedido = $pedidos->getPedido($_GET['pedido']);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Admin - Fleibor Website</title>
        <meta name="Fleibor Website" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <?php include("includes/style.php"); ?>
    </head>
    <body>
        <?php include("includes/header.php"); ?>
        <?php include("includes/menu-admin.php"); ?>
        <!-- /subnavbar -->
        <div class="main">
            <div class="container">
                <div class="widget widget-table action-table">
                    <div class="widget widget-table action-table">
                        <div class="widget-content" style="padding-top: 15px;">
                            <div class="control-group">
                                <div style="margin-left: 50px;">
                                    <p><b>Fecha: </b><?php echo $pedido['fecha']?></p>
                                    <p><b>Estado: </b><?php echo $pedido['estado']?></p>
                                    <p><b>Comentario: </b><?php echo $pedido['comentario']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $pedido['cart']?>
            </div>
        </div>
        <?php include("includes/script.php"); ?>
    </body>
</html>
