<?php
include("sys_configuration.php");
include("sources.php");
if($_GET["act"] == "add_to_cart" && $_GET["cod_product"] != ""){
/*Add Product*/


	$cod_product = $_GET["cod_product"];

	if (!isset($_SESSION["cart"])){
	//echo "";
		$_SESSION["cart"] = new Cart();
	}
	
	
	if ($cod_product == ""){
		//header("Location: index.php");
	}
	
	
	/*Get Product*/
	$auxProducts= new Producto();	
			
	
	$rowProdBase= mysql_fetch_object($auxProducts->darUno($cod_product));	
	$auxProduct= new Producto();
	$auxProduct->mId = $cod_product;
	$qt = "qty_".$cod_product;
	
	$auxProduct->mType = 1;
	$auxProduct->mQty = 1;
	$auxProduct->mCost = $rowProdBase->prod_precio;	
	$_SESSION["cart"]->agregarProduct($auxProduct);
	
	   
		
	header("Location: r_cart.php");
    
	
	
	//$row = $_SESSION["cart"]->showProduct(1);
	//print_r($_SESSION["cart"]->colProducts);

}

?>