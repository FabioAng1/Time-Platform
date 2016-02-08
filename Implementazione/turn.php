<?php
if (isset($_SESSION['ut']) && isset($_SESSION['pw']) && (strlen($_SESSION['ut']) > 0) && (strlen($_SESSION['pw']) > 0)) {
    $flagp = true;
    printf("<html><body><label class='col-sm-3 control-label' for='data'>Data:</label><p id='data'>gtreb</p><label class='col-sm-3 control-label' for='descrizione'>Descrizione:</label><div class='col-sm-9'><textarea class='form-control' id='descrizione' cols='3' rows='3'></textarea></div></body></html>");

} else {
    $flagp = false;
    echo "non loggat";
    header("location:logout.php");
    exit;
}
?>