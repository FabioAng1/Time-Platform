<?php

class ferie
{
    var $data_init = "";
    var $data_fin = "";
    var $matricola = "";

    public function ferie($data1, $matr)
    {

        ////data inizio//////////////////////////////////////////////////////
        //03/02/2016 5:13 PM - 03/02/2016 5:13 PM
        $data_inizio = substr($data1, 0, strpos($data1, '-'));
        $data_inizio_data = substr($data_inizio, 0, strpos($data_inizio, ' '));
        $data_inizio_data = str_replace("/", "-", $data_inizio_data);

        $ora_inizio = substr($data_inizio, strpos($data_inizio, ' ') + 1);

        $ora_inizio = str_replace("PM", "", $ora_inizio);
        $ora_inizio = str_replace("AM", "", $ora_inizio);
        $ora_inizio = str_replace(" ", "", $ora_inizio);

        $data_inizioo = $data_inizio_data . "T" . $ora_inizio . ":00+02:00";

        ///////data fine/////////////////////////////////////////////////////
        $data_fine = substr($data1, strpos($data1, '-') + 2);
        $data_fine_data = substr($data_fine, 0, strpos($data_fine, ' '));

        $data_fine_data = str_replace("/", "-", $data_fine_data);
        $ora_fine = substr($data_fine, strpos($data_fine, ' ') + 1);

        $ora_fine = str_replace("PM", "", $ora_fine);
        $ora_fine = str_replace("AM", "", $ora_fine);
        $ora_fine = str_replace(" ", "", $ora_fine);
        $data_finee = $data_fine_data . "T" . $ora_fine . ":00+02:00";
        ////////////////////////////////////////////////////////////////////
        $this->data_init = $data_inizioo;
        $this->data_fin = $data_finee;
        $this->matricola = $matr;
    }

    public function getDataInizio()
    {
        return $this->data_init;
    }

    public function getDataFine()
    {
        return $this->data_fin;
    }

    public function getMatr()
    {
        return $this->matricola;
    }
}

?>