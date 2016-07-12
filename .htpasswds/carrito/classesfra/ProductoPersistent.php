<?php
require_once("Persistent.php");

class ProductoPersistent extends Persistent {
	
	function guardarProdOrder($unPerm) 
	{
		$result = "";		
		
		$sql = "INSERT INTO orden_detalles(detalle_orden_id , detalle_producto_id , detalle_cant , detalle_precio )
					
		 VALUES(";
		$sql.= "'".$unPerm->mIdOrden."', ";
		$sql.= "'".$unPerm->mId."', ";
		$sql.= "'".$unPerm->mQty."', ";
		$sql.= "'".$unPerm->mCost."') ";			
					
		$this->setSql($sql);
		$result = $this->save();
		return 	$result;
     }	
	
	 function darUno($cod) 
	 {
        $sql = " SELECT pro.*, cat.cat_id , cat.cat_name ";
		
		$sql .= " FROM productos pro";		
		$sql .= " RIGHT JOIN categorias  cat ON (cat.cat_id = pro.prod_cat_id)";
		$sql .= " WHERE cat.cat_id = pro.prod_cat_id  AND pro.prod_id = '$cod'";	
		
		//echo $sql;
		
        $this->setSql($sql);
        return $this->obtain();
    }
	
	 function darTodosDeCategoria($cat) 
	 {
        $sql = " SELECT pro.*, cat.cat_id , cat.cat_name 	";
		
		$sql .= " FROM productos pro";		
		$sql .= " RIGHT JOIN categorias  cat ON (cat.cat_id = pro.prod_cat_id)";
		$sql .= " WHERE cat.cat_id = pro.prod_cat_id  AND pro.prod_cat_id = '$cat'";	
		
        $this->setSql($sql);
        return $this->obtain();
    }
	
	 function darUltimos($cant) 
	 {
        $sql = " SELECT pro.*, cat.cat_id , cat.cat_name 	";
		
		$sql .= " FROM productos pro";		
		$sql .= " RIGHT JOIN categorias  cat ON (cat.cat_id = pro.prod_cat_id)";
		$sql .= " WHERE cat.cat_id = pro.prod_cat_id LIMIT $cant";	
		
        $this->setSql($sql);
        return $this->obtain();
    }
	
		 
}

?>
