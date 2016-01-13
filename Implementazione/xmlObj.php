<?php
	class XML{
		public $name;
		public $finecampo;
		public $tipo;
		public function __construct($t){
			$this->tipo=$t;
			header("Content-type: text/xml;charset=utf-8");
			echo "<?xml version='1.0' encoding='UTF-8'?>";
		}
		public function create($n){
			$this->name=$n;
			echo "<".$this->name.">";
		}
		public function exec($campo,$valore){
			switch($this->tipo){
						 case 1://utenti
								if((strcmp($campo,"n")==0)){
								echo "<".$campo." n=\"".$valore."\">";
								$this->finecampo=$campo;
									}else{	
									echo "<".$campo.">".$valore."</".$campo.">";	
									if((strcmp($campo,"Cognome")==0)){echo "</".$this->finecampo.">";}
										}
								break;
									
								
						case 2://linee
								if((strcmp($campo,"n")==0)){
								echo "<".$campo." n=\"".$valore."\">";
								$this->finecampo=$campo;
									}else{	
									echo "<".$campo.">".$valore."</".$campo.">";	
									if((strcmp($campo,"corsa")==0)){echo "</".$this->finecampo.">";}
										}
								break;
						case 3:
							  echo "<".$campo.">".$valore."</".$campo.">";	
							 break;
							}
		}
		public function __destruct(){echo "</".$this->name.">";}									
	}
?>