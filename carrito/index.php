<?php
include("sys_configuration.php");
include("sources.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Home</title>

  <link rel="stylesheet" href="css/style.css" />
  <script src="js/modernizr-transitions.js"></script>
  <script src="js/imagesloaded.pkgd.js"></script>
    

<?php include("template/resources.php");?>

</head>

<body>

             
              
       
<?php include("template/header.php");?>
        
      

          
        
          
         <div class="homepage">              
         
       <div class="container-fluid container">
 
          <div class="page-header">
  			<h1>Productos <small>Venta de tv led</small></h1>
		 </div> 
         
     		
				<div class="row-fluid">
              
           <div id="container">
           <?php
		    
		   $oneAuxProd = new Producto();
		  
			$drPr = $oneAuxProd->darUltimos(10);
			$cant_record = mysql_num_rows($drPr);
			
            while($rowPr= mysql_fetch_object($drPr)) 
			{				
				
				//$urlPhotoMedium1 =  $url_Photos_Location.$rowPr->id."/pics/".$rowPhoto->thubnail;
				
				
		   ?>
          
 
  <div class="col-sm-4 col-md-4 item" style="margin-bottom:20px;">
    <div class="thumbnail">
      <img src="product_pics/<?php print $rowPr->prod_foto; ?>" alt="<?php print $rowPr->prod_nombre; ?>">
      <div class="caption">
        <h3><?php print $rowPr->prod_nombre; ?></h3>
        <p><?php print $rowPr->prod_descripcion; ?></p>
         <h4>$<?php print $rowPr->prod_precio; ?></h4>
         <h4><small>Stock </small><?php print $rowPr->prod_stock; ?></h4>
         <hr />

        <p><a href="r_cart_add.php?act=add_to_cart&cod_product=<?php print $rowPr->prod_id ;?>" class="btn btn-success right"><span class="glyphicon glyphicon-shopping-cart ">&nbsp;</span>Agregar</a><a href="#" class="btn btn-default"><span class="glyphicon glyphicon-eye-open">&nbsp;</span>Ver</a></p>
      </div>
    </div>
  </div>
 


           
            <?php }     ?>
          

          </div>
          
          
            </div>
            </div>
        </div>


       <?php include("template/footer.php");?>
               
</body>
</html>
