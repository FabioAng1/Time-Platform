<?php

/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 19/01/2016
 * Time: 11:23
 */
class cambioLinea
{
    var $descrizione="";
    var $matricola="";
    var $linea="";

    public function cambioLinea($descrizione,$matricola,$linea){
        $this->descrizione=$descrizione;
        $this->matricola=$matricola;
        $this->linea=$linea;
    }

    public function getDescrizione()
    {
        return $this->descrizione;
    }

    public function getLinea()
    {
        return $this->linea;
    }

    public function getMatricola()
    {
        return $this->matricola;
    }

}