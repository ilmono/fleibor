<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }
    include 'includes.php';
    $user = new User();
    if(isset($_GET["categoria"])){
        $permisos = $user->getPermisos($_GET["categoria"]);
    }
    if(isset($_POST["nueva-categoria"])){
        $user->agregarCategorias($_POST["nueva-categoria"]);
    }elseif(isset($_POST["nueva-seccion"])){
        $user->agregarSeccion($_POST["nueva-seccion"]);
    }
    elseif(isset($_POST["seccion"])){
        $user->setPermisos($_POST["categoria"], $_POST["seccion"]);
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Admin - Fleibor Website</title>
    <meta name="Fleibor Website" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/pages/signin.css" rel="stylesheet" type="text/css">
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
                <h3>Administrar Categorias</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="GET">
                    <div class="control-group">
                        <label class="control-label" for="lastname">Categoria</label>
                        <div class="controls">
                            <select class='form-control span6' name="categoria">
                                <option value=''>Seleccionar</option>
                                <?php
                                $categorias = $user->getCategorias();
                                foreach($categorias as $categoria){
                                    $slc = '';
                                    if(isset($_GET["categoria"]) && $categoria['id'] == $_GET["categoria"]){
                                        $slc = 'selected';
                                    }
                                    echo '<option value="' . $categoria['id'] . '" ' . $slc . '>' . ucfirst($categoria['nombre']) . '</option>';
                                }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary">Ver</button>
                        </div>
                    </div>
                </form>
                <?php if(isset($_GET["categoria"])){ ?>
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <input type="hidden" name="categoria" value="<?php echo $_GET["categoria"]; ?>">
                    <div class="control-group">
                        <label class="control-label" for="lastname">Categoria</label>
                        <div class="controls">
                            <?php
                                $secciones = $user->getSeccion();
                                foreach($secciones as $seccion){
                                    $ckd = '';
                                    if($permisos) {
                                        foreach ($permisos as $permiso) {
                                            if ($seccion["id"] == $permiso['permiso_id']) {
                                                $ckd = 'checked';
                                            }
                                        }
                                    }
                                    echo '<input type="checkbox" name="seccion[]" value="'.$seccion["id"].'"  ' . $ckd . '> ' . $seccion["nombre"] . ' <br>';
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
            <div class="widget-header"> <i class="icon-group"></i>
                <h3>Agregar una Categoria</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="nueva-categoria">Nombre</label>
                        <div class="controls">
                            <input type="text" class="span6" id="nueva-categoria" name="nueva-categoria">
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
                <h3>Agregar una Seccion</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="nueva-seccion">Nombre</label>
                        <div class="controls">
                            <input type="text" class="span6" id="nueva-seccion" name="nueva-seccion">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div> <!-- /form-actions -->
                </form>
            </div>
            <!-- /widget-content -->
        </div>
    </div>
</div>

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/chart.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
<script src="js/base.js"></script>
</body>
</html>
