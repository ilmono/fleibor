<?php
require("OrdenPersistent.php");

class Orden  
{
	var $mPer;

	var $m_orden_cliente_id;
	var $m_orden_total;
	var $m_orden_session_id;
		
	
	function Orden() //constructor
	{
		$this->mPer = new OrdenPersistent();	
    }
  
  	function guardar() 
	{   		
    	return $this->mPer->guardar($this);
  	}	
	
    
}
?>