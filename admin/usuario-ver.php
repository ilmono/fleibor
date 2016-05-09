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
                <h3>Agregar nuevo Usuario</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="POST">
                    <div class="control-group">
                        <label class="control-label" for="firstname">Codigo de Cliente</label>
                        <div class="controls">
                            <input type="hidden" value="<?php echo $myUser['id'];?>" name="id">
                            <input type="text" class="span6" id="codigo" name="codigo" value="<?php echo $myUser['codigo'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Razon Social</label>
                        <div class="controls">
                            <input type="text" class="span6" id="razon_social" name="razon_social" value="<?php echo $myUser['nombre'];?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="firstname">Nombre de Usuario</label>
                        <div class="controls">
                            <input type="text" class="span6" id="usuario" name="usuario" value="<?php echo $myUser['user'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password1">Contraseña</label>
                        <div class="controls">
                            <input type="password" class="span6" id="pass" name="pass" value="<?php echo $myUser['codigo'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Categoria</label>
                        <div class="controls">
                            <select class='form-control span6' name="categoria">
                                <option value=''>Seleccionar</option>
                                <?php
                                    foreach($categorias as $categoria){
                                        $slc = '';
                                        if(isset($myUser["categoria"]) && $categoria['id'] == $myUser["categoria"]){
                                            $slc = 'selected';
                                        }
                                        echo '<option value="' . $categoria['id'] . '" ' . $slc . '>' . ucfirst($categoria['nombre']) . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <input type="email" class="span6" id="email" name="email" value="<?php echo $myUser['mail'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Domicilio</label>
                        <div class="controls">
                            <input type="text" class="span6" id="domicilio" name="domicilio" value="<?php echo $myUser['domicilio'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Localidad</label>
                        <div class="controls">
                            <input type="text" class="span6" id="localidad" name="localidad" value="<?php echo $myUser['localidad'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Telefono</label>
                        <div class="controls">
                            <input type="text" class="span6" id="telefono" name="telefono" value="<?php echo $myUser['telefono'];?>">
                        </div>
                    </div>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
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