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
    if(isset($_POST["seccion"])){
        $user->setPermisos($_POST["categoria"], $_POST["seccion"]);
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
                <h3>Asignar Permisos</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content" style="padding-top: 15px;">
                <form id="edit-profile" class="form-horizontal" method="GET">
                    <div class="control-group">
                        <label class="control-label" for="lastname">Categoria</label>
                        <div class="controls">
                            <select id="select-permiso-usuario" class='form-control span6' name="categoria">
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
                        </div>
                    </div>
                </form>
                <div id="div-permiso-usuario">
                    <?php if(isset($_GET["categoria"])){
                        echo $user->selectPermisos($_GET["categoria"]);
                    }?>
                </div>
            </div>
            <!-- /widget-content -->
        </div>
    </div>
</div>

<?php include("includes/script.php"); ?>
</body>
</html>
