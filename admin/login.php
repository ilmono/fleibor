<?php
	include 'includes.php';
	if(isset($_POST['username'])){
		$user = new User();
		$user->login($_POST['username'], $_POST['password']);
		/*echo '<pre>';
		var_dump($_POST);
		die('kb');*/
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Admin - Fleibor Website</title>
		<meta name="Fleibor Website" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php include("includes/header.php"); ?>
		<div class="account-container">
			<div class="content clearfix">
				<form action="#" method="post">
					<h1>Ingrese a su cuenta.</h1>
					<?php if(isset($_GET['error']) && $_GET['error'] == 'log_error'){?>
						<p>Nombre de usuario o contraseña incorrectos.</p>
					<?php }?>
					<div class="login-fields">
						<div class="field">
							<label for="username">Nombre de Usuario:</label>
							<input type="text" id="username" name="username" value="<?php if(isset($_GET['user'])){echo $_GET['user'];}?>" placeholder="Nombre de Usuario" class="login username-field" />
						</div> <!-- /field -->
						<div class="field">
							<label for="password">Contraseña:</label>
							<input type="password" id="password" name="password" value="" placeholder="Contraseña" class="login password-field"/>
						</div> <!-- /password -->
					</div> <!-- /login-fields -->
					<div class="login-actions">
						<button class="button btn btn-success btn-large">Entrar</button>
					</div> <!-- .actions -->
				</form>
			</div> <!-- /content -->
		</div> <!-- /account-container -->
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/signin.js"></script>
	</body>
</html>