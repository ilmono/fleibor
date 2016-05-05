<?php

include_once 'Database.class.php';

class User
{

    public function login($myUser, $pwd) {
        $mysqli = DataBase::connex();

        $query = '
			SELECT * FROM
				usuarios
			WHERE
				user = "' . $mysqli->real_escape_string($myUser) . '"
			AND
				pass =  "' . md5($pwd) . '"
		';

        $result = $mysqli->query($query);
        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
        }

        if(isset($user['user']) && $user['user'] == $myUser){
            session_start();
            $_SESSION['usuario'] = $user['id'];
            $_SESSION['permisos'] = $this->getPermisos($user['categoria']);
            $result->free();
            $mysqli->close();
            header("Location: index.php");
        }else{
            $result->free();
            $mysqli->close();
            header("Location: login.php?error=log_error&user=".$myUser);
        }
    }

    /********************************************************
    Este metodo devuelve todos los Usuarios de la base de datos
     ********************************************************/
    public function getUsuarios()
    {

        $mysqli = DataBase::connex();
        $query = '
			SELECT
                usuarios.id as id,
                usuarios.nombre as nombre,
                usuarios.telefono as telefono,
                categorias.nombre as categoria,
                usuarios.mail as mail
            FROM
                usuarios,
                categorias
            where
                usuarios.categoria = categorias.id
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $users[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $users;
        }else{
            return false;
        }
    }

    /********************************************************
    Este metodo inserta un Usuarios
     ********************************************************/
    public function registratUsuario($usuario)
    {

        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO usuarios (id, codigo, categoria, nombre, domicilio, localidad, telefono, mail, user, pass) VALUES
			(NULL, "'.strtoupper($usuario['codigo']).'", '.$usuario['categoria'].', "'.strtoupper($usuario['razon_social']).'", "'.strtoupper($usuario['domicilio']).'", "'.strtoupper($usuario['localidad']).'", "'.$usuario['telefono'].'", "'.$usuario['email'].'", "'.$usuario['usuario'].'", "'.md5($usuario['pass']).'");
		';

        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }

    /********************************************************
       Este metodo elimina un Usuario especifico
     ********************************************************/
    public function deleteUsuario($id){
        $mysqli = DataBase::connex();
        $query = '
			DELETE FROM
				usuarios
			WHERE
				usuarios.id = ' . $id . '
			LIMIT
				1
		';
        $mysqli->query($query);
        $mysqli->close();
    }

    /********************************************************
    Este metodo devuelve todas las Categoria de Usuarios
     ********************************************************/
    public function getCategorias()
    {

        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                categorias
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $categorias[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $categorias;
        }else{
            return false;
        }
    }

    /********************************************************
    Este metodo agrega Categoria
     ********************************************************/
    public function agregarCategorias($categoria)
    {

        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO categorias (id, nombre) VALUES
			(NULL, "'.$categoria.'");
		';

        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }

    /********************************************************
    Este metodo devuelve todas las Seccion
     ********************************************************/
    public function getSeccion()
    {

        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                permisos
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $categorias[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $categorias;
        }else{
            return false;
        }
    }

    /********************************************************
    Este metodo agrega Seccion
     ********************************************************/
    public function agregarSeccion($permisos)
    {

        $mysqli = DataBase::connex();
        $query = '
			INSERT INTO permisos (id, nombre) VALUES
			(NULL, "'.$permisos.'");
		';

        $result = $mysqli->query($query);
        $mysqli->close();
        return $result;
    }

    /********************************************************
    Este metodo devuelve todas las Seccion
     ********************************************************/
    public function getPermisos($categoria)
    {

        $mysqli = DataBase::connex();
        $query = '
			SELECT
                *
            FROM
                categoria_permiso
            WHERE
              categoria_id = "'.$categoria.'"
		';

        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $permisos[] = $row;
            }
            $result->free();
            $mysqli->close();
            return $permisos;
        }else{
            return false;
        }
    }

    /********************************************************
    Este metodo agrega Seccion
     ********************************************************/
    public function setPermisos($categoria, $permisos)
    {

        $mysqli = DataBase::connex();
        $query = '
          DELETE FROM
            categoria_permiso
          WHERE
            categoria_id = '. $categoria;

        $result = $mysqli->query($query);
        if(!$result){
            $mysqli->close();
            return $result;
        }

        foreach($permisos as $permiso){
            $query = '
                INSERT INTO categoria_permiso (id, categoria_id, permiso_id) VALUES
                (NULL, "'.$categoria.'", "'.$permiso.'");
            ';

            $result = $mysqli->query($query);
            if(!$result){
                $mysqli->close();
                return $result;
            }
        }

        $mysqli->close();
        header("Location: usuario-categoria.php?categoria=".$categoria);

    }

    /*Las dejo por si me sirve alguna*/
    public function verificar_mail_repetido($mail, $id) {

        $mysqli = DataBase::connex();
        $query = '
			SELECT * FROM
				registro
			WHERE
				registro.mail = "' . $mysqli->real_escape_string($mail) . '"
		';
        $result = $mysqli->query($query);
        if($result->num_rows == 0){
            $this->registrar_mail($mail, $id);
        }else{
            $user = $result->fetch_assoc();
            if($user['estado'] == 'valido'){
                session_start();
                $_SESSION['mail'] = $mail;
                echo 'ok_verificacion';
            }else{
                echo 'a_verificar';
            }
        }
    }

    private function registrar_mail($mail, $id) {
        $mysqli = DataBase::connex();
        $codigo = md5($mail);
        $FechR	= date("Ymd");
        $query = '
			INSERT INTO
				registro
			SET
				registro.id = NULL,
				registro.mail = "'. $mysqli->real_escape_string($mail) .'",
				registro.fecha = "'. $FechR .'",
				registro.estado = "no_validado",
				registro.codigo = "'. $codigo .'"

			';
        $result = $mysqli->query($query);
        $this->enviar_mail_validacion($mail, $codigo, $id);
        echo 'ok_registro';
    }

    private function enviar_mail_validacion($email, $codigo, $id) {
        require("PHPmailer.php");
        $mysqli = DataBase::connex();
        $classMail = new PHPMailer();

        //Con la propiedad Mailer le indicamos que vamos a usar un
        //servidor smtp
        $classMail->Mailer = "smtp";

        //Luego tenemos que iniciar la validación por SMTP:
        $classMail->IsSMTP();
        $classMail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False
        $classMail->Username = "marketing@expohobby.net"; // Cuenta de e-mail
        $classMail->Password = "hugo0714"; // Password

        $classMail->Host = "mail.expohobby.net";

        $classMail->From = "marketing@expohobby.net";
        $classMail->FromName = "Expohobby";
        $classMail->Subject = "Expohobby Validacion de e-mail";
        $classMail->AddAddress("$email");
        $classMail->Port = 25;
        $classMail->WordWrap =200;

        $body  = "
			<html>
				<head>
					<style type='text/css'>
					<!--
						#todomens{
							margin:5px auto;
							height:auto;
							width:715px;
							border:#c1c2c3 solid thin;
							background:#f2f2f3;
						}
						h1{
							text-align:center;
							font-family:Verdana, Geneva, sans-serif;
							color:#FFF;
							font-size:18px;
							background:#906;
							padding:5px;

						}
						#contentrada{
							margin-top:30px 0px 21px 0px;
							height:auto;
							width:613px;
							border:#b4b4b5 dashed thin;
							padding:22px;
							text-align: left;

						}
						#entrada{

							width:600px;
							height:201px;
							margin:5px auto;
						}
						#contnf{
							padding:10px;
							font-family:Verdana, Geneva, sans-serif;
							font-size:14px;
							margin-top:15px;
							color:#3a3a3a;
						}
						.link{
							font-family:Verdana, Geneva, sans-serif;
							color:#909;
							font-size:16px;
								font-weight:bold;
								font-style:none;
								text-decoration:none;
								background:#FFF;
								border:#903 solid thin;
								padding:12px;
								margin:10px;
						}
						-->
					</style>
					<title>Ultimo paso para el registro</title>
				</head>
				<body>
					<center>
						<div id='todomens'>
							<div id='titulo'><h1>Registro Expohobby</h1></div>
							<div id='contentrada'>
								<div id='contnf'>
                                <center><img   width='150' src='http://expohobby.net/imagenes/expohobby.png'></center>
								<p><strong>Excelente!!</strong>, solo falta este último paso, por favor haz click en siguiente link para terminar de validar tu cuenta.</p><br>
									<center><p>
										<a class='link' href='http://expohobby.net/validar_mail.php?mail=$email&codigo=$codigo&id=$id'>Haga click</a><br>
									</p><br></center>
									<p>Si el link anterior no funciona,  por favor copia esta dirección y pégala en la url de tu navegador.</p><br>
									<strong>http://expohobby.net/validar_mail.php?mail=$email&codigo=$codigo&id=$id </strong>

								</div>
							</div>

						</div>
						<p>Lo saluda atentamente <strong>Coordinadores de EXPOHOBBY 2013 </strong>info@expohobby.net<br><br></p>
					</center>
				</body>
			</html>
		";
        $classMail->Body = $body;
        $classMail->Send();
    }
    public function validar_mail($mail, $codigo){

        $mysqli = DataBase::connex();

        $query = '
			UPDATE
	  			registro
	  		SET
				registro.estado = "valido"
	  		WHERE
	  			registro.mail = "' . $mysqli->real_escape_string($mail) . '"
	  		AND
	  			registro.codigo = "'. $codigo .'"
	  		LIMIT 1
	  	';

        $mysqli->query($query);

        if($mysqli->query($query)) {
            return 'ok';
        }
    }

    private function getPager($page, $fechaFinal)
    {
        $mysqli = DataBase::connex();
        $query = '
			SELECT COUNT(*) as registros FROM
				registro
			WHERE
				fecha = "' . $mysqli->real_escape_string(date($fechaFinal)) . '"
		';
        $result = $mysqli->query($query);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc())
            {
                $registros = $row['registros'];
            }
            $result->free();
            $mysqli->close();
            $paginas = $registros / 100;
            if($registros > 100){
                $form = $this->makeSelect(floor($paginas), $page);
                return $form;
            }
            return false;
        }else{
            return false;
        }
    }

    private function makeSelect($pages, $page)
    {
        $options = '';
        for ($i=1; $i <= $pages; $i++) {
            $options .= '<option value="'.$i.'"';
            if($i==$page){
                $options .= ' selected ';
            }
            $options .= '>'.$i.'</option>';
        }
        $form = 'Pagina <select id="selector_pagina" name="selector_pagina">';
        $form .= $options;
        $form .='</select>';
        return $form;
    }


    /********************************************************
    Muestra solo los mails  para seleccionar
     ********************************************************/
    private function format_list_usuarios_email($email){
        $rows = '';
        foreach ($email as $usuario) {
            $rows .= $usuario['mail'].'<br>';
        }
        return $rows;
    }
    /********************************************************
    Genera el listado de mails de cada dia
     ********************************************************/
    private function format_list_usuarios($list){
        $rows = '';
        foreach ($list as $usuario) {
            $rows .= '<tr>';
            $rows .= '<td class="copymail">'.$usuario['mail'].' </td>';
            $rows .= '<td>'.$usuario['fecha'].'</td>';
            if($usuario['estado']=="valido"){
                $rows .= '<td class="statusB">'.$usuario['estado'].'</td>';
            }else{
                $rows .= '<td class="statusM">'.$usuario['estado'].'</td>';
            }
            $rows .= '<td>';
            $rows .= '<a href="#modal_confirmation_'.$usuario['id'].'" class="btn-classic eliminar_revista">Eliminar</a>';
            $rows .= '<div id="modal_confirmation_'.$usuario['id'].'" class="zoom-anim-dialog mfp-hide modal_confirmation">';
            $rows .= '<h3>Eliminar Usuario</h3>';
            $rows .= '<p>Estas seguro que deceas eliminar este Usuario?</p>';
            $rows .= '<form id="usuario_eliminar" action="controllers.php" method="POST">';
            $rows .= '<input type="hidden" name="id" value="'.$usuario['id'].'"/>';
            $rows .= '<input id="btn_cancelar" class="btn-classic" type="button" value="Cancelar" name="btn_cancelar" />';
            $rows .= '<input id="btn_usuario_eliminar" class="btn-classic" type="submit" value="Eliminar" name="btn_usuario_eliminar" />';
            $rows .= '</form>';
            $rows .= '</div>';
            $rows .= '</td>';
            $rows .= '</tr>';
        }
        return $rows;
    }

}
?>
