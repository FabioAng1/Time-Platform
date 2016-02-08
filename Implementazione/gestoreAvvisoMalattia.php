<?php

class gestoreAvvisoMalattia
{
    var $database;

    public function __construct()
    {
        include_once('database.php');
        $this->database = new Datab();
    }

    public function inserisciAvviso($avvisoMalattia)
    {
        $data = $avvisoMalattia->getData();
        $descrizione = $avvisoMalattia->getDescrizione();
        $matricola = $avvisoMalattia->getMatr();
        $str = "INSERT INTO `time-platform`.`avvisomalattia` (`id`, `Data`, `Descrizione`, `MatricolaAut`) VALUES (NULL,'$data','$descrizione','$matricola')";
        if ($this->database->insert_query("time-platform", $str)) {
            return 'ok';
        } else {
            return 'false';
        }
    }


}


?>
