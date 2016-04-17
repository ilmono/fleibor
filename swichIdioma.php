<?php 
if(isset($_POST['idioma'])){

		$op=$_POST['idioma'];
		if($op=="1"){

			header("location:index.php");
		}
		else{
			
			header("location:br/index.php");
			
			}
}
else{
	
	//header("location:index.php");
	
echo "pasa";
	}