<?php

if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 ) && isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0)){
    $flagp=true;
$str=addslashes("height:50%");
    printf("
			<html>





			<body>
                   <p id='datamalat'></p>
	                <label class='col-sm-3 control-label' for='descrizioneSOS'>Descrizione:</label>
	                <div class='col-sm-9'>
	                <textarea class='form-control' id='descrizioneSOS' cols='40' rows='3'></textarea>
	                </div>
                    <div id='map'></div>

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