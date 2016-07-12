<?php
require("ClientePersistent.php");

class Cliente {
   //
   
   var $mPer;
   
   var $mGender;
   var $m_firstname;
   var $m_lastname;
   var $m_email;
  
  

  
   function Cliente() //constructor
	{
		$this->mPer = new ClientePersistent();	
    }

   
	
	function VerificarDatos($email, $password) 
	{
	    $resp = "NOOK";
    	
		$rowCutomer = 	$this->mPer->VerificarDatos($email, $password);	
		if(isset($_SESSION['cliente'])) {
			unset($_SESSION['cliente']);
        }
		
		if(mysql_num_rows($rowCutomer) != 0){		    
			
			$rowCustomer = mysql_fetch_object($rowCutomer);
			if($rowCustomer->clien_status == "Activo" )
			{ 
				$_SESSION['cliente'] =$rowCustomer;
			}
			
			$resp = $rowCustomer;
		}
		return $resp;
		        
    }
	
	
	
	function darUno($cod) 
	{
    	
        return $this->mPer->darUno($cod);
    }
	
}

?>