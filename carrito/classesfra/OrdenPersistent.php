<?php
require_once("Persistent.php");

class OrdenPersistent extends Persistent {

	function guardar($Obj) {
		$result = "";		
		
		$sql = "INSERT INTO  ordenes (orden_cliente_id, orden_total , orden_session_id,  orden_fecha )
					
		 VALUES(";
		$sql.= "'".$Obj->m_orden_cliente_id."', ";
		$sql.= "'".$Obj->m_orden_total."', ";
		$sql.= "'".$Obj->m_orden_session_id."', ";
					
		$sql.= "'".date("Y-m-d")."') ";		
					
		$this->setSql($sql);
		$result = $this->save();
		return 	$result;
     }	
	
    
}

?>
