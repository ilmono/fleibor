<?php

$error = array();
$response = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$regex = '/^[A-ZÑa-zñÑáéóúí ]+$/';
	if (!preg_match($regex, $_POST['name'])) {
	    $error['name'] = '<li>El nombre es incorrecto</li>';
	}

	$regex = '/^[^0-9][A-z0-9_\-]*([.][A-z0-9_\-]+)*[@][A-z0-9_\-]+([.][A-z0-9_\-]+)*[.][A-z]{2,4}$/';
	if (!preg_match($regex, $_POST['email'])) {
	    $error['mail'] = '<li>El email es incorrecto</li>';
	}

	$regex = '/^[a-zA-Z0-9ñÑáéóúí[:space:]]*$/';
	if (!preg_match($regex, $_POST['query'])) {
	    $error['query'] = '<li>La consulta es incorrecta</li>';
	} 

	$regex = '/^\d+$/';
	if (!preg_match($regex, $_POST['phone'])) {
	    $error['phone'] = '<li>telefono incorrecto</li>';
	} 


	if(isset($error['name'])) {
		if(!$response){
			$response = '<ul class="error">';
		}
		$response .= $error['name'];
	}

	if(isset($error['mail'])) {
		if(!$response){
			$response = '<ul class="error">';
		}
		$response .= $error['mail'];	
	}

	if(isset($error['phone'])) {
		if(!$response){
			$response = '<ul class="error">';
		}
		$response .= $error['phone'];	
	}

	if(isset($error['query'])) {
		if(!$response){
			$response = '<ul class="error">';
		}
		$response .= $error['query'];	
	}

	if($response != false) {
		$response .= '</ul>';
	} else {

	$para  = 'alemoreno@laboratoriofleibor.com.ar';

	// Asunto
	$titulo = 'Fleibor Website [Consulta]';
	// Cuerpo o mensaje
	$mensaje = '
	<html>
	<head>
	  <title>Datos de la consulta - '.date("D-M-Y"). '</title>
	</head>
	<body>
	  <table>
	    <tr style="background: rgb(240, 240, 240);padding: 10px;margin: 15px;height: 63px;color: rgb(66, 66, 66);">
	      <th style="padding: 16px; text-aling:center">Nombre</th>
	      <th style="padding: 16px; text-aling:center">Email</th>
	      <th style="padding: 16px; text-aling:center">Telefono</th>
	      <th style="padding: 16px; text-aling:center">Direccion</th>
	      <th style="padding: 16px; text-aling:center">Codigo Postal</th>
	      <th style="padding: 16px; text-aling:center">Localidad</th>
	      <th style="padding: 16px; text-aling:center">Provincia</th>
	    </tr>
	    <tr style="background: ghostwhite; padding: 10px; margin: 15px; height: 63px;">
	      <td style="padding: 16px">'.$_POST["name"].'</td>
	      <td style="padding: 16px">'.$_POST["email"].'</td>
	      <td style="padding: 16px">'.$_POST["phone"].'</td>
	      <td style="padding: 16px">'.$_POST["direccion"].'</td>
	      <td style="padding: 16px">'.$_POST["codPostal"].'</td>
	      <td style="padding: 16px">'.$_POST["localidad"].'</td>
	      <td style="padding: 16px">'.$_POST["provincia"].'</td>
	    </tr>
	    <tr style="background: rgb(240, 240, 240);padding: 10px;margin: 15px;height: 63px;color: rgb(66, 66, 66);">
	      <th colspan="7" style="padding: 16px; text-aling:center">Consulta</th>
	    </tr>
	     <tr style="background: ghostwhite; padding: 10px; margin: 15px; height: 63px;">
	      <td colspan="7" style="padding: 16px">'.$_POST["query"].'</td>
	    </tr>
	  </table>
	</body>
	</html>
	';

	// Cabecera que especifica que es un HMTL
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$cabeceras .= 'Reply-To:' . $_POST['email'] . "\r\n";

	// Cabeceras adicionales
	$cabeceras .= 'From: Website Fleibor <alemoreno@laboratoriofleibor.com.ar >' . "\r\n";
	// enviamos el correo!
	mail($para, $titulo, $mensaje, $cabeceras);
	header("Location: contact.php?envio=ok");
	}
}