<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }

    include 'includes.php';

    if(!in_array($_SESSION['permisos'], array(1))){
        header("Location: index.php");
    }

    $user = new User();
    $errors = array ();
    if(isset($_POST["nueva-seccion"])){
        $validate = new Validator();
        foreach($_POST as $key => $valor){
            if($validate->returnValidate($valor, $key)){
                $errors[$key] = true;
            }
        }

        if(empty($errors)) {
            $user->agregarSeccion($_POST["nueva-seccion"]);
        }
    }
    if(isset($_POST['id'])){
        if($user->deleteSeccion($_POST['id'])){
            header("Location: usuario-seccion.php");
        }
    }
    $secciones = $user->getSeccion();

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
        <?php if(!empty($errors)){ ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error:</strong> Este campo solo permite letras.
            </div>
        <?php } ?>
        <!-- /widget -->
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-group"></i>
                <h3>Agregar una Seccion</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="nueva-seccion">Nombre</label>
                        <div class="controls">
                            <input <?php if(isset($errors["nueva-seccion"])){ echo 'style="border-color: red;"'; }?> type="text" class="span6" id="nueva-seccion" name="nueva-seccion" value="<?php if(!empty($errors) & isset($_POST["nueva-seccion"])){ echo $_POST["nueva-seccion"]; }?>">
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
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Lista de Secciones</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div>
                    <div id="test-modal" class="mfp-hide white-popup-block">
                        <p>Esta seguro que quiere borrar la seccion <span id="modal-text"></span></p>
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
                    <?php if(!empty($secciones)){foreach($secciones as $seccion){ ?>
                        <tr>
                            <td id="nombre-<?php echo $seccion['id']?>"><?php echo $seccion['nombre']?></td>
                            <td class="td-actions">
                                <a id="<?php echo $seccion['id']?>" href="#test-modal" class="btn btn-danger btn-small borrar-usuario"><i class="btn-icon-only icon-remove"> </i></a>
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