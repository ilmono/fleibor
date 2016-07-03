<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }
    include 'includes.php';
    $product = new Producto();
    if(isset($_POST['nombre'])){
        $product->updateProducto($_POST);
        header("Location: producto-lista.php");
    }
    if(!isset($_GET['producto'])){
        header("Location: producto-lista.php");
    }
    $myProduct = $product->getProducto($_GET['producto']);
    $colores = $product->getColores();
    $envases = $product->getEnvases();
    $medidas = $product->getMedidas();
    $unidades = $product->getUnidades();
    $values = $product->renderOptionsProductByEnvase($myProduct["envase"], $_GET['producto']);
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
            <div class="widget-header"> <i class="icon-group"></i>
                <h3>Agregar nuevo Producto</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <div class="control-group">
                        <input type="hidden" value="<?php echo $myProduct['id'];?>" name="id">
                        <label class="control-label" for="firstname">Nombre</label>
                        <div class="controls">
                            <input type="text" class="span6" id="nombre" name="nombre" value="<?php echo $myProduct['nombre'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Subtitulo</label>
                        <div class="controls">
                            <input type="text" class="span6" id="subtitulo" name="subtitulo" value="<?php echo $myProduct['subtitulo'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Imagen</label>
                        <div class="controls">
                            <input type="file" class="span6" id="image" name="image">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Colores</label>
                        <div class="controls">
                            <?php
                            foreach($colores as $color){
                                $ckd = '';
                                $coloresElegidos = $product->getRelaciones($_GET['producto'], 'producto_colores', 'id_producto');
                                if($coloresElegidos) {
                                    foreach ($coloresElegidos as $colorElegido) {
                                        if ($color["id"] == $colorElegido['id_color']) {
                                            $ckd = 'checked';
                                        }
                                    }
                                }
                                echo '<input ' . $ckd . ' type="checkbox" name="color[]" value="'.$color["id"].'"> ' . ucfirst($color["nombre"]) . ' <br>';
                            }
                            ?>

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Envases</label>
                        <div class="controls">
                            <select id="select-envase-producto" class='form-control span6' name="envase">
                                <option value=''>Seleccionar</option>
                                <?php
                                foreach($envases as $envase){
                                    $ckd = '';
                                    if ($envase["id"] == $myProduct["envase"]) {
                                        $ckd = 'selected';
                                    }
                                    echo '<option ' . $ckd . ' value="' . $envase['id'] . '">' . ucfirst($envase['nombre']) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Medidas</label>
                        <div class="controls">
                            <div id="div-envase-producto">
                                <?php echo $values; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="producto-lista.php" class="btn">Cancel</a>
                    </div> <!-- /form-actions -->
                </form>
            </div>
            <!-- /widget-content -->
        </div>
    </div>
</div>

<?php include("includes/script.php"); ?>
</body>
</html>