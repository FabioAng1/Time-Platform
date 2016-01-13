<?php
class utente{	
	var $matricola="";
	var $password="";
	
	public function utente($matricola,$password){
		$this->matricola=$matricola;
		$this->password=$password;
		}	
		
	public function getMatr(){return $this->matricola;}
	public function getPass(){return $this->password;}
}
?>