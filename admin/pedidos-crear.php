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
                                        <div class="span3" style="height: 100px ">
                                        <p>Imagen del producto</p>
                                        </div>
                                        <div class="list-product-item">
                                            <h3><?php echo $producto['nombre']?></h3>
                                            <?php if(!empty($producto['subtitulo'])){ ?>
                                                <h4><?php echo $producto['subtitulo']; ?></h4>
                                            <?php } ?>
                                            <p><b>Envase: </b> <?php echo $strEnvase; ?></p>
                                            <?php if(!empty($coloresElegidos)){ ?>
                                                <h4><?php echo $producto['subtitulo']; ?></h4>
                                            <?php } ?>
                                            <?php
                                                $monbreColores = array();
                                                $coloresElegidos = $product->getRelaciones($producto['id'], 'producto_colores', 'id_producto');
                                                if(!empty($coloresElegidos)) {
                                                    foreach ($colores as $color) {
                                                        foreach ($coloresElegidos as $colorElegido)
                                                            if ($color['id'] === $colorElegido['id_color']) {
                                                                $monbreColores[] = $color['codigo'];
                                                            }
                                                    }
                                            ?>
                                            <table>
                                                <tr><td><b>Colores: </b></td>
                                                    <?php
                                                        foreach($monbreColores as $color){
                                                            echo '<td style="background-color: ' . $color . '; width: 20px; height: 20px"></td>';
                                                        }
                                                    ?>
                                                </tr>
                                            </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
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