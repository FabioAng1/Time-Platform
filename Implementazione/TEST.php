<?php
//test file
echo "<center>";
for($i=0;$i<100;$i++) {
    echo "_";
    if($i==50)echo "TEST";
}
echo "</center>";


include('gestoreAuth.php');
include('utente.php');
$matricola = $_POST['matricola'];
$password = $_POST['psw'];

$utente = new utente($matricola, $password);
$gestoreAuth = new gestoreAuth();
$tipo = $gestoreAuth->login($utente);


//echo $tipo;
if (strcmp($tipo, "false") != 0) {
    if (strcmp($tipo, "admin") == 0) {
        if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
            header('Location: admin.php');
        } else {
            $gestoreAuth->logout();
        }
    }
    if (strcmp($tipo, "autista") == 0) {
        if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
            header('Location: calendario.php');
        } else {
            echo "logOut calendario";
            $gestoreAuth->logout();
        }
    }
} else {
        $gestoreAuth->logout();
        }





?>