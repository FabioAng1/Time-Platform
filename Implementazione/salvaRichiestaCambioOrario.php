<?php
session_start();
global $xml;
include_once('xmlObj.php');
if(isset($_SESSION['ut']) &&(strlen($_SESSION['ut'])>0) ){
    if(isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0) ){

        $xml= new XML(3);
        $xml->create("response");
        //xhr.send("fasciaOra="+arguments[1]+"&descrizioneOra="+arguments[2]+"&idTurno="+arguments[3]);
        if(isset($_POST['fasciaOra'])&& isset($_POST['idTurno'])&& (strlen($_POST['fasciaOra'])>0) && strlen($_POST['idTurno'])>0)
        {
            include_once('CambioOrario.php');
            include_once('GestoreRichiestaCambioOrario.php');

            if(isset($_POST['descrizioneOra'])) {

                $cambioOrario = new CambioOrario($_POST['fasciaOra'], $_POST['descrizioneOra'], $_SESSION['ut'], $_POST['idTurno']);
            }else{
                $cambioOrario = new CambioOrario($_POST['fasciaOra'], "---", $_SESSION['ut'], $_POST['idTurno']);
            }
            $gestoreRichiestaCambioOrario = new GestoreRichiestaCambioOrario();
            //echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
            if( strcmp($gestoreRichiestaCambioOrario->inserisciRichiestaCambioOrario($cambioOrario),'ok')==0){
                $xml->exec("setter","ok");

                resetControllo();
            }else{
                $xml->exec("setter","fallito13");
                // echo "fallito";
                resetControllo();
            }


        }else{
            $xml->exec("setter","fallito14");
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