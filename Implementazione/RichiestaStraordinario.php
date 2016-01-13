<?php

	if(isset($_SESSION['controllo']) && (strcmp($_SESSION['controllo'],"ok")==0) ){
					if(isset($_POST['datastra'])&&isset($_POST['orainit']) && isset($_POST['orafin'])&& (strlen($_POST['orainit'])>0)&& (strlen($_POST['orafin'])>0) ){
								 
										$data=$_POST['datastra'];
										$orainit=$_POST['orainit'];
										$orafin=$_POST['orafin'];
										$str="INSERT INTO `time-platform`.`rstraordinario` (`id`, `oraInizio`,`oraFine`, `MatricolaAut`,`Data`) VALUES (NULL,'$orainit','$orafin','$matricola','$data')";
										
										if($database->insert_query("rstraordinario",$str)){
												$xml->exec("setter","ok");
												}else{
													 $xml->exec("setter","fallito12");
													 }
									}else{
										$xml->exec("setter","fallito13");
										termina();
										}
					}else{
						$xml->exec("setter","fallito13");
						header('location:logout.php');
						exit;
						 }
	?>