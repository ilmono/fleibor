<?php
require_once("db_conection.php");
class Persistent {
	
	var $mCod;
	var $mCon;
	var $mSQL;
	var $mTabla;
	var $mDescripcion;
	var $mDateToday ;
	var $mLink ;
	var $mTitulo ;
	var $mCosto ;

	/*Constructor*/
	function Persistent()
	{
		
		$this->setDateToday();
	}

	function setCod($unVal){
		$this->mCod = $unVal;
	}
	function setDescripcion($pVal){$this->mDescripcion = $pVal;}
	function setCon(){
		$this->mCon = conectDB();
	}
	function setSql($pVal){
		$this->mSQL = $pVal;
	}
	
	function closeCon(){
		diconectDB($this->mCon);
	}
	function getSql(){
		return $this->mSQL ;
	}
	function setDateToday(){
	    
		$this->mDateToday = date('Y-m-d h:i:s');
	}
	function save(){
		$this->setCon();
		$retorno = "";
		$result  = mysql_query($this->getSql(),$this->mCon) or die("<br><b>Error saving.</b> (".mysql_error().")<br>Sql: ".$this->getSql());
		$id= mysql_insert_id($this->mCon);
		
		
		return $id;
	}
	function obtain(){
		$this->setCon();
		$retorno = "";
		$result  = mysql_query($this->getSql(),$this->mCon) or die("<br><b>rror geting.</b> (".mysql_error().")<br>Sql: ".$this->getSql());
		
		
		return $result;
	}
	function delete(){
		$this->setCon();
		$retorno = "";
		$result  = mysql_query($this->getSql(),$this->mCon) or die("<br><b>Error Deleting. (".mysql_error().")<br>Sql: ".$this->getSql());
		
		
		return $result;
	}
	function modify(){
		$retorno = "";
		$this->setCon();
		$result  = mysql_query($this->getSql(),$this->mCon) or die("<br><b>Error Updating. (".mysql_error().")<br>Sql: ".$this->getSql());
		diconectDB($this->mCon);
	}

	function dynamic_Delete($cod,$tabla,$clave){
	
		$sql = "Delete from ".$tabla. " where ".$clave." = '$cod'";
		$this->setSql($sql);
		$this->delete();
	}
	
	
   
	function convertToMySql($dateAux) {
		$month=substr($dateAux,0,2);
		$day=substr($dateAux,3,2);
		$year=substr($dateAux,6,10);
		$unVal = "$year-$month-$day" ;
		return $unVal;
       
    }
	
	
	
	function total_format($amount, $dec) {
		$amount = number_format($amount,$dec,".",",");
		return $amount;
       
    }
	
	


   
	
}

?>