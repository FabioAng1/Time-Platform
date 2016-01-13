<?php
	class Datab{
		public $query;
		public $conn;
		public $lettura=false;
		public function __construct(){
			@$this->conn = mysql_connect("localhost:63342","root","time-platform") or die("impossibile stabilire una connessione col DB");
		}
		
		public function __destruct(){
			if($this->lettura)mysql_free_result($this->query);
			mysql_close($this->conn);
		}
		
		public function login($nomeDB,$qu,$nome,$pass){
			mysql_select_db($nomeDB,$this->conn);
			$this->query = mysql_query($qu,$this->conn);
			if($this->query){
				$riga = mysql_fetch_assoc($this->query);
				if($riga){
					
					if((strcmp($riga['Matricola'],$nome)==0)&&(strcmp($riga['Password'],$pass)==0)){
					$this->lettura=true;
						return true;
						}else{
						return false;
					}
				}else{return false;}
			}else{return false;}
		}
		
		
		public function insert_query($nomeDB,$qu){
			mysql_select_db($nomeDB,$this->conn);
			$this->query = mysql_query($qu,$this->conn);
			if($this->query){
					$this->lettura=false;
					return true;
					}else{
						  return false;
						 }
			}
		
		
		public function queryXML($nomeDB,$qu,$tipo){
			mysql_select_db($nomeDB,$this->conn);
			$this->query = mysql_query($qu,$this->conn);
			include_once('xmlObj.php');
			$xml = new xmlObj($tipo);
			$xml->create("response");
			while($riga = mysql_fetch_assoc($this->query)){
				foreach($riga as $campo=>$valore){
					$xml->exec($campo,$valore);
				}
			}
			$this->lettura=true;
		}
		public function queryJSON($nomeDB,$qu){
		$i=0;
			mysql_select_db($nomeDB,$this->conn);
			$this->query = mysql_query($qu,$this->conn);
			$arr=array();
		
			while($riga = mysql_fetch_assoc($this->query)){
				$arr[$riga['id']]=$riga;
			}
			
			$this->lettura=true;
		
			return $arr;
		}
		
		
		
		public function querySEL($nomeDB,$qu){
			mysql_select_db($nomeDB,$this->conn);
			$this->query = mysql_query($qu,$this->conn);
			if($this->query){
				while($riga = mysql_fetch_assoc($this->query)){
					foreach($riga as $valore){
						echo "<option value='".$valore."'>".$valore."</option>";	
					}
					$this->lettura=true;
				}
			}else{exit("errore");}
		}
		
		
	
		
		
		
	}//fine classe Datab

	
?>