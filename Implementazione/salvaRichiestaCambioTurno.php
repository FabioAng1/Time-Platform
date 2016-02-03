<?php
session_start();
global $xml;
include_once('xmlObj.php');
$xml= new XML(3);
$xml->create("response");
if(isset($_SESSION['ut']) &&(strlen($_SESSION['ut'])>0) ){
    if(isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0) ){


        //xhr.send("fasciaOra="+arguments[1]+"&descrizioneOra="+arguments[2]+"&idTurno="+arguments[3]);
        if((isset($_POST['fasciaOrario'])) && (isset($_POST['idTurno']))&& (isset($_POST['descrizione'])) &&(isset($_POST['idLinea']))&& (strlen($_POST['idLinea'])>0)&&(strlen($_POST['fasciaOrario'])>0) && (strlen($_POST['idTurno'])>0))
        {
            include_once('CambioTurno.php');
            include_once('GestoreRichiestaCambioTurno.php');

            if(isset($_POST['descrizione'])) {

                $cambioTurno = new CambioTurno($_POST['descrizione'],$_SESSION['ut'], $_POST['idLinea'],$_POST['idTurno'], $_POST['fasciaOrario']);
            }else{
                $cambioTurno = new CambioTurno("---",$_SESSION['ut'], $_POST['idLinea'],$_POST['idTurno'], $_POST['fasciaOrario']);
            }
            $gestoreRichiestaCambioTurno = new GestoreRichiestaCambioTurno();
            //echo "gestore: ".$gestoreAvvisoMalattia->inserisciAvviso($avvisoMalattia);
            if( strcmp($gestoreRichiestaCambioTurno->inserisciRichiestaCambioTurno($cambioTurno),'ok')==0){
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
        $xml->exec("setter","Richiesta_Fallita_Errore_controllo");
        resetControllo();
        //header('location:logout.php');
        //exit;
    }
}else{
    $xml->exec("setter","Richiesta_Fallita_Errore_utente");
    resetControllo();
}
function resetControllo(){
    unset($_SESSION['controllorichiesta']);
    //session_destroy();
    //header("location: index.php");
    exit;
}
?>