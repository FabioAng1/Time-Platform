<?php
session_start();
if (isset($_SESSION['ut']) && isset($_SESSION['pw']) && (strlen($_SESSION['ut']) > 0) && (strlen($_SESSION['pw']) > 0)) {
    include 'classi.php';
    $database = new Datab();
    $database->queryXML("data_utenti", "SELECT n,utente,Nome,Cognome FROM utenti", 1);
    //$database->queryXML("data_linee","SELECT * FROM linee");
} else {
    unset($_SESSION['ut']);
    unset($_SESSION['pw']);
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
	
