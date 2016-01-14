<?php

$connessione=false;
if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])){
	$matricola=$_SESSION['ut'];
	$password=$_SESSION['pw'];
	if(strcmp(substr($matricola,0,2),"17")==0){//amministratori->17
												//$myPassword = sha1(mysqli_real_escape_string($password));
												header('Location: admin.php');
												}else{
													  header('Location: calendario.php');
														}
}

if((isset($_POST['matricola'])&&isset($_POST['psw']))) {

				include('gestoreAuth.php');
				include ('utente.php');
				$matricola = $_POST['matricola'];
				$password = $_POST['psw'];

				$utente = new utente($matricola,$password);
				$gestoreAuth = new gestoreAuth();


				$tipo = $gestoreAuth->login($utente);


				if(strcmp($tipo,"false")!=0){
											if(strcmp($tipo,"admin")==0){
												if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])){
																									header('Location: admin.php');
																									}else{
																										$gestoreAuth->logout();
																										}
																		}
											if(strcmp($tipo,"autista")==0){
																			if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])){
																																header('Location: calendario.php');
																															   }else{
																																	echo "logOut calendario";
																																	$gestoreAuth->logout();
																																		}
																			}
											}else{
												  $gestoreAuth->logout();
												  }
}else{
	// echo "logout post";
	header('Location:logout.php');
}
?>