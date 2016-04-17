<?php
include("sys_configuration.php");
include("sources.php");


if(isset($_POST['idprod']))
	{
		if(isset($_POST['stock']))
		{
		$_SESSION["cart"]->sumarprod($_POST['idprod'], $_POST['stock']);
		header("Location: r_cart.php");
		}
		
	}
	
?>