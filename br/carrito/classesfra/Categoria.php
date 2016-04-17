<?php
require("CategoriaPersistent.php");

class Categoria  {


	function Categoria() 
	{
		$this->mPer = new CategoriaPersistent();	
    }  
  		
	function darTodas($catid) 
	{       
       return $this->mPer->darTodas($catid);
  	}
	
	function getOne($cod) 
	{    	
        return $this->mPer->getOne($cod);
  	}
	
	
}

?>