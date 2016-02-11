<?php

class cambioOrario
{
    var $fasciaOraria = "";
    var $descrizione = "";
    var $matricola = "";
    var $idTurno = "";

    public function CambioOrario($f, $d, $m, $i)
    {
        $this->fasciaOraria = $f;
        $this->descrizione = $d;
        $this->matricola = $m;
        $this->idTurno = $i;
    }

    public function getFasciaOraria()
    {
        return $this->fasciaOraria;
    }

    public function getDescrizione()
    {
        return $this->descrizione;
    }

    public function getMatricola()
    {
        return $this->matricola;
    }

    public function getIdTurno()
    {
        return $this->idTurno;
    }
}

?>