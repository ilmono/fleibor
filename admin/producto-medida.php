<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }
    include 'includes.php';
    $addIsActive = 'active';
    $vincularIsActive = '';
    $product = new Producto();
    if(isset($_POST['cantidad'])){
        $product->agregarMedida($_POST);
    }
    if(isset($_POST['unidad'])){
        $product->borrarRelacion($_POST["medida"],'medida_unidades','id_medida');
        $product->setTablasRelacionales($_POST["medida"], $_POST['unidad'], 'medida_unidades');
        $addIsActive = '';
        $vincularIsActive = 'active';
    }
    if(isset($_POST['id'])){
        if($product->deleteMedida($_POST['id'])){
            header("Location: producto-medida.php");
        }
    }
    $medidas = $product->getMedidas();
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
            <div class="widget-header"> <i class="icon-beaker"></i>
                <h3>Medidas</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="<?php echo $addIsActive; ?>">
                            <a href="#add-envases" data-toggle="tab">Agregar Medida</a>
                        </li>
                        <li class="<?php echo $vincularIsActive; ?>">
                            <a href="#vincular-medida" data-toggle="tab">Vincular Empaque</a>
                        </li>
                    </ul>

                </div>
                <div class="tab-content">
                    <div class="tab-pane <?php echo $addIsActive; ?>" id="add-envases">
                        <div class="tab-pane-div widget-content">
                            <h3>Agregar Medidas</h3>
                            <form id="edit-profile" class="form-horizontal" method="POST">
                                <div class="control-group">
                                    <label class="control-label" for="cantidad">Cantidad</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="cantidad" name="cantidad">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div> <!-- /form-actions -->
                            </form>
                        </div>

                        <div class="tab-pane-div widget-content">
                            <h3>Lista de Envases</h3>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <div>
                                    <div id="test-modal" class="mfp-hide white-popup-block">
                                        <p>Esta seguro que quiere borrar la medida <span id="modal-text"></span></p>
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
                                        <th>Nombre</th>
                                        <th class="td-actions">Borrar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($medidas)){foreach($medidas as $medida){ ?>
                                        <tr>
                                            <td id="nombre-<?php echo $medida['id']?>"><?php echo $medida['cantidad']?></td>
                                            <td class="td-actions">
                                                <a id="<?php echo $medida['id']?>" href="#test-modal" class="btn btn-danger btn-small borrar-usuario"><i class="btn-icon-only icon-remove"> </i></a>
                                            </td>
                                        </tr>

                                    <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <div class="tab-pane <?php echo $vincularIsActive; ?>" id="vincular-medida">
                        <!--h3>Vincular Medidas</h3-->
                        <!-- /widget-header -->
                        <div class="widget-content tab-pane-div" style="padding-top: 15px;">
                            <form id="edit-profile" class="form-horizontal" method="POST">
                                <div class="control-group">
                                    <label class="control-label" for="lastname">Medida</label>
                                    <div class="controls">
                                        <select id="select-medida-unidades" class='form-control span6' name="medida">
                                            <option value=''>Seleccionar</option>
                                            <?php
                                            foreach($medidas as $medida){
                                                $slc = '';
                                                if(isset($_POST["medida"]) && $medida['id'] == $_POST["medida"]){
                                                    $slc = 'selected';
                                                }
                                                echo '<option value="' . $medida['id'] . '" ' . $slc . '>' . ucfirst($medida['cantidad']) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="div-medida-unidades">
                                    <?php
                                    if(isset($_POST['medida'])){
                                        echo $product->getCheckUnidades($_POST["medida"]);
                                    }
                                    ?>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /widget-content -->
        </div>

        <div class="widget widget-table action-table">
            <!-- /widget-content -->
        </div>
    </div>
</div>

<?php include("includes/script.php"); ?>
</body>
</html>