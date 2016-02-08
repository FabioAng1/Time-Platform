<?php
session_start();
global $xml;
include_once('xmlObj.php');
if (isset($_SESSION['ut']) && (strlen($_SESSION['ut']) > 0)) {
    if (isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'], "ok") == 0)) {

        $xml = new XML(3);
        $xml->create("response");
        if (isset($_POST['oraInizio']) && isset($_POST['oraFine']) && (strlen($_POST['data']) > 0)) {


            include_once('Straordinario.php');
            include_once('gestoreRichiestaStraordinario.php');


            $straordinario = new Straordinario($_POST['oraInizio'], $_POST['oraFine'], $_SESSION['ut'], $_POST['data']);

            $gestoreRichiestaStraordinario = new gestoreRichiestaStraordinario();
            //echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
            if (strcmp($gestoreRichiestaStraordinario->inserisciRichiesta($avvisoMalattia), 'ok') == 0) {
                $xml->exec("setter", "ok");

                resetControllo();
            } else {
                $xml->exec("setter", "fallito13");
                // echo "fallito";
                resetControllo();
            }


        } else {
            $xml->exec("setter", "fallito13");
            echo "errore post";
            resetControllo();
        }
    } else {
        echo "errore sessione";
        resetControllo();
        //header('location:logout.php');
        //exit;
    }
} else {
    echo "errore sessione utente";
    resetControllo();
}
function resetControllo()
{
    unset($_SESSION['controllo']);
    //session_destroy();
    //header("location: index.php");
    exit;
}

?>