<?php
//test file
echo "<center>";
for($i=0;$i<100;$i++) {
    echo "_";
    if($i==50)echo "TEST";
}
echo "</center></br>";
/////////////////////////creazione UTENTE-login////////////////////////////////////////////////////////////////////////
include('gestoreAuth.php');
include('utente.php');
$matricola = "1648";
$password = "123";

$utente = new utente($matricola, $password);
$gestoreAuth = new gestoreAuth();
echo "Effettuo il login...  ";
$tipo = $gestoreAuth->login($utente);


//echo $tipo;
if (strcmp($tipo, "false") != 0) {
    if (strcmp($tipo, "admin") == 0) {
        if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
            echo "login effetuato con successo: ADMIN";
        } else {
            echo "logOut ADMIN";
            $gestoreAuth->logout();
        }
    }
    if (strcmp($tipo, "autista") == 0) {
        if (isset($_SESSION['ut']) && isset($_SESSION['pw'])) {
            echo "login effettuato con successo: AUTISTA";
        } else {
            echo "logOut AUTISTA";
            $gestoreAuth->logout();
        }
    }
 } else {
        echo "logout dati non presenti nel DB";
        $gestoreAuth->logout();
        }
//echo "effettuo il logout...";

/////////////////////////////////////////////////////////////////////////////////////////////////
$arr=array("malat"=>"Avviso malattia","lin"=>"Richiesta cambio linea","ora"=>"Richiesta cambio orario","turn"=>"Richiesta cambio turno","sos"=>"Richiesta soccorso","ferie"=>"Richiesta ferie");

//$arr1=array("malat","stra","fer","lin","ora"=>,"turn","sos");
foreach($arr as $key=>$value){
    echo "<div id='".$key."'></div>";
}


?>
<html>
<head>
    <title>TEST</title>
    <noscript><H1>Richiede JS</H1></noscript>
</head>
<body>


<script>





document.getElementById('malat').innerHTML = "Avviso malattia\n";
document.getElementById('ferie').innerHTML = "Richiesta Ferie...\n";
document.getElementById('lin').innerHTML = "Richiesta cambio linea...\n";
document.getElementById('ora').innerHTML = "Richiesta cambio orario...\n";
document.getElementById('turn').innerHTML = "Richiesta cmbio turno...\n";
document.getElementById('sos').innerHTML = "Richiesta sos...\n";


t1 = setTimeout(ajax("malattia","Mon Feb 01 2016 08:00:00 GMT+0200","abc"),1000);

t2 = setTimeout(ajax("ferie","17-01-2016T10:00:00 02:00","18-01-2016T10:00:00 02:00"),2000);

t3 = setTimeout(ajax("linea","m33","abc","3"),3000);

t4 = setTimeout(ajax("orario","16/24","abc","3"),4000);

t5 = setTimeout(ajax("turno","abc","16/24","3","m33"),5000);

t6 = setTimeout(ajax("sos","abc","17.48","16.48"),6000);

clearTimeout(t1);
clearTimeout(t2);
clearTimeout(t3);
clearTimeout(t4);
clearTimeout(t5);
clearTimeout(t6);

    function ajax(){
        if(window.XMLHttpRequest){
            xhr = new XMLHttpRequest();

            if(arguments[0].localeCompare("malattia")==0){
                //alert("malattia: cosa="+cosa+"&datamalat="+data+"&descrizionemalat="+descrizione);
                xhr.onreadystatechange=gestoreMalattia;
                xhr.open("POST","salvaAvvisoMalattia.php",true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("datamalat="+arguments[2]+"&descrizionemalat="+arguments[1]);

            }

            if(arguments[0].localeCompare("ferie")==0){
                xhr.onreadystatechange=gestoreFerie;
                xhr.open("POST","salvaRichiestaFerie.php",true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("data_inizio="+arguments[1]+"&data_fine="+arguments[2]);
            }

            if(arguments[0].localeCompare("linea")==0){
                xhr.onreadystatechange=gestoreLinea ;
                xhr.open("POST","salvaRichiestaCambioLinea.php",true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("linea="+arguments[1]+"&descrizione="+arguments[2]+"&idTurno="+arguments[3]);
            }


            if(arguments[0].localeCompare("orario")==0){

                xhr.onreadystatechange=gestoreOrario;
                xhr.open("POST","salvaRichiestaCambioOrario.php",true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //jax('orario',fasciaOra,descrizioneOra,calEvent.id);
                xhr.send("fasciaOra="+arguments[1]+"&descrizioneOra="+arguments[2]+"&idTurno="+arguments[3]);
            }

            if(arguments[0].localeCompare("turno")==0){
                xhr.onreadystatechange=gestoreTurno;
                xhr.open("POST","salvaRichiestaCambioTurno.php",true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("descrizione="+arguments[1]+"&fasciaOrario="+arguments[2]+"&idTurno="+arguments[3]+"&idLinea="+arguments[4]);
            }

            if(arguments[0].localeCompare("sos")==0){
                xhr.onreadystatechange=gestoreSos;
                xhr.open("POST","salvaRichiestaSOS.php",true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("descrizione="+arguments[1]+"&lat="+arguments[2]+"&long="+arguments[3]);
            }
        }
    }
function gestoreMalattia() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseXML;
        var ret = response.getElementsByTagName('response');
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("malat").style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("malat").style.color = "red";
        }
    } else {
        document.getElementById("malat").style.color = "blue";
    }
}

function gestoreFerie() {

    if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("ferie").style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("ferie").style.color = "red";
        }
    } else {
        document.getElementById("ferie").style.color = "blue";
    }
}

function gestoreLinea() {

    if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("lin").style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("lin").style.color = "red";
        }
    } else {
        document.getElementById("lin").style.color = "blue";
    }
}

function gestoreOrario() {

    if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("ora").style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("ora").style.color = "red";
        }
    } else {
        document.getElementById("ora").style.color = "blue";
    }
}

function gestoreTurno() {

    if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("turn").style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("turn").style.color = "red";
        }
    } else {
        document.getElementById("turn").style.color = "blue";
    }
}

function gestoreSos() {

    if (xhr.readyState == 4 && xhr.status == 200) {
        var response = xhr.responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("sos").style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("sos").style.color = "red";
        }
    } else {
        document.getElementById("sos").style.color = "blue";
    }
}

</script>
</body>
</html>