<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }
    include 'includes.php';
    $product = new Producto();
    if(isset($_POST['nombre'])){
        $product->agregarEnvase($_POST);
    }
    if(isset($_POST['id'])){
        if($product->deleteEnvase($_POST['id'])){
            header("Location: producto-envases.php");
        }
    }
    $envases = $product->getEnvases();
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
                <h3>Agregar un Envase</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="nombre">Nombre</label>
                        <div class="controls">
                            <input type="text" class="span6" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div> <!-- /form-actions -->
                </form>
            </div>
            <!-- /widget-content -->
        </div>
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-group"></i>
                <h3>Asignar Unidades</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="GET">
                    <div class="control-group">
                        <label class="control-label" for="lastname">Envase</label>
                        <div class="controls">
                            <select class='form-control span6' name="envase">
                                <option value=''>Seleccionar</option>
                                <?php
                                foreach($envases as $envase){
                                    $slc = '';
                                    if(isset($_GET["envase"]) && $envase['id'] == $_GET["envase"]){
                                        $slc = 'selected';
                                    }
                                    echo '<option value="' . $envase['id'] . '" ' . $slc . '>' . ucfirst($envase['nombre']) . '</option>';
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary">Ver</button>
                        </div>
                    </div>
                </form>
                <?php if(isset($_GET["envase"])){ ?>
                    <form id="edit-profile" class="form-horizontal" method="POST">
                        <input type="hidden" name="categoria" value="<?php echo $_GET["categoria"]; ?>">
                        <div class="control-group">
                            <label class="control-label" for="lastname">Categoria</label>
                            <div class="controls">
                                <?php
                                $medidas = $product->getMedidas();
                                foreach($medidas as $medida){
                                    $ckd = '';
                                    /*if($permisos) {
                                        foreach ($permisos as $permiso) {
                                            if ($seccion["id"] == $permiso['permiso_id']) {
                                                $ckd = 'checked';
                                            }
                                        }
                                    }*/
                                    echo '<input type="checkbox" name="seccion[]" value="'.$medida["id"].'"  ' . $ckd . '> ' . $medida["cantidad"] . ' <br>';
                                }
                                ?>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Aplicar</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
            <!-- /widget-content -->
        </div>
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Lista de Envases</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div>
                    <div id="test-modal" class="mfp-hide white-popup-block">
                        <p>Esta seguro que quiere borrar el envase <span id="modal-text"></span></p>
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
                    <?php if(!empty($envases)){foreach($envases as $envase){ ?>
                        <tr>
                            <td id="nombre-<?php echo $envase['id']?>"><?php echo $envase['nombre']?></td>
                            <td class="td-actions">
                                <a id="<?php echo $envase['id']?>" href="#test-modal" class="btn btn-danger btn-small borrar-usuario"><i class="btn-icon-only icon-remove"> </i></a>
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