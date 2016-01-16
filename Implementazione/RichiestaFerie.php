<?php
	
if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 ) && isset($_SESSION['controllorichiesta']) && (strcmp($_SESSION['controllorichiesta'],"ok")==0)){
	$flagp=true;
	
	printf("
			<html>
			<body>
				<div class='col-sm-6' ><!--style='height:130px;'-->
					<div class='form-group-fer'>
						<div class='input-group date' id='data-fer'>
						<center>
						<label class='col-sm-3 control-label' for='datarange-fer'>Inserisci periodo:</label>
							<input type='text'  id='datarange-fer' value='start - end' /><!-- class='data-stra-text' -->
						</center>
						<!--<span class='input-group-addon'>
								<span class='glyphicon glyphicon-calendar'></span>
							</span>-->
						</div>
					</div>
				</div>

				<!--<label class='col-sm-3 control-label' for='descrizione-stra'>Descrizione:</label>
				<div class='col-sm-9'>
				<textarea class='form-control-stra' id='descrizione-stra' cols='40' rows='3'></textarea>
				</div>-->
			</body>
			</html>
			");

	/*printf("
	<html>
	<body>
	<label class='col-sm-3 control-label' for='datastra'>Data:</label>
	<p id='datastra'></p>
	<!--<label class='col-sm-3 control-label' for='descrizionestra'>Descrizione:</label>
	<div class='col-sm-9'>
	<textarea class='form-control' id='descrizionestra' cols='40' rows='3'></textarea>-->
	</div>

			<!--<button class=\"btn btn-default\"  aria-hidden=\"true\" id=\"confirm-malat\">Conferma</input>




			<button class=\"btn btn-danger\" data-dismiss=\"submodal\" id=\"close-malat\">Chiudi</button>-->
	</body>
	</html>");*/
	
	}else{
	$flagp=false;
		  echo 'non loggat';
		 header('location:logout.php');
		 exit;
}
?>





