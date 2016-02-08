<?php

/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 18/01/2016
 * Time: 11:20
 */
class SOS
{
    var $descrizione = "";
    var $latitudine = "";
    var $longitudine = "";
    var $matricolaAut = "";

    public function SOS($descrizione, $latitudine, $longitudine, $matricolaAut)
    {
        $this->descrizione = $descrizione;
        $this->latitudine = $latitudine;
        $this->longitudine = $longitudine;
        $this->matricolaAut = $matricolaAut;
    }

    public function getMatricolaAut()
    {
        return $this->matricolaAut;
    }

    public function getLatitudine()
    {
        return $this->latitudine;
    }

    public function getDescrizione()
    {
        return $this->descrizione;
    }

    public function getLongitudine()
    {
        return $this->longitudine;
    }

}