<?php
	session_start();
	if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 )){
			 include 'classi.php';
			 $xml = new XML(3);//è un tipo assegnato tramite switch nel file classi.php
			 $xml->create("response");
			 $matricola=$_SESSION['ut'];
		if(isset($_POST['cosa'])&&(strlen($_POST['cosa'])>0)){
			 $cosa=$_POST['cosa'];
			 $database = new Datab();
			 
			 if(strcmp($cosa,"malattia")==0){
				$_SESSION['controllo']="ok";
				include 'Avvisomalattia.php';
				}
				if(strcmp($cosa,"straordinario")==0){
				$_SESSION['controllo']="ok";
				 include 'RichiestaFerie.php';
				}
				if(strcmp($cosa,"ferie")==0){
				$_SESSION['controllo']="ok";
				 include 'RichiestaFerie.php';
				}
				if(strcmp($cosa,"linea")==0){
				$_SESSION['controllo']="ok";
				include 'RichiestaCambioLinea.php';
				}
				if(strcmp($cosa,"orario")==0){
				$_SESSION['controllo']="ok";
				 include 'CambioOrario.php';
				}
				if(strcmp($cosa,"turno")==0){
				$_SESSION['controllo']="ok";
				 include 'RichiestaCambioTurno.php';
				}
				if(strcmp($cosa,"sos")==0){
				$_SESSION['controllo']="ok";
				 include 'RichiestaSos.php';
				}
				
				
			}else{
				 $xml->exec("setter","fallito14");
				 $_SESSION['controllo']="error";
				 termina();	
					}
		
		}else{
			$_SESSION['controllo']="error";
			termina();
			}
	function termina(){
			$flagp=false;
		   // echo 'non loggat';
		    header('location:logout.php');
			exit;
			}
	
	?>