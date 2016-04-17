<!doctype html>
<html lang="en">
<head>
<?php include("sys_configuration.php");
include("sources.php");
include("template/resources.php");
 include("template/header.php");?>
  <meta charset="utf-8" />
  
  <link rel="stylesheet" href="css/style.css" />
  
   <script src="js/modernizr-transitions.js"></script>
   </head>
<body>
 <div class="homepage ">
      <div id="container">

  <?php
		    
		   $oneAuxProd = new Producto();
		  
			$drPr = $oneAuxProd->darUltimos(5);
			$cant_record = mysql_num_rows($drPr);
			
            while($rowPr= mysql_fetch_object($drPr)) 
			{				
				
				//$urlPhotoMedium1 =  $url_Photos_Location.$rowPr->id."/pics/".$rowPhoto->thubnail;
				
				
		   ?>

      <div class="item" style="background:#999">
 <img src="product_pics/<?php print $rowPr->prod_foto; ?>" alt="<?php print $rowPr->prod_nombre; ?>" width="25%">
    
        <h3><?php print $rowPr->prod_nombre; ?></h3>
        <p><?php print $rowPr->prod_descripcion; ?></p>
         <h4>$<?php print $rowPr->prod_precio; ?></h4>
         <h4><small>Stock </small><?php print $rowPr->prod_stock; ?></h4>
         <hr />

        <p><a href="r_cart_add.php?act=add_to_cart&cod_product=<?php print $rowPr->prod_id ;?>" class="btn btn-success right"><span class="glyphicon glyphicon-shopping-cart ">&nbsp;</span>Agregar</a><a href="#" class="btn btn-default"><span class="glyphicon glyphicon-eye-open">&nbsp;</span>Ver</a></p>
</div>
<?php }?>
 </div> 
  </div>
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery.masonry.min.js"></script>
<script>
  $(function(){
    
    var $container = $('#container');
    	 $container.masonry({
      itemSelector: '.item',
      columnWidth: 50,
      isAnimated: !Modernizr.csstransitions
    });
  });
</script>
    
<!-- #content -->

</body>
</html>