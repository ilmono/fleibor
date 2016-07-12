<?php
include("sys_configuration.php");
include("sources.php");


$auxPer = new Persistent();
$super_total =0;

if (isset($_POST["act"]) and $_POST["act"] == "clear_cart")
{
	$_SESSION["cart"] = NULL;
	
}



if (isset($_GET["deleteme"]))
{
	$delete = $_GET["deleteme"];
	if ($delete==1)
	{
		if (isset($_GET["codProduct"]))
		{	
			$codProduct = $_GET["codProduct"];
			
			$_SESSION["cart"]->borrarProduct($codProduct);
			
		}
	}
}

//Activar desactivar
if (isset($_GET["deleteme"]))
{
	$delete = $_GET["deleteme"];
	if ($delete=="des")
	{
		if (isset($_GET["codProduct"]))
		{	
			$codDelete = $_GET["codProduct"];
			$_SESSION["cart"]->colProducts[$codDelete]->mStatus = 0;
		}
	}
}

 if(isset($_SESSION["cart"])){
$colProducts = $_SESSION["cart"]->colProducts;
 }

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<title><?PHP print $mSiteTitle?> - Carrito</title>
<script>



function clear_cart(){
    var con ;
	
	con = confirm("Are you totally sure you want to clear your cart?");
	if (con == true) {	
	    document.frm1.act.value="clear_cart";
		 document.frm1.action="";
		document.frm1.submit();
	}
	
}

function checkout(){
  
	document.frm1.act.value="check_out";
	document.frm1.action="check_out.php";
	document.frm1.submit();
	
}


</script>

    

<?php include("template/resources.php")?>

</head>

<body>

 
<?php include("template/header.php")?>

        
        <div class="container-fluid container">
         

          <div class="Gen">
      <!-- <form name="frm1" id="frm1" action="r_cart_checkout_shipping.php" method="post"> -->
<input type="hidden" id="act" name="act"  />

 <?php 
			
						
			if(isset($colProducts))
			{
			$cantProducts = count($colProducts);
			}else{
				$cantProducts=0;
			}
			
			if($cantProducts==0){			
				echo "<div class='alert alert-warning'>
        				<strong>Alerta!</strong> El carrito esta vacio!.
     				</div> ";
			} else{			
			?>

			<div class="panel panel-default">
			<div class="panel-heading"><p><b>Mi Carrito de compras</b></p></div>

	
           <table class="table table-condensed " >
           <thead>
	            <tr>
		            
		            <th>Producto</th>
		   			<th>Cantidad</th>
		            <th>Precio</th>
                    <th>Total</th>
                    <th>Borrar</th>
                   
	            </tr>
            </thead>
         
            
             <?php 
			
			$auxPrCart = new Producto();			
			
			$cantProducts = count($colProducts);
			
			
			    $big_total = 0;	
				for ($i=1; $i <= $cantProducts; $i++){
					
					/*Get Product*/
					$rowProduct = $_SESSION["cart"]->mostrarProduct($i);
					
					/*Get from database*/
					$rowProdBase= mysql_fetch_object($auxPrCart->darUno($rowProduct->mId));
					
								
					
					
				   // $productMainPicture =  $url_Photos_Location.$rowProduct->mId."/pics/".$rowPhoto->thubnail;
				
										
					/*Costs */
				
						$product_total = $rowProdBase->prod_precio*$rowProduct->mQty;

					 
					 $price =  $auxPer->total_format($product_total,2);
					 
					 $precio_unitario =  $auxPer->total_format($rowProdBase->prod_precio,2);
					 
					
						$super_total =$super_total+$product_total;
						$mostrar=$auxPer->total_format($super_total,2); 
				
					 
					 
	
											
				?>

            <tr>
              <td class="col-lg-5"><div class="row"><div class="col-lg-3" style="max-width:150px;"><a href="#" class=""><img style="border:none;"class="media-object img-thumbnail" src="product_pics/<?php print $rowProdBase->prod_foto;?>" /></a> </div>
 <div class="col-lg-9 style="max-width:330px;">
 <h4><a href="#"><?php print $auxPrCart->darNombreProd($rowProdBase->prod_nombre);?></a></h4><p class="hidden-xs hidden-sm  hidden-md" style="font-size:12px;"><?php print $auxPrCart->darNombreProd($rowProdBase->prod_descripcion);?></p></div></div></td>
             
             <?php $stock=$rowProdBase->prod_stock; ?>
              <td class="span4">			<?php if($stock == 1){
				  						
			  				 }else{ ?>
                             		<form action="control.php" method="post" name='form1' >
                                    <div class="row">
                                        <div class="col-lg-4">
                                      
                                     <input type="hidden" name="idprod" value="<?php echo $i; ?>" />
              						<select name="stock" onChange="this.form.submit();" >
                                   <option disabled="disabled">Cantidad</option> 
                                  
                            
									<?php  for ($st=1; $st <= $stock; $st++){
											if($st==$rowProduct->mQty){
			  						echo '<option  selected="selected" value="'.$st.'" onChange="Form.submit()">'.$st.'</option>';
											}else{
									echo '<option  value="'.$st.'" onChange="Form.submit()">'.$st.'</option>';		
											}
			  						}?>
              						</select>
                                       </div>
                                     </div>
                                    </form> 
                                    <?php } 
									//print $rowProduct->mQty; ?></td>
              <td><?php print $mCurrency. $precio_unitario?></td>
              <td class="totalM"><?php print $mCurrency. $price?></td>
              <td><a href="r_cart.php?deleteme=1&codProduct=<?php echo $i;?>"rel="popover"  data-content="And here's …" data-original-title="A Title"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            
            <?php } ?>


         <tr>
           				<td> </td>
          				 <td> </td>
               			 <td> </td>
                      	<td><p><strong>Total:</strong></p></td>
                       <td  class="totalM"><p><?php print $mCurrency. $mostrar?></p></td>
                       </tr>
                 </table>    
				
             
          		
               	
          		 
          		
            <?php } ?>
        
        
        <!-- </form> -->
                
                          
    
          </div>
          
        </div>

        </div>
       <div  class="container-fluid container">
         <div class="well">
			 <table class="table-condensed" >
             	<tr>
               		  <td  class="col-md-8"></td>
                      <td class="col-md-2"></td>
                      <td></td>
                      <td><input type="button" onClick="document.location.href='index.php'" name="Add" id="Add"  class="btn btn-primary" value="Seguir Comprando" /></td>
                      <td> <input type="button"  class="btn btn-success "onClick="javascript:checkout();" name="Add3" id="Add3" value="Confirmar" /></td>
				</tr>
                </table> 
            </div>
            </div>            
        
       
       <?php include("template/footer.php")?>
</body>
</html>
