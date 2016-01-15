<?php
session_start();
global $xml;
include_once('xmlObj.php');
if(isset($_SESSION['ut']) &&(strlen($_SESSION['ut'])>0) ){
    if(isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0) ){

        $xml= new XML(3);
        $xml->create("response");
        if(isset($_POST['data_inizio'])&& isset($_POST['data_fine'])&& (strlen($_POST['data_inizio'])>0) && (strlen($_POST['data_fine'])>0))
        {
             include_once('Ferie.php');
            include_once('gestoreRichiestaFerie.php');


            $ferie = new ferie($_POST['data_inizio'],$_POST['data_fine'],$_SESSION['ut']);

            $gestoreRichiestaFerie = new gestoreRichiestaFerie();
            //echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
            if( strcmp($gestoreRichiestaFerie->inserisciRichiestaFerie($ferie),'ok')==0){
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