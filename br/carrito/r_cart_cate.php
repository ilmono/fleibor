<?
include("sys_configuration.php");
include("sources.php");
$cat_id = $_GET["cat"];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $mSiteTitle?> - Sign Up</title>
<link href="template/css/css.css" rel="stylesheet" type="text/css" />

   

<? include("template/resources.php")?>

</head>

<body>

<? include("template/header.php")?>
        
        <div class="CCenter">
          <div class="CC clearfix">
         <h1>Home | </h1>
          <div class="Prod"> 
          
<? include("template/left.php")?>
          
          <div class="MainCont">
          
                 
          <h2>Latest Products</h2>
          <div class="MainCont2">
          
          <ul>
          
           <?
		    
		   $oneAuxProd = new Producto();
		 
			$drPr = $oneAuxProd->darTodosDeCategoria($cat_id);
			$cant_record = mysql_num_rows($drPr);
			
            while($rowPr= mysql_fetch_object($drPr)) {
				
				
				//$urlPhotoMedium1 =  $url_Photos_Location.$rowPr->id."/pics/".$rowPhoto->thubnail;
				
				
		   ?>
          
           <li>
           <img src="product_pics/<?= $rowPr->prod_foto?>" width="100" height="100" />
<p><?= $rowPr->prod_nombre?></p>
            <p>$<?= $rowPr->prod_precio?></p>
            <p><a href="r_cart_add.php?act=add_to_cart&cod_product=<?= $rowPr->prod_id?>">Add to cart</a></p>
           </li>
           
            <?php }     ?>
          
          </ul>
     
          </div>
          
          
          </div>
            
                
                          
          </div>
          </div>
        </div>
       <? include("template/footer.php")?>
</body>
</html>
