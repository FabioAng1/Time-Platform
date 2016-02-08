<?php

class GestoreRichiestaCambioOrario
{
    var $database;

    public function __construct()
    {
        include_once('database.php');
        $this->database = new Datab();
    }

    public function inserisciRichiestaCambioOrario($cambioOrario)
    {
        $fasciaOraria = $cambioOrario->getFasciaOraria();
        $descrizione = $cambioOrario->getDescrizione();
        $matrAut = $cambioOrario->getMatricola();
        $idt = $cambioOrario->getIdTurno();


        $str = "INSERT INTO `time-platform`.`rcorario` (`id`,`descrizione`,`fasciaOrario`,`matricolaAut`,`idturno`) VALUES (NULL,'$descrizione','$fasciaOraria','$matrAut','$idt')";
        if ($this->database->insert_query("time-platform", $str)) {
            return 'ok';
        } else {
            return 'false';
        }

    }

}

?>
