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
$categorias = $user->getCategorias();
$errors = array ();
if(isset($_POST['codigo'])){
    $validate = new Validator();
    foreach($_POST as $key => $valor){
        if($validate->returnValidate($valor, $key)){
            $errors[$key] = true;
        }
    }
    if(empty($errors)) {
        if($user->registratUsuario($_POST)){
            header("Location: usuario-lista.php");
        }
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
        <?php if(!empty($errors)){ ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error:</strong> Verifique que los campos esten correctos.
            </div>
        <?php } ?>
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
                            <input <?php if(isset($errors["codigo"])){ echo 'style="border-color: red;"'; }?> type="text" class="span6" id="codigo" name="codigo" value="<?php if(isset($_POST["codigo"])){ echo $_POST["codigo"]; }?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Razon Social</label>
                        <div class="controls">
                            <input <?php if(isset($errors["razon_social"])){ echo 'style="border-color: red;"'; }?> type="text" class="span6" id="razon_social" name="razon_social" value="<?php if(isset($_POST["razon_social"])){ echo $_POST["razon_social"]; }?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="firstname">Nombre de Usuario</label>
                        <div class="controls">
                            <input <?php if(isset($errors["usuario"])){ echo 'style="border-color: red;"'; }?> type="text" class="span6" id="usuario" name="usuario" value="<?php if(isset($_POST["usuario"])){ echo $_POST["usuario"]; }?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password1">Contraseña</label>
                        <div class="controls">
                            <input <?php if(isset($errors["pass"])){ echo 'style="border-color: red;"'; }?> type="password" class="span6" id="pass" name="pass" value="<?php if(isset($_POST["pass"])){ echo $_POST["pass"]; }?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="lastname">Categoria</label>
                        <div class="controls">
                            <select <?php if(isset($errors["categoria"])){ echo 'style="border-color: red;"'; }?> class='form-control span6' name="categoria">
                                <option value=''>Seleccionar</option>
                                <?php
                                    foreach($categorias as $categoria){
                                        $chk = '';
                                        if($_POST["categoria"] === $categoria['id']){
                                            $chk = 'selected';
                                        }
                                        echo '<option ' . $chk . ' value="' . $categoria['id'] . '">' . ucfirst($categoria['nombre']) . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <input <?php if(isset($errors["email"])){ echo 'style="border-color: red;"'; }?> type="email" class="span6" id="email" name="email" value="<?php if(isset($_POST["email"])){ echo $_POST["email"]; }?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Domicilio</label>
                        <div class="controls">
                            <input <?php if(isset($errors["domicilio"])){ echo 'style="border-color: red;"'; }?> type="text" class="span6" id="domicilio" name="domicilio" value="<?php if(isset($_POST["domicilio"])){ echo $_POST["domicilio"]; }?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Localidad</label>
                        <div class="controls">
                            <input <?php if(isset($errors["localidad"])){ echo 'style="border-color: red;"'; }?> type="text" class="span6" id="localidad" name="localidad" value="<?php if(isset($_POST["localidad"])){ echo $_POST["localidad"]; }?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="firstname">Telefono</label>
                        <div class="controls">
                            <input <?php if(isset($errors["telefono"])){ echo 'style="border-color: red;"'; }?> type="text" class="span6" id="telefono" name="telefono" value="<?php if(isset($_POST["telefono"])){ echo $_POST["telefono"]; }?>">
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