<?php

/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 16/01/2016
 * Time: 22:59
 */
if(isset($_SESSION['ut'])&& isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 )){
    if(strcmp(substr($matricola,0,2),"17")==0){//amministratori->17
        //$myPassword = sha1(mysqli_real_escape_string($password));
        header('Location: admin.php');
    }else{
        header('Location: calendario.php');
    }
}

?>