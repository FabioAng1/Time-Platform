<?php
session_start();
if (isset($_SESSION['ut']) && isset($_SESSION['pw']) && (strlen($_SESSION['ut']) > 0) && (strlen($_SESSION['pw']) > 0)) {
    include_once('xmlObj.php');
    $xml = new XML(3);
    $xml->create("response");

    if (strcmp(substr($matricola, 0, 2), "17") == 0) {//amministratori->17
        //$myPassword = sha1(mysqli_real_escape_string($password));
        //header('Location: admin.php');
        $xml->exec("setter", "admin");
    } else {
        //header('Location: calendario.php');
        $xml->exec("setter", "autista");
    }
} else {

    include_once('xmlObj.php');
    $xml = new XML(3);
    $xml->create("response");
    if ((isset($_POST['matricola']) && isset($_POST['psw'])) && (strlen($_POST['matricola']) == 4) && (strlen($_POST['psw']) == 8)) {

        include('gestoreAuth.php');
        include('utente.php');


        $matricola = $_POST['matricola'];
        $password = $_POST['psw'];

        $utente = new utente($matricola, $password);
        $gestoreAuth = new gestoreAuth();
        $tipo = $gestoreAuth->login($utente);


        //echo $tipo;
        if (strcmp($tipo, "false") != 0) {
            if (strcmp($tipo, "admin") == 0) {
                if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
                    $xml->exec("setter", "admin");
                    //header('Location: admin.php');

                } else {
                    $xml->exec("setter", "errore_sessione_admin");
                    //$gestoreAuth->logout();
                }
            }
            if (strcmp($tipo, "autista") == 0) {
                if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
                    $xml->exec("setter", "autista");
                    //header('Location: calendario.php');

                } else {
                    $xml->exec("setter", "errore_sessione_autista");
                    $gestoreAuth->logout();
                }
            }
        } else {
            $xml->exec("setter", "Matricola o password errata");
            //$gestoreAuth->logout();
            //$dom = new DOMDocument();
            //$dom->loadHTMLFile("index.php");
            //$dom->getElementById("errLog")->nodeValue="Matricola o password errati!";

        }

    } else {
        // echo "logout post";
        $xml->exec("setter", "Matricola o password errata");
        //header('Location:logout.php');
    }
}
?>