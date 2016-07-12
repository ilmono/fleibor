<?php
require_once("Persistent.php");
class ClientePersistent extends Persistent 
{

	
	
	function darUno($cod) 
	{
        $sql = "SELECT * FROM clientes where 	clien_id = '$cod' and clien_status = 'Activo'";
		
        $this->setSql($sql);
        return $this->obtain();
    }		

	function VerificarDatos($email, $password) 
	{
        $sql = "SELECT * FROM clientes where 
		clien_email = '$email' and clien_clave = '".$password."' and clien_status = 'Activo' ";
     // echo $sql;
		$this->setSql($sql);
        return $this->obtain();
    }
	
	

}

?>
