<?php
require("ProductoPersistent.php");

class Producto  
{

	var $mPer;
	
	var $mIdOrden;
	var $mId;
	var $mQty;
	var $mCost;
	
	
	function Producto() //constructor
	{
		$this->mPer = new ProductoPersistent();	
    }
  
  	function guardarProdOrder() //guardar el producto en la tabla de ordenes
	{   		
    	return $this->mPer->guardarProdOrder($this);
  	}
	
	function darTodosDeCategoria($cod) //me da todos los productos dependiendo de la categoria
	{    	
        return $this->mPer->darTodosDeCategoria($cod);
  	}
		
	function darNombreProd($name) //optimiza el nombre del producto
	{    	
		$name = ucwords($name);
		return $name;		
  	}
	
	function darUno($cod) //me da una producto con el ID
	{    	
        return $this->mPer->darUno($cod);
  	}
	
	function darUltimos($cod) //me da una producto con el ID
	{    	
        return $this->mPer->darUltimos($cod);
  	}

	
	
}
?>