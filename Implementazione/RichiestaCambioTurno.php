<?php

if (isset($_SESSION['ut']) && isset($_SESSION['pw']) && (strlen($_SESSION['ut']) > 0) && (strlen($_SESSION['pw']) > 0)) {
    $flagp = true;


    if (strcmp($tipo, "A") == 0) {
        printf("
                                    <label class='col-sm-3 control-label' for='fascia-ora-turno'>Fascia:</label>
                                    <div class='col-sm-9'>
                                    <p id='fascia-ora-turno'>16/24</p>
                                    </div>
                                    <label class='col-sm-3 control-label' for='list'>Linee:</label>
            <div id=\"list\">
			   <select id='listaLineet'>
                                    ");
    } else {
        if (strcmp($tipo, "B") == 0) {
            printf("
                                    <label class='col-sm-3 control-label' for='fascia-ora-turno'>Fascia:</label>
                                    <div class='col-sm-9'>
                                    <p id='fascia-ora-turno'>8/16</p>
                                    </div>
                                    <label class='col-sm-3 control-label' for='list'>Linee:</label>
            <div id=\"list\">
			   <select id='listaLineet'>

                                    ");
        }
    }


    include_once('database.php');
    $database2 = new Datab();
    $database2->querySEL('time-platform', 'SELECT * FROM `time-platform`.`linee` WHERE 1');


    printf("
            </select>
            </div>
                <label class='col-sm-3 control-label' for='descrizione-turno'>Descrizione:</label>
				<div class='col-sm-9'>
				<textarea class='form-control-ora' id='descrizione-turno' cols='40' rows='3' maxlength='200'></textarea>
				</div>

			");

} else {
    $flagp = false;
    echo 'non loggat';
    header('location:logout.php');
    exit;
}
?>
