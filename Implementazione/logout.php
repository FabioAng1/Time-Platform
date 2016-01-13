<?php
	session_start();
	unset($_SESSION['ut']);
	unset($_SESSION['pw']);
	unset($_SESSION['controllo']);
	session_destroy();
	header("location: index.php");
	exit;
	?>