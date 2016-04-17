<?php if(isset($_SESSION["cart"])){$cantidadCarr= count($_SESSION["cart"]->colProducts);}?>
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default">
        
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Nombre Empresa</a>
            </div>
            <div class="navbar-collapse collapse ">
              <ul class="nav navbar-nav nav-pills">
                <li class="active"><a href="index.php">Principal</a></li>
                <li class="dropdown ">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    	<span class="glyphicon glyphicon-shopping-cart"></span> Carrito<?php if(isset($_SESSION["cart"]) and $cantidadCarr){?><span class="badge badge-inverse"><?php if(isset($_SESSION["cart"])){print $cantidadCarr;}?></span><?php }?></a>
                        <ul class="dropdown-menu">
                        	<?php if(isset($_SESSION["cart"]) and $cantidadCarr >0) {?>
                            
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <?php }?>
                            <li><a href="r_cart.php">Ir al carrito</a></li>
                	  </ul>
                </li>
                <li> <?php if (isset($_SESSION["cliente"])){?>
               				Bienvenido <?php print $_SESSION["cliente"]->clien_nombre ?>
                            <a href="logout.php">Cerrar Sesion</a>
              		 <?php }else{?>
              				<a href="ingresar.php">Ingresar</a>
              			<?php }?>
              </li>
               
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
