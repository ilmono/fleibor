<?
include("sys_configuration.php");
include("sources.php");

if (!isset($_SESSION["cart"])){
	header("Location: r_cart.php");		
}

if (!isset($_SESSION["cliente"])){
	header("Location: ingresar.php");		
}


/*Get customer*/
$auxCustomer = new Cliente();
$oneCustomer = mysql_fetch_object($auxCustomer->darUno($_SESSION["cliente"]->clien_id ));

if($_POST["act"] == 'check_out'){
	
	/*Create Order*/
	$total=$_SESSION["cart"]->calcTotal();
	$auxOrder = new Orden();
	$auxOrder->m_orden_cliente_id = $_SESSION["cliente"]->clien_id;
	$auxOrder->m_orden_total = $total;
	$auxOrder->orden_session_id =  session_id()."_".time() ;    
	$order_id = $auxOrder->guardar();
	
	/*Save Products*/
	
	$auxPrCart = new Producto();	
	$auxPrCartA = new Producto();	
	$colProducts = $_SESSION["cart"]->colProducts;
	$cantProducts = count($colProducts);
	
	if($order_id != ""){

		for ($i=1; $i <= $cantProducts; $i++){
			/*Get Product*/
			$rowProduct = $_SESSION["cart"]->mostrarProduct($i);
			/*Get from database*/
			$rowProdBase= mysql_fetch_object($auxPrCart->darUno($rowProduct->mId));
			/*save into database*/
			$auxPrCartA->mIdOrden =$order_id;
			$auxPrCartA->mId =$rowProduct->mId;
			$auxPrCartA->mQty =$rowProduct->mQty;
			$auxPrCartA->mCost =$rowProduct->mCost;		
			$auxPrCartA->guardarProdOrder();
			  
		}
	}
							
     

	

		$me_text = "Gracias por su compra"  ;

}else{
$me_ssage = "";
$me_text = "";


}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $mSiteTitle?> - </title>
<link href="template/css/css.css" rel="stylesheet" type="text/css" />

 
       <script src="template/js/checkout.js" type="text/javascript"></script>


    

<? include("template/resources.php")?>

</head>

<body>

<? include("template/header.php")?>
        
        <div class="CCenter">
          <div class="CC clearfix">
         <h1>Confirmación de Compra</h1>
          <div class="Gen">
             <form name="form1" id="form1"  method="post">
         <input type="hidden" id="act" name="act"  />
           <p>Muchas Gracias por su compra.</p> </form>
                
                          
          </div>
          </div>
        </div>
       <? include("template/footer.php")?>
</body>
</html>
