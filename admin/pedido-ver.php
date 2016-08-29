<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
    }
    include 'includes.php';

    /*if(!in_array($_SESSION['permisos'], array(1, 2, 3))){
        header("Location: mis-pedidos.php");
    }*/

    $pedidos = new Pedido();
    if(isset($_POST['btn-repetir'])){
        $repetir = $pedidos->repetirPedido($_SESSION['usuario'], $_POST);
        if($repetir == true){
            header("Location: mis-pedidos.php");
        }
    }
    if(isset($_POST['btn-reclamar'])){
        $reclamar = $pedidos->reclamarPedido($_POST);
    }
    $pedido = $pedidos->getPedido($_GET['pedido']);
    if($pedido == false){
        header("Location: index.php");
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
                <?php if(isset($reclamar) && $reclamar === true){ ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    Su reclamo se a efectuado correctamente
                </div>
                <?php } ?>
                <div>
                    <div id="test-modal" class="mfp-hide white-popup-block">
                        <p>¿Desea agregar alguna preferencia o especificacion?</p>
                        <p>
                        <form method="POST" style="display: inline;">
                            <textarea id="comentario-cart" name="comentario" class="form-control" style="resize: none; width: 99%;"></textarea>
                            <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']?>"/>
                            <input class="btn btn-small btn-success" type="submit" name="btn-repetir" value="Realizar Pedido">
                        </form>
                        <a href="#" class="btn btn-warning btn-small popup-modal-dismiss">Cancelar</a>
                        </p>
                    </div>
                </div>

                <div>
                    <div id="repetir-modal" class="mfp-hide white-popup-block">
                        <p>Tu reclamo sera enviado via Email ¿Desea agregar algun comentario?</p>
                        <p>
                        <form method="POST" style="display: inline;">
                            <textarea id="comentario-cart" name="comentario" class="form-control" style="resize: none; width: 99%;"></textarea>
                            <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']?>"/>
                            <input class="btn btn-small btn-danger" type="submit" name="btn-reclamar" value="Reclamar Pedido">
                        </form>
                        <a href="#" class="btn btn-warning btn-small popup-modal-dismiss">Cancelar</a>
                        </p>
                    </div>
                </div>

                <div class="widget widget-table action-table">
                    <div class="widget widget-table action-table">
                        <div class="widget-content" style="padding-top: 15px;">
                            <div class="control-group">
                                <div style="margin-left: 50px; display: inline-block;">
                                    <p><b>Pedido N°: </b><?php echo $pedido['id']?></p>
                                    <p><b>Fecha: </b><?php echo $pedido['fecha']?></p>
                                    <p><b>Estado: </b>
                                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?>
                                            <select>
                                                <option value="<?php echo $pedido['estado']?>"><?php echo $pedido['estado']?></option>
                                                <option value="Parcialmente Despachado">Parcialmente Despachado</option>
                                                <option value="Totalmente Despachado">Totalmente Despachado</option>
                                                <option value="Facturado">Facturado</option>
                                            </select>
                                        <?php } ?>
                                        <?php if(in_array($_SESSION['permisos'], array(2))){ ?>
                                            <select>
                                                <option value="<?php echo $pedido['estado']?>"><?php echo $pedido['estado']?></option>
                                                <option value="Parcialmente Despachado">Parcialmente Despachado</option>
                                                <option value="Totalmente Despachado">Totalmente Despachado</option>
                                            </select>
                                        <?php } ?>
                                        <?php if(in_array($_SESSION['permisos'], array(3))){ ?>
                                            <select>
                                                <option value="<?php echo $pedido['estado']?>"><?php echo $pedido['estado']?></option>
                                                <option value="Facturado">Facturado</option>
                                            </select>
                                        <?php } ?>
                                        <?php if(in_array($_SESSION['permisos'], array(4))){ ?>
                                            <?php echo $pedido['estado']?>
                                        <?php } ?>
                                    </p>
                                    <p><b>Comentario: </b><?php echo $pedido['comentario']?></p>
                                </div>
                                <div class="pedidos-ver-acciones">
                                    <?php if(in_array($_SESSION['permisos'], array(4))){ ?>
                                        <a id="<?php echo $pedido['id']?>" href="#test-modal" class="btn btn-success btn-small borrar-usuario btn-repetir">Repetir pedido</a><br />
                                        <a id="<?php echo $pedido['id']?>" href="#repetir-modal" class="btn btn-danger btn-small borrar-usuario btn-repetir">Reclamar Pedido</a><br />
                                    <?php } ?>
                                    <?php if(in_array($_SESSION['permisos'], array(1,2,3))){ ?>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="pedido_id" value="<?php echo $pedido['id']?>"/>
                                            <input class="btn btn-small btn-warning btn-pedidos-accion" type="submit" name="btn-actualizar" value="Guardar Cambios">
                                        </form>
                                    <?php } ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $pedido['cart']?>
            </div>
        </div>
        <?php include("includes/script.php"); ?>
    </body>
</html>
