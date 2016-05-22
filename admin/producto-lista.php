<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
include 'includes.php';
$product =  new Producto();
$listadoProducto = $product->getProductos();
if(isset($_POST['id'])){
    if($product->deleteProducto($_POST['id'])){
        header("Location: producto-lista.php");
    }
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
                <h3>Lista de Productos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div>
                    <div id="test-modal" class="mfp-hide white-popup-block">
                        <p>Esta seguro que quiere borrar al producto <span id="modal-text"></span></p>
                        <p>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="id" id="usr-id-del" value="">
                            <input class="btn btn-small btn-danger" type="submit" name="btn-guardar" value="Borrar">
                        </form>
                        <a href="#" class="btn btn-warning btn-small popup-modal-dismiss">Cancelar</a>
                        </p>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="td-actions">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($listadoProducto)){ ?>
                        <?php foreach($listadoProducto as $nombre => $familias){ ?>
                            <tr><td class="widget-header" colspan="2"><h2><?php echo $nombre?></h2></td></tr>
                                <?php foreach($familias as $producto){ ?>
                                    <tr>
                                        <td id="nombre-<?php echo $producto['id']?>"><?php echo $producto['nombre']?></td>
                                        <td class="td-actions">
                                            <a href="producto-ver.php?producto=<?php echo $producto['id']?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-search"> </i></a>
                                            <a id="<?php echo $producto['id']?>" href="#test-modal" class="btn btn-danger btn-small borrar-usuario"><i class="btn-icon-only icon-remove"> </i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                        <?php } ?>
                    <?php } ?>
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