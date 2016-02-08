<?php
//session_start();
//close();
class gestoreAuth
{
    var $database;

    public function __construct()
    {
        include 'database.php';
        //include_once('auth.php');
        $this->database = new Datab();
    }

    public function logOut()
    {
        header('Location:logout.php');

    }

    public function login($auth)
    {
        if (strcmp(substr($auth->getMatr(), 0, 2), "17") == 0) {//amministratori->17
            //$myPassword = sha1(mysqli_real_escape_string($auth->getPass()));
            // echo "psw: ".$myPassword;
            if ($this->database->login('time-platform', "SELECT * FROM admin WHERE Matricola='" . $auth->getMatr() . "' AND Password='" . $auth->getPass() . "'", $auth->getMatr(), $auth->getPass())) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['ut'] = $auth->getMatr();
                $_SESSION['pw'] = $auth->getPass();
                if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
                    //header('Location: admin.php');
                    return 'admin';
                    //exit;
                } else {

                    return 'false';
                    //exit;
                }
            } else {
                //header('Location: index.php');
                return 'false';
                //exit;
            }
        } else {//autisti 16


            if ($this->database->login('time-platform', "SELECT * FROM autisti WHERE Matricola='" . $auth->getMatr() . "' AND Password='" . $auth->getPass() . "'", $auth->getMatr(), $auth->getPass())) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['ut'] = $auth->getMatr();
                $_SESSION['pw'] = $auth->getPass();
                if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
                    return 'autista';
                    //header('Location: calendario.php');
                    //exit;
                    //echo "calendario";
                } else {
                    return 'false';
                    //exit;
                }
            } else {
                return 'false';
                //header('Location: index.php');
                //exit;
            }
        }

    }

}//fine classe gestoreAuth
?>