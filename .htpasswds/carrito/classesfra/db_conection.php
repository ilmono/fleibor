<?php
function conectDB(){
	$con=mysql_connect(server(), user(), password())
		or die ("Error al conectarse al servidor mysql");
	mysql_select_db("db_estructura")
   		or die ("Error $db");
	return $con;
}
function diconectDB($con){
	mysql_close($con)
		or die ("Error mysql");
	return true;
}
function server(){
	return "localhost";
}
function user(){
     return "root";
}
function password(){
	return "";
}

?>