<?php
require_once("Persistent.php");

class CategoriaPersistent extends Persistent 
{

	
    function getOne($cod) {
        $sql = "SELECT * FROM categorias  WHERE cat_id = '$cod'";
        $this->setSql($sql);
        return $this->obtain();
    }
	
	   
	function darTodas($catid) 
	{
    	 $sql = "SELECT * FROM categorias ";
		
		if($catid == "")
		{
			$sql.= " WHERE cat_parent_id = '-1'   ";	
					
		}else{
			
			$sql.= " WHERE cat_parent_id = '$catid'   ";
		
		}
		
		
		$sql.= " order by cat_name  ";
		
		//echo $sql;
		
        $this->setSql($sql);
        return $this->obtain();
    }

}

?>
