<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
include 'includes.php';
$user = new User();
$categorias = $user->getCategorias();
if(isset($_POST['codigo'])){
    echo '<pre>';
    if($user->registratUsuario($_POST)){
        header("Location: usuario-lista.php");
    }
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
                <h3>Agregar nuevo Usuario</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="firstname">Codigo de Cliente</label>
                        <div class="controls">
                            <input type="text" class="span6" id="codigo" name="codigo">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Razon Social</label>
                        <div class="controls">
                            <input type="text" class="span6" id="razon_social" name="razon_social">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="firstname">Nombre de Usuario</label>
                        <div class="controls">
                            <input type="text" class="span6" id="usuario" name="usuario">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password1">Contraseña</label>
                        <div class="controls">
                            <input type="password" class="span6" id="pass" name="pass">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Categoria</label>
                        <div class="controls">
                            <select class='form-control span6' name="categoria">
                                <option value=''>Seleccionar</option>
                                <?php
                                    foreach($categorias as $categoria){
                                        echo '<option value="' . $categoria['id'] . '">' . ucfirst($categoria['nombre']) . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <input type="email" class="span6" id="email" name="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Domicilio</label>
                        <div class="controls">
                            <input type="text" class="span6" id="domicilio" name="domicilio">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Localidad</label>
                        <div class="controls">
                            <input type="text" class="span6" id="localidad" name="localidad">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Telefono</label>
                        <div class="controls">
                            <input type="text" class="span6" id="telefono" name="telefono">
                        </div>
                    </div>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button class="btn">Cancel</button>
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