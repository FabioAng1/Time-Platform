<?php
class gestoreSOS{
    var $database;
    public function __construct(){
        include_once('database.php');
        $this->database = new Datab();
    }

    public function inviaSOS($sos){
        $descrizione = $sos->getDescrizione();
        $matricola = $sos->getMatricolaAut();
        $lat=$sos->getLatitudine();
        $lon=$sos->getLongitudine();

        $str="INSERT INTO `time-platform`.`rsos` (`id`, `descrizione`,`Latitudine`,`Longitudine`, `matricolaAut`, `CapoFabbricaMatricola`) VALUES (NULL,'$descrizione','$lat','$lon','$matricola','1850')";
        if($this->database->insert_query("time-platform",$str)){
            return 'ok';
        }else{
            return 'false';
        }
    }


}




?>
