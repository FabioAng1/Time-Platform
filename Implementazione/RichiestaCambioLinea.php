<?php

if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 ) && isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0)){
    $flagp=true;
    printf("
			<html>
            <head>
            <style type=\"text/css\">
            #contenitore{
                        position:relative;
                         }
            #menu-linea{
                position:fixed;
                top:0;
                left:10px;

            }
            #descL{
            position:relative;
            }
            </style>

            </head>
            <body>
            <label class='col-sm-3 control-label' for='contenitore'>Linee:</label>
            <div id=\"contenitore\">
			   <select id='listaLinee'>");
			     include('database.php');
                 $database1 = new Datab();
                 // $database1->insert-query('time-platform',"SELECT `time-platform`.`idLinea` FROM `time-platform`.`turno` WHERE `start`=");
                 $database1->querySEL('time-platform','SELECT * FROM `time-platform`.`linee` WHERE 1');

    printf("
    </select>
             </div>

                </br>

                <div id=\"descL\">
	                <label class='col-sm-3 control-label' for='descrizioneL'>Descrizione:</label>
	                <div class='col-sm-9'>
	                <textarea class='form-control' id='descrizioneL' cols='40' rows='3'></textarea>
	                </div>
            </div>
			</body>
			</html>
			");
}else{
    $flagp=false;
    echo 'non loggat';
    header('location:logout.php');
    exit;
}
?>



