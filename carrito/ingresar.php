<?
include("sys_configuration.php");
include("sources.php");


$message = "";
$act = $_POST['act'];
if($act == 'login') {
	$email = $_POST['email'];
	$password = $_POST['passwd'];
    $oneCustomer = new Cliente();
	
	
		$txterror = $oneCustomer->VerificarDatos($email, $password);
		if($txterror != 'NOOK') {
			
			if (isset($_SESSION["cart"])){

				header("Location: r_cart.php");
			}
				
		}else{
			$message = "Datos incorrectos";
		}
			
			
			
	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $mSiteTitle?> -Ingresar</title>
<link href="template/css/css.css" rel="stylesheet" type="text/css" />



<!--[if gte IE 7]>
    <link href="template/css/css.css/i7.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    
<script>

function validate()
		{
	  if ((document.form1.email.value == "") || (document.form1.passwd.value == "")) {
		  alert("Ingresar datos.");
		  document.form1.email.focus();
		  document.form1.email.select();
		  return false;
	  }
	  document.form1.act.value = "login";
	  document.form1.submit();
	  
}

</script>

    

<? include("template/resources.php")?>

</head>

<body>

<? include("template/header.php")?>
        
        <div class="CCenter">
          <div class="CC clearfix">
         <h1>Ingresar a tu Cuenta</h1>
          <div class="Gen">
             <form name="form1" id="form1"  method="post">
         <input type="hidden" id="act" name="act"  />
           
           <table width="98%" border="0" cellspacing="2" cellpadding="2">
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><strong>Detalles</strong></td>
              </tr>
            <tr>
              <td width="21%">Email :</td>
              <td width="79%"><input name="email" value="prueba@unemail.com" />
                * </td>
            </tr>
            <tr>
              <td>Clave:</td>
              <td><input name="passwd" type="password" id="passwd" value="123456" maxlength="40" />
                * clave 123456</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td style="color:#F00"><? echo $message ?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="left"><input type="button" onclick="javascript:validate()" name="button" id="button" value="Enviar" /><span id="message_submit" style="color:#FF0000; border-left:2px"></span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
        
        
         </form>
                
                          
          </div>
          </div>
        </div>
       <? include("template/footer.php")?>
</body>
</html>
