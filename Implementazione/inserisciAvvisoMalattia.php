<?php
session_start();
global $xml;
include_once('xmlObj.php');
if(isset($_SESSION['ut']) &&(strlen($_SESSION['ut'])>0) ){
	if(isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0) ){
																						
																						$xml= new XML(3);
																						$xml->create("response");
																					if(isset($_POST['datamalat'])&&isset($_POST['descrizionemalat'])&& (strlen($_POST['datamalat'])>0) ){
																									
																									include_once('Avvisomalattia.php');
																									include_once('gestoreAvvisoMalattia.php');
																								
																									
																									
																									 $avvisoMalattia = new avvisoMalattia($_POST['datamalat'],$_POST['descrizionemalat'],$_SESSION['ut']);
																									
																									 $gestoreAvvisoMalattia = new gestoreAvvisoMalattia();
																											//echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
																								     if(strcmp($gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia),'ok')==0){
																																												 $xml->exec("setter","ok");	
																																												
																																												 resetControllo();
																																													}else{
																																														 $xml->exec("setter","fallito13");	
																																														// echo "fallito";
																																														 resetControllo();
																																															}
																											
																											
																										}else{
																											$xml->exec("setter","fallito13");
																											echo "errore post";
																											resetControllo();
																											}
																						}else{
																							echo "errore sessione";
																							resetControllo();
																							//header('location:logout.php');
																							//exit;
																							 }
}else{
	echo "errore sessione utente";
	resetControllo();
}
	function resetControllo(){
							unset($_SESSION['controllo']);
							//session_destroy();
							//header("location: index.php");
							exit;
							}
	?>