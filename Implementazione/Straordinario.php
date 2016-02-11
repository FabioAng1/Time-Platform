<?php

/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 15/01/2016
 * Time: 09:03
 */
class Straordinario
{
    var $data = "";
    var $oraInizio = "";
    var $oraFine = "";
    var $matricolaAut = "";

    public function Straordinario($data, $oraInizio, $oraFine, $matricolaAut)
    {
        $this->data = $data;
        $this->oraInizio = $oraInizio;
        $this->oraFine = $oraFine;
        $this->matricolaAut = $matricolaAut;
    }

    public function getMatricolaAut()
    {
        return $this->matricolaAut;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getOraInizio()
    {
        return $this->oraInizio;
    }

    public function getOraFine()
    {
        return $this->oraFine;
    }
}