<?php

class CambioTurno
{
    var $descrizione = "";
    var $fasciaOrario = "";
    var $matricolaAut = "";
    var $idLinea = "";
    var $idTurno = "";

    public function CambioTurno($descrizione, $matricola, $idLinea, $idT, $fasciaOra)
    {
        $this->descrizione = $descrizione;
        $this->matricolaAut = $matricola;
        $this->idLinea = $idLinea;
        $this->idTurno = $idT;
        $this->fasciaOrario = $fasciaOra;

    }

    public function getFasciaOra()
    {
        return $this->fasciaOrario;
    }

    public function getIdTurno()
    {
        return $this->idTurno;
    }

    public function getDescrizione()
    {
        return $this->descrizione;
    }

    public function getIdLinea()
    {
        return $this->idLinea;
    }

    public function getMatricolaAut()
    {
        return $this->matricolaAut;
    }

}