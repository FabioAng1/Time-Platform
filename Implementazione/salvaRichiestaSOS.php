<?php
session_start();
global $xml;
include_once('xmlObj.php');
if(isset($_SESSION['ut']) &&(strlen($_SESSION['ut'])>0) ){
    if(isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0) ){

        $xml= new XML(3);
        $xml->create("response");
        if(isset($_POST['descrizione'])&&isset($_POST['lat'])&& (strlen($_POST['long'])>0) ){

            include_once('SOS.php');
            include_once('gestoreSOS.php');



            $sos = new sos($_POST['descrizione'],$_POST['lat'],$_POST['long'],$_SESSION['ut']);

            $gestoreSOS = new gestoreSOS();
            //echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
            if(strcmp($gestoreSOS->inviaSOS($sos),'ok')==0){
                $xml->exec("setter","ok");

                resetControllo();
            }else{
                $xml->exec("setter","Richiesta_Fallita");
                // echo "fallito";
                resetControllo();
            }


        }else{
            $xml->exec("setter","Richiesta_Fallita_errore_Dati");
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
    unset($_SESSION['controllorichiesta']);
    //session_destroy();
    //header("location: index.php");
    exit;
}
?>