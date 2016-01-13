<?php
		
	if(isset($_POST['matricola'])&&isset($_POST['psw'])){	
				include_once('gestoreAuth.php');
				include_once('utente.php');
				$matricola=$_POST['matricola'];
				$password=$_POST['psw'];
				
				$utente = new utente($matricola,$password);
				$gestoreAuth = new gestoreAuth();
				
				
				$tipo = $gestoreAuth->login($utente);
				
				
				if(strcmp($tipo,"false")!=0){  
											if(strcmp($tipo,"admin")==0){
												if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])){
																									header('Location: admin.php');							
																									}else{
																										//$gestoreAuth->logout();
																										}
																		}
											if(strcmp($tipo,"autista")==0){
																			if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])){
																																header('Location: calendario.php');							
																															   }else{
																																	echo "logOut calendario";
																																	//$gestoreAuth->logout();
																																		}
																			}
											}else{
												 // $gestoreAuth->logout();
												  }
	}else{
		 echo "logout post";
			//header('Location:logout.php');
			}

	?>