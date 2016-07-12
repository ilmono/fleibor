<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
include 'includes.php';
$product =  new Producto();
$envases = $product->getEnvases();
$listadoProducto = $product->getProductos();
$colores = $product->getColores();

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
                <?php if(is_array($listadoProducto)){ ?>
                    <?php foreach($listadoProducto as $producto){
                        $strEnvase = '';
                        foreach($envases as $envase){
                            if($envase['id'] === $producto['envase']){
                                $strEnvase = $envase['nombre'];
                            }
                        }

                        ?>

                        <div class="widget widget-table action-table">
                            <!-- /widget-header -->
                            <div class="widget widget-table action-table">
                                <!-- /widget-header -->
                                <div class="widget-content" style="padding-top: 15px;">
                                    <div class="control-group">
                                        <div class="wraper-img">
                                            <img class="img-producto-crear-pedido" src="<?php if(empty($producto['img'])){echo 'img/logoweb2.jpg'; }else{echo $producto['img'];}?>">

                                        </div>
                                        <div class="list-product-item">
                                            <h3><?php echo $producto['nombre']?></h3>
                                            <?php if(!empty($producto['subtitulo'])){ ?>
                                                <h4><?php echo $producto['subtitulo']; ?></h4>
                                            <?php } ?>
                                            <p><b>Envase: </b> <?php echo $strEnvase; ?></p>
                                            <div>
                                                <?php
                                                $monbreColores = array();
                                                $coloresElegidos = $product->getRelaciones($producto['id'], 'producto_colores', 'id_producto');
                                                if(!empty($coloresElegidos)) {
                                                    foreach ($colores as $color) {
                                                        foreach ($coloresElegidos as $colorElegido)
                                                            if ($color['id'] === $colorElegido['id_color']) {
                                                                $monbreColores[] = $color;
                                                            }
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div id="container-product-<?php echo $producto['id']; ?>" class="ocultar">
                                                <?php $infoProduct = $product->renderOptionsMedidasPedidos($producto['id']); ?>
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="text-align: center; font-weight: bold;">
                                                                <?php if(!empty($coloresElegidos)) { ?><td colspan="2">Color</td><?php } ?>
                                                                <td> Medida </td>
                                                                <td> Empaque </td>
                                                                <td> Cantidad </td>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                            if(!empty($coloresElegidos)) {
                                                                foreach($monbreColores as $color){ ?>
                                                                    <tr>
                                                                        <td style="background-color: <?php echo $color['codigo']; ?>; width: 20px; height: 20px"></td>
                                                                        <td> <?php echo $color['nombre']; ?> </td>
                                                                        <td> <?php echo $infoProduct['medidas']; ?> </td>
                                                                        <td id="empaque-pedido-<?php echo $producto['id']; ?>">  <?php echo $infoProduct['unidades']; ?> </td>
                                                                        <td> <input type="number" class="span1" id="subtitulo" name="subtitulo" min="0" value=""> </td>
                                                                    </tr>
                                                                <?php }
                                                           }else{ ?>
                                                                <tr>
                                                                <td> <?php echo $infoProduct['medidas']; ?> </td>
                                                                <td id="empaque-pedido-<?php echo $producto['id']; ?>">  <?php echo $infoProduct['unidades']; ?> </td>
                                                                <td> <input type="number" class="span1" id="subtitulo" name="subtitulo" min="0" value=""> </td>
                                                                </tr>
                                                           <?php } ?>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button id="opciones-product-<?php echo $producto['id']; ?>" type="submit" class="btn btn-invert option-to-cart">Ver opciones</button>
                                        <button id="product-<?php echo $producto['id']; ?>" type="submit" class="btn btn-primary add-to-cart ocultar">Agregar al carrito</button>
                                    </div> <!-- /form-actions -->
                                </div>
                                <!-- /widget-content -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                    <?php }?>
                <?php }?>
            </div>

        </div>
        <?php include("includes/script.php"); ?>
    </body>
</html>