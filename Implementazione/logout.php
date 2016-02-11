<?php
if (!isset($_SESSION)) {
    session_start();
}
unset($_SESSION['ut']);
unset($_SESSION['pw']);
unset($_SESSION['controllorichiesta']);
session_destroy();
header("location: index.php");
exit;
?>