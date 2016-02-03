<?php

if ((isset($_POST['matricola']) && isset($_POST['psw']))) {

			include('gestoreAuth.php');
			include('utente.php');
			include_once('xmlObj.php');
			$xml= new XML(3);
			$xml->create("response");


			$matricola = $_POST['matricola'];
			$password = $_POST['psw'];

			$utente = new utente($matricola, $password);
			$gestoreAuth = new gestoreAuth();
			$tipo = $gestoreAuth->login($utente);


			//echo $tipo;
			if (strcmp($tipo, "false") != 0) {
				if (strcmp($tipo, "admin") == 0) {
					if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
						$xml->exec("setter","ok");
						header('Location: admin.php');

					} else {
						$gestoreAuth->logout();
					}
				}
				if (strcmp($tipo, "autista") == 0) {
					if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
						$xml->exec("setter","ok");

						//header('Location: calendario.php');

					} else {


						$gestoreAuth->logout();
					}
				}
			} else {
				$gestoreAuth->logout();
				//$dom = new DOMDocument();
				//$dom->loadHTMLFile("index.php");
				//$dom->getElementById("errLog")->nodeValue="Matricola o password errati!";


			}
		} else {
			// echo "logout post";
			$xml->exec("setter","errore login");
			header('Location:logout.php');
	}

?>