<?php
/**
 * Created by PhpStorm.
 * User: Unisa
 * Date: 15/01/2016
 * Time: 20:28
 */

	class gestoreRichiestaFerie{
        var $database;
        public function __construct(){
            include_once('database.php');
            $this->database = new Datab();
        }

        public function inserisciRichiestaFerie($ferie,$data_odierna){
            $data_inizio = $ferie->getDataInizio();
            $data_fine = $ferie->getDataFine();
            $matricola = $ferie->getMatr();
            if($data_inizio>=$data_odierna && $data_fine>=$data_odierna) {

                $str = "INSERT INTO `time-platform`.`rferie` (`id`,`dataInizio`,`dataFine`,`matricolaAut`) VALUES (NULL,'$data_inizio','$data_fine','$matricola')";
                if ($this->database->insert_query("time-platform", $str)) {
                    return 'ok';
                } else {
                    return 'false';
                }
            }else
                return 'false';
        }


    }

	?>
