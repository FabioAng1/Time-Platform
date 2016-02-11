<?php

if (isset($_SESSION['ut']) && isset($_SESSION['pw']) && (strlen($_SESSION['ut']) > 0) && (strlen($_SESSION['pw']) > 0)) {
    $flagp = true;

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

						</div>
					</div>
				</div>

			</body>
			</html>
			");

} else {
    $flagp = false;
    echo 'non loggat';
    header('location:logout.php');
    exit;
}
?>





