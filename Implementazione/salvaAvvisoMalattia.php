<?php
session_start();
global $xml;
include_once('xmlObj.php');
$xml = new XML(3);
$xml->create("response");
if (isset($_SESSION['ut']) && (strlen($_SESSION['ut']) > 0)) {
//	if(isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0) ){


    if (isset($_POST['datamalat']) && isset($_POST['descrizionemalat']) && (strlen($_POST['datamalat']) > 0)) {

        include_once('avvisomalattia.php');
        include_once('gestoreAvvisoMalattia.php');


        $avvisoMalattia = new avvisoMalattia($_POST['datamalat'], $_POST['descrizionemalat'], $_SESSION['ut']);

        $gestoreAvvisoMalattia = new gestoreAvvisoMalattia();
        //echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
        if (strcmp($gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia), 'ok') == 0) {
            $xml->exec("setter", "ok");

            resetControllo();
        } else {
            $xml->exec("setter", "Richiesta_Fallita");
            // echo "fallito";
            resetControllo();
        }


    } else {
        $xml->exec("setter", "Richiesta_Fallita");
        //echo "errore post";
        resetControllo();
    }
    /*}else{
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
    //	unset($_SESSION['controllorichiesta']);
    //session_destroy();
    //header("location: index.php");
    exit;
}

?>