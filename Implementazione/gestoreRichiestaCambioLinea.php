<?php


class gestoreRichiestaCambioLinea
{
    var $database;

    public function __construct()
    {
        include_once('database.php');
        $this->database = new Datab();
    }

    public function inserisciRichiestaCambioLinea($cambioLinea)
    {
        $linea = $cambioLinea->getLinea();
        $descrizione = $cambioLinea->getDescrizione();
        $matrAut = $cambioLinea->getMatricola();
        $idt = $cambioLinea->getIdTurno();


        $str = "INSERT INTO `time-platform`.`rclinea` (`id`,`descrizione`,`Linea`,`matricolaAut`,`idturno`) VALUES (NULL,'$descrizione','$linea','$matrAut','$idt')";
        if ($this->database->insert_query("time-platform", $str)) {
            return 'ok';
        } else {
            return 'false';
        }

    }

}

?>
