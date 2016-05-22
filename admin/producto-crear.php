<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }
    include 'includes.php';
    $product = new Producto();
    if(isset($_POST['nombre'])){
        $product->agregarProducto($_POST);
        header("Location: producto-lista.php");
    }
    $familias = $product->getFamilias();
    $colores = $product->getColores();
    $envases = $product->getEnvases();
    $medidas = $product->getMedidas();
    $unidades = $product->getUnidades();
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
                        <label class="control-label" for="firstname">Nombre</label>
                        <div class="controls">
                            <input type="text" class="span6" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Subtitulo</label>
                        <div class="controls">
                            <input type="text" class="span6" id="subtitulo" name="subtitulo">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Descripcion</label>
                        <div class="controls">
                            <input type="text" class="span6" id="descripcion" name="descripcion">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Familia</label>
                        <div class="controls">
                            <select class='form-control span6' name="familia">
                                <option value=''>Seleccionar</option>
                                <?php
                                    foreach($familias as $familia){
                                        echo '<option value="' . $familia['id'] . '">' . ucfirst($familia['nombre']) . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Colores</label>
                        <div class="controls">
                            <?php
                            foreach($colores as $color){
                                echo '<input type="checkbox" name="color[]" value="'.$color["id"].'"> ' . ucfirst($color["nombre"]) . ' <br>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Envases</label>
                        <div class="controls">
                            <?php
                            foreach($envases as $envase){
                                echo '<input type="checkbox" name="envase[]" value="'.$envase["id"].'"> ' . ucfirst($envase["nombre"]) . ' <br>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Medidas</label>
                        <div class="controls">
                            <?php
                            foreach($medidas as $medida){
                                echo '<input type="checkbox" name="medida[]" value="'.$medida["id"].'"> ' . ucfirst($medida["cantidad"]) . ' <br>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Cajas</label>
                        <div class="controls">
                            <?php
                            foreach($unidades as $unidad){
                                echo '<input type="checkbox" name="unidad[]" value="'.$unidad["id"].'"> ' . ucfirst($unidad["cantidad"]) . ' <br>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="usuario-lista.php" class="btn">Cancel</a>
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