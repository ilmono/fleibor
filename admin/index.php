<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
include 'includes.php';
$pedidos = new Pedido();
$listaPedidos = $pedidos->getPedidos();

if(!in_array($_SESSION['permisos'], array(1, 2, 3))){
    header("Location: mis-pedidos.php");
}
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
        <!-- /widget -->
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Listado de Pedidos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Rozon Social</th>
                        <th>Estado</th>
                        <th class="td-actions">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($listaPedidos)){ foreach($listaPedidos as $pedido){ ?>
                        <tr>
                            <td><?php echo $pedido['fecha']?></td>
                            <td><?php echo $pedido['usuario']?></td>
                            <td><?php echo $pedido['estado']?></td>
                            <td class="td-actions">
                                <a href="pedido-ver.php?pedido=<?php echo $pedido['id']?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-search"> </i></a>
                            </td>
                        </tr>

                    <?php }} ?>
                    </tbody>
                </table>
            </div>
            <!-- /widget-content -->
        </div>
    </div>
</div>
<?php include("includes/script.php"); ?>
</body>
</html>