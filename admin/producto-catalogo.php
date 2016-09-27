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
$gustos = $product->getGustos();

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
                                                $gustosElegidos = $product->getRelaciones($producto['id'], 'producto_gustos', 'id_producto');
                                                if(!empty($coloresElegidos)) {
                                                    $monbreColores = array();
                                                    foreach ($colores as $color) {
                                                        foreach ($coloresElegidos as $colorElegido)
                                                            if ($color['id'] === $colorElegido['id_color']) {
                                                                $monbreColores[] = $color;
                                                            }
                                                    }
                                                }
                                                if(!empty($gustosElegidos)) {
                                                    $nombreGustos = array();
                                                    foreach ($gustos as $gusto) {
                                                        foreach ($gustosElegidos as $gustoElegido)
                                                            if ($gusto['id'] === $gustoElegido['id_gusto']) {
                                                                $nombreGustos[] = $gusto;
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
                                                                <?php if(!empty($gustosElegidos)) { ?><td>Gustos</td><?php } ?>
                                                                <td> Medida </td>
                                                                <td> Empaque </td>
                                                            </tr>
                                                        </thead>
                                                        <?php
                                                            if(!empty($coloresElegidos)) {
                                                                foreach($monbreColores as $color){ ?>
                                                                    <tr id="product-<?php echo $producto['id']; ?>-color-<?php echo $color['id']; ?>">
                                                                        <?php if($color['codigo'] != '#grad'){?>
                                                                            <td><input type="hidden" class="color-id" value="color-<?php echo $color['id']; ?>"/><div id="<?php echo $color['id']; ?>" style="background-color: <?php echo $color['codigo']; ?>; width: 20px; height: 20px; border-radius: 10px; <?php if(strtoupper($color['codigo']) == "#FFFFFF"){ echo 'border: solid 1px;';}?>"></div></td>
                                                                        <?php }else{?>
                                                                            <td><input type="hidden" class="color-id" value="color-<?php echo $color['id']; ?>"/><div id="<?php echo $color['id']; ?>" class="grad" style="width: 20px; height: 20px; border-radius: 10px"></div></td>
                                                                        <?php }?>
                                                                        <td> <?php echo $color['nombre']; ?> </td>
                                                                        <td class="td-select-medida"> <?php echo $infoProduct['medidas']; ?> </td>
                                                                        <td class="td-select-unidades" id="empaque-pedido-producto-<?php echo $producto['id']; ?>-color-<?php echo $color['id']; ?>">  <?php echo $infoProduct['unidades']; ?> </td>
                                                                    </tr>
                                                                <?php }
                                                           }else if(!empty($gustosElegidos)){
                                                                foreach($nombreGustos as $gusto){ ?>
                                                                    <tr id="product-<?php echo $producto['id']; ?>-gusto-<?php echo $gusto['id']; ?>">
                                                                        <td id="gusto-<?php echo $gusto['id']; ?>"> <input type="hidden" class="gusto-id" value="gusto-<?php echo $gusto['id']; ?>"/><?php echo $gusto['nombre']; ?> </td>
                                                                        <td class="td-select-medida"> <?php echo $infoProduct['medidas']; ?> </td>
                                                                        <td class="td-select-unidades" id="empaque-pedido-producto-<?php echo $producto['id']; ?>-color-<?php echo $gusto['id']; ?>">  <?php echo $infoProduct['unidades']; ?> </td>
                                                                    </tr>
                                                                <?php }
                                                           }else{ ?>
                                                                <tr id="product-<?php echo $producto['id']; ?>">
                                                                    <td class="td-select-medida"> <?php echo $infoProduct['medidas']; ?> </td>
                                                                    <td class="td-select-unidades" id="empaque-pedido-<?php echo $producto['id']; ?>">  <?php echo $infoProduct['unidades']; ?> </td>
                                                                </tr>
                                                           <?php } ?>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button id="opciones-product-<?php echo $producto['id']; ?>" type="submit" class="btn btn-invert option-to-cart">Ver opciones</button>
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