<?php
	
if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 ) && isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0)){
	$flagp=true;
	
	//printf("<div class='col-sm-6' style='height:130px;'> <div class='form-group-stra'><div class='input-group date' id='datastra'><input type='text' class='form-control-stra' /><span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div></div></br><label class='col-sm-3 control-label' for='descrizionemalat'>Descrizione:</label><div class='col-sm-9'><textarea class='form-control-stra' id='descrizionestra' cols='3' rows='3'></textarea></div>");

	printf("
		<div style=\"overflow:hidden;\">
    <div class=\"formgroup-stra\">
        <div class=\"row\">
            <div class=\"col-md-8\">
                <div id=\"datastra\"></div>
            </div>
        </div>
    </div>
			<label class=\"col-sm-3 control-label\" for=\"descrizionestra\">Descrizione:</label>
	
	</div>

	
			");																																												
	
	}else{
	$flagp=false;
		  echo 'non loggat';
		 header('location:logout.php');
		 exit;
}
?>





