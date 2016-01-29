<?php
class Linea{
    var $linea="";
    var $descrizione="";

    public function linea($l,$d){
        $this->linea=$l;

    }

    public function getLinea(){return $this->linea;}

}
?>