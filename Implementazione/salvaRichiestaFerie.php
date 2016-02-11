<?php
session_start();
global $xml;
include_once('xmlObj.php');
$xml = new XML(3);
$xml->create("response");
if (isset($_SESSION['ut']) && (strlen($_SESSION['ut']) > 0)) {
    //  if(isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0) ){

    if (isset($_POST['data']) &&/*&& isset($_POST['data_fine']) /*&& isset($_POST['data_odierna'])*/ /*&& (strlen($_POST['data_inizio'])>0) &&*/
        (strlen($_POST['data']) > 0)/*&& strlen($_POST['data_odierna'])>0*/
    ) {
        include_once('ferie.php');
        include_once('gestoreRichiestaFerie.php');


        //  $ferie = new ferie($_POST['data_inizio'],$_POST['data_fine'],$_SESSION['ut']);
        $ferie = new ferie($_POST['data'], $_SESSION['ut']);
        $gestoreRichiestaFerie = new gestoreRichiestaFerie();
        //echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
        if (strcmp($gestoreRichiestaFerie->inserisciRichiestaFerie($ferie), 'ok') == 0) {
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
    //  unset($_SESSION['controllorichiesta']);
    //session_destroy();
    //header("location: index.php");
    exit;
}

?>