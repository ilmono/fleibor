<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
include 'includes.php';
$user = new User();
$listadoUsuarios = $user->getUsuarios();
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
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Lista de Usuarios</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Razon Social</th>
                        <th>Categoria</th>
                        <th>Telefono</th>
                        <th>Mail</th>
                        <th class="td-actions">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($listadoUsuarios as $usuario){ ?>
                        <tr>
                            <td><?php echo $usuario['nombre']?></td>
                            <td><?php echo $usuario['categoria']?></td>
                            <td><?php echo $usuario['telefono']?></td>
                            <td><?php echo $usuario['mail']?></td>
                            <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-search"> </i></a> <a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
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