<?php
	class AvvisoMalattia{
						var $data="";
						var $descrizione="";
						var $matricola="";
						
						public function avvisoMalattia($data,$descr,$matr){
																		$this->data=$data;
																		$this->descrizione=$descr;		
																		$this->matricola=$matr;
																			}
																			
						public function getData(){return $this->data;}
						public function getDescrizione(){return $this->descrizione;}
						public function getMatr(){return $this->matricola;}
						}

	?>