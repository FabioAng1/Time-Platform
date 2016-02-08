<?php
session_start();
if (isset($_SESSION['ut']) && isset($_SESSION['pw']) && (strlen($_SESSION['ut']) > 0) && (strlen($_SESSION['pw']) > 0)) {
    include 'classi.php';
    $xml = new XML(3);
    $xml->create("response");
    if ((isset($_POST['title'])) && (isset($_POST['id'])) && (isset($_POST['start'])) && (isset($_POST['end']))) {
        $title = $_POST['title'];
        $id = $_POST['id'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        if ((strlen($title) > 0) && (strlen($id) > 0) && (strlen($start) > 0) && (strlen($end) > 0)) {
            $database = new Datab();

            if ($database->insert_query("data_orari", "INSERT INTO orari (title,id,start,end) VALUES ('$title',$id,'$start','$end')")) {

                $xml->exec("setter", "ok");

            } else {
                $xml->exec("setter", "errore insert");
            }
        } else {
            $xml->exec("setter", "errore strlen");
        }
    } else {
        $xml->exec("setter", "errore isset");
    }
} else {
    $xml->exec("setter", "errore session");
}
function close()
{

    unset($_SESSION['ut']);
    unset($_SESSION['pw']);
    session_destroy();
    header('Location: index.php');
    exit;
}

?>