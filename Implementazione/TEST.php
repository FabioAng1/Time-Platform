<?php
//test file

include_once('database.php');

$database1 = new Datab();


// test sulla select richiesta cambio linea
printf("
<label class='col-sm-3 control-label' for='contenitore'>Linee:</label>
            <div id=\"contenitore\">
			   <select name='lista'>
                 $database1->querySEL('time-platform','SELECT * FROM `time-platform`.`linee` WHERE 1');
               </select>

                </div>");





?>