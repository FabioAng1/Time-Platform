/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 15/01/2016
 * Time: 10:16
 */

<?php
	class gestoreRichiestaStraordinario{
        var $database;
        public function __construct(){
            include_once('database.php');
            $this->database = new Datab();
        }

        public function inserisciRichiesta($straordinario){
            $data = $straordinario->getData();
            $oraInizio=$straordinario->getOraInizio();
            $oraFine=$straordinario->getOraFine();
            $matricolaAut=$straordinario->getMatricolaAut();
            $str="INSERT INTO `time-platform`.`rstraordinario` (`id`, `oraInizio`, `oraFine`, `matricolaAut`) VALUES (NULL,'$oraInizio','$oraFine','$matricolaAut','$data')";
            if($this->database->insert_query("time-platform",$str)){
                return 'ok';
            }else{
                return 'false';
            }
        }


    }




	?>


