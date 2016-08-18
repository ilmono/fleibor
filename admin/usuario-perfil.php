<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}
include 'includes.php';
$user = new User();
$categorias = $user->getCategorias();
if(isset($_GET['usuario'])){
    $myUser = $user->getUsuario($_GET['usuario']);
}
if(isset($_POST['codigo'])){
    if($user->modificarUsuario($_POST)){
        header("Location: usuario-lista.php");
    }
}
if(!in_array($_SESSION['permisos'], array(1, 2, 3)) && $_GET['usuario'] != $_SESSION['usuario']){
        header("Location: usuario-perfil.php?usuario=".$_SESSION['usuario']);
}

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
                <h3>Perfil de Usuario</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="firstname">Codigo de Cliente</label>
                        <div class="controls">
                            <span><?php echo $myUser['codigo'];?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Razon Social</label>
                        <div class="controls">
                            <span><?php echo $myUser['nombre'];?></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="firstname">Nombre de Usuario</label>
                        <div class="controls">
                            <span><?php echo $myUser['user'];?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <span><?php echo $myUser['mail'];?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Domicilio</label>
                        <div class="controls">
                            <span><?php echo $myUser['domicilio'];?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Localidad</label>
                        <div class="controls">
                            <span><?php echo $myUser['localidad'];?></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Telefono</label>
                        <div class="controls">
                            <span><?php echo $myUser['telefono'];?></span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /widget-content -->
        </div>
    </div>
</div>

<?php include("includes/script.php"); ?>
</body>
</html>