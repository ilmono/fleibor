<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-large icon-calendar"></i><span>Pedidos</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if(in_array($_SESSION['permisos'], array(1, 2, 3))){ ?><li><a href="index.php">Listado de Pedidos</a></li> <?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(4))){ ?><li><a href="mis-pedidos.php">Mis Pedidos</a></li> <?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(4))){ ?><li><a href="pedidos-crear.php">Agregar Pedido</a></li> <?php } ?>


                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-large  icon-beaker"></i><span>Productos</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="producto-catalogo.php">Catalogo de Productos</a></li>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="producto-lista.php">Listado de Productos</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="producto-crear.php">Agregar Producto</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="producto-color.php">Colores</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="producto-gustos.php">Gustos</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="producto-envases.php">Envases</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="producto-medida.php">Medidas</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="producto-unidades.php">Unidades</a></li><?php } ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-large icon-user"></i><span>Usuarios</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if(in_array($_SESSION['permisos'], array(4))){ ?><li><a href="usuario-perfil.php?usuario=<?php echo $_SESSION['usuario'] ?>">Mi Perfil</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1, 2, 3))){ ?><li><a href="usuario-lista.php">Listado de Usuarios</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1, 3))){ ?><li><a href="usuario-crear.php">Agregar Usuario</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="usuario-categoria.php">Agregar Categoria</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="usuario-seccion.php">Agregar Seccion</a></li><?php } ?>
                        <?php if(in_array($_SESSION['permisos'], array(1))){ ?><li><a href="usuario-permisos.php">Asignar Permisos</a></li><?php } ?>
                    </ul>
                </li>
            </ul>
            <ul id="menu-cart" class="mainnav" <?php if(empty($_SESSION['cart'])){ echo 'style="display: none"';}  ?>>
                <li class="li-cart">
                    <a id="btn-cart" href="#cart-modal" class="dropdown-toggle btn-modal"><i class="icon-large icon-shopping-cart"></i><span id="cart-count">Carrito</span> <b class="caret"></b></a>
                    <a style="display: none" id="open-modal-ok" href="#ok-modal" class="dropdown-toggle btn-modal" data-toggle="dropdown"></a>
                </li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<div>
    <div id="cart-modal" class="mfp-hide white-popup-block">
        <div id="div-cart-container"></div>
        <div class="form-actions cart-modal-actions">
            <button id="realizar-pedido" class="btn btn-success btn-cart-action-first">Realizar Pedido</button>
            <a href="#" id="clear-cart" class="btn btn-error popup-modal-dismiss btn-cart-action">Limpiar Carrito</a>
            <a href="#" class="btn btn-warning popup-modal-dismiss btn-cart-action">Cerrar</a>
        </div>

    </div>
</div>
<div>
    <div id="ok-modal" class="mfp-hide white-popup-block">
        <div id="div-cart-container">
            <div class="alert alert-success">
                <button type="button" class="close popup-modal-dismiss">×</button>
                El Producto se ha agregado correctamente al Carrito
            </div>
        </div>
    </div>
</div>