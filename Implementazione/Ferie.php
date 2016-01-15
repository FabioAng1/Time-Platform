<?php
class Ferie{
    var $data_inizio="";
    var $data_fine="";
    var $matricola="";

    public function Ferie($data1,$data2,$matr){
        $this->data_inizio=$data1;
        $this->data_fine=$data2;
        $this->matricola=$matr;
    }

    public function getDataInizio(){return $this->datainizio;}
    public function getDataFine(){return $this->data_fine;}
    public function getMatr(){return $this->matricola;}
}

?>