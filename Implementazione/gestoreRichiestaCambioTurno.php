<?php


class gestoreRichiestaCambioTurno{
    var $database;
    public function __construct(){
        include_once('database.php');
        $this->database = new Datab();
    }

    public function inserisciRichiestaCambioTurno($cambioTurno)
    {
        $idLinea = $cambioTurno->getIdLinea();
        $fasciaOrario = $cambioTurno->getFasciaOra();
        $descrizione = $cambioTurno->getDescrizione();
        $matrAut=$cambioTurno->getMatricolaAut();
        $idt=$cambioTurno->getIdTurno();


        $str = "INSERT INTO `time-platform`.`rcturno` (`id`,`descrizione`,`fasciaOrario`,`matricolaAut`,`idturno`,`idLinea`) VALUES (NULL,'$descrizione','$fasciaOrario','$matrAut','$idt','$idLinea')";
        if ($this->database->insert_query("time-platform", $str)) {
            return 'ok';
        } else {
            return 'false';
        }

    }

}

?>
