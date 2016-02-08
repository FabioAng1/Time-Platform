<?php
session_start();
global $xml;
include_once('xmlObj.php');
$xml = new XML(3);
$xml->create("response");
if (isset($_SESSION['ut']) && (strlen($_SESSION['ut']) > 0)) {
    // if(isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0) ){


    if (isset($_POST['linea']) && isset($_POST['descrizione']) && isset($_POST['idTurno']) && (strlen($_POST['idTurno']) > 0) && (strlen($_POST['linea']) > 0)) {
        include_once('cambioLinea.php');
        include_once('gestoreRichiestaCambioLinea.php');


        $cambioLinea = new cambioLinea($_POST['descrizione'], $_SESSION['ut'], $_POST['linea'], $_POST['idTurno']);

        $gestoreRichiestaCambioLinea = new gestoreRichiestaCambioLinea();
        //echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
        if (strcmp($gestoreRichiestaCambioLinea->inserisciRichiestaCambioLinea($cambioLinea), 'ok') == 0) {
            $xml->exec("setter", "ok");

            resetControllo();
        } else {
            $xml->exec("setter", "Richiesta_Fallita");
            // echo "fallito";
            resetControllo();
        }


    } else {
        $xml->exec("setter", "Richiesta_Fallita_errore_Dati");
        //echo "errore post";
        resetControllo();
    }
    /* }else{
         $xml->exec("setter","Richiesta_Fallita_Errore_controllo");
         resetControllo();
         //header('location:logout.php');
         //exit;
     }*/
} else {
    $xml->exec("setter", "Richiesta_Fallita_Errore_utente");
    resetControllo();
}
function resetControllo()
{
    // unset($_SESSION['controllorichiesta']);
    //session_destroy();
    //header("location: index.php");
    exit;
}


?>