<?php

if (isset($_SESSION['ut']) && isset($_SESSION['pw']) && (strlen($_SESSION['ut']) > 0) && (strlen($_SESSION['pw']) > 0)) {
    $flagp = true;
    printf("
	<html>
	<body>
	<label class='col-sm-3 control-label' for='datamalat'>Data:</label>
	<p id='datamalat'></p>
	<label class='col-sm-3 control-label' for='descrizionemalat'>Descrizione:</label>
	<div class='col-sm-9'>
	<textarea class='form-control' id='descrizionemalat' cols='40' rows='3' maxlength='200'></textarea>
	</div>
    </body>
	</html>");

} else {
    $flagp = false;
    echo "non loggat";
    header("location:logout.php");
    exit;
}
?>