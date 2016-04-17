<?php
class Cart 
{
	var $colProducts;

	function calcTotal(){
		$sTotal=0;
		
		for ($i=1; $i <= count($this->colProducts); $i++){
			
			$sTotal=$sTotal + $this->colProducts[$i]->mCost;
		}
		$sTotal = number_format($sTotal,2,".",",") ;
		return $sTotal;
	}
	
	function borrarProduct($linea){
		$pos = 0;
		$colAux;
		for ($i=1; $i <= count($this->colProducts); $i++){
			if ($i != $linea){
				$pos++;
				$colAux[$pos] = $this->colProducts[$i];
			}
		}
		if(!isset($colAux)){
			$colAux=NULL;	
			
		}
		$this->colProducts = $colAux;
		
	} 
	
	
		function sumarprod($linea, $suma){
		
		$pos = 0;
		$colAux;
		for ($i=1; $i <= count($this->colProducts); $i++){
			if ($i == $linea){
				$pos++;
				$this->colProducts[$i]->mQty=$suma;
			}
		}
		var_dump($this->colProducts);
	} 
	
	function agregarProduct($unProducto){
		$this->colProducts[count($this->colProducts)+1]=$unProducto;
	}
	
	function mostrarProduct($line){
		return $this->colProducts[$line];
	}
		
	
}
?>