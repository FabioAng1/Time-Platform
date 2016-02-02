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
/*$arr=array("malat"=>"Avviso malattia","lin"=>"Richiesta cambio linea","ora"=>"Richiesta cambio orario","turn"=>"Richiesta cambio turno","sos"=>"Richiesta soccorso","ferie"=>"Richiesta ferie");

//$arr1=array("malat","stra","fer","lin","ora"=>,"turn","sos");
foreach($arr as $key=>$value){
    echo "<div id='".$key."'></div>";
}*/


?>
<html>
<head>
    <title>TEST</title>
    <noscript><H1>Richiede JS</H1></noscript>
</head>
<body>


<script>







for(i=0;i<10;i++) {
    document.write("<div id='malat"+i+"'>("+i+") Avviso malattia</div>");
    document.write("<div id='ferie"+i+"'>("+i+") Richiesta Ferie</div>");
    document.write("<div id='lin"+i+"'>("+i+") Richiesta cambio linea</div>");
    document.write("<div id='ora"+i+"'>("+i+") Richiesta cambio orario</div>");
    document.write("<div id='turn"+i+"'>("+i+") Richiesta cmbio turno</div>");
    document.write("<div id='sos"+i+"'>("+i+") Richiesta sos</div>");

   /* document.getElementById('malat"+i+"').innerHTML = "("+i+") Avviso malattia...\n";
    document.getElementById('ferie').innerHTML = "("+i+") Richiesta Ferie...\n";
    document.getElementById('lin').innerHTML = "("+i+") Richiesta cambio linea...\n";
    document.getElementById('ora').innerHTML = "("+i+") Richiesta cambio orario...\n";
    document.getElementById('turn').innerHTML = "("+i+") Richiesta cmbio turno...\n";
    document.getElementById('sos').innerHTML = "("+i+") Richiesta sos...\n";*/



    t1 = setTimeout(ajax(i, "malattia", "Mon Feb 01 2016 08:00:00 GMT+0200", "abc"), 100*i);

    t2 = setTimeout(ajax(i, "ferie", "17-01-2016T10:00:00 02:00", "18-01-2016T10:00:00 02:00"), 100*i);

    t3 = setTimeout(ajax(i, "linea", "m33", "abc", "3"), 100*i);

    t4 = setTimeout(ajax(i, "orario", "16/24", "abc", "3"), 100*i);

    t5 = setTimeout(ajax(i, "turno", "abc", "16/24", "3", "m33"), 100*i);

    t6 = setTimeout(ajax(i, "sos", "abc", "17.48", "16.48"), 100*i);
}
clearTimeout(t1);
clearTimeout(t2);
clearTimeout(t3);
clearTimeout(t4);
clearTimeout(t5);
clearTimeout(t6);

    function ajax(){
        if(window.XMLHttpRequest){
            n=arguments[0];

            eval('xhr'+n+' = new XMLHttpRequest();');

            if(arguments[1].localeCompare("malattia")==0){
                //alert("malattia: cosa="+cosa+"&datamalat="+data+"&descrizionemalat="+descrizione);
                eval('xhr'+n).onreadystatechange=gestoreMalattia;
                eval('xhr'+n).open("POST","salvaAvvisoMalattia.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr'+n).send("datamalat="+arguments[2]+"&descrizionemalat="+arguments[3]);

            }

            if(arguments[1].localeCompare("ferie")==0){
                eval('xhr'+n).onreadystatechange=gestoreFerie;
                eval('xhr'+n).open("POST","salvaRichiestaFerie.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr'+n).send("data_inizio="+arguments[2]+"&data_fine="+arguments[3]);
            }

            if(arguments[1].localeCompare("linea")==0){
                eval('xhr'+n).onreadystatechange=gestoreLinea ;
                eval('xhr'+n).open("POST","salvaRichiestaCambioLinea.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr'+n).send("linea="+arguments[2]+"&descrizione="+arguments[3]+"&idTurno="+arguments[4]);
            }


            if(arguments[1].localeCompare("orario")==0){

                eval('xhr'+n).onreadystatechange=gestoreOrario;
                eval('xhr'+n).open("POST","salvaRichiestaCambioOrario.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //jax('orario',fasciaOra,descrizioneOra,calEvent.id);
                eval('xhr'+n).send("fasciaOra="+arguments[2]+"&descrizioneOra="+arguments[3]+"&idTurno="+arguments[4]);
            }

            if(arguments[1].localeCompare("turno")==0){
                eval('xhr'+n).onreadystatechange=gestoreTurno;
                eval('xhr'+n).open("POST","salvaRichiestaCambioTurno.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr'+n).send("descrizione="+arguments[1]+"&fasciaOrario="+arguments[2]+"&idTurno="+arguments[3]+"&idLinea="+arguments[4]);
            }

            if(arguments[1].localeCompare("sos")==0){
                eval('xhr'+n).onreadystatechange=gestoreSos;
                eval('xhr'+n).open("POST","salvaRichiestaSOS.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr'+n).send("descrizione="+arguments[2]+"&lat="+arguments[3]+"&long="+arguments[4]);
            }
        }
    }
function gestoreMalattia() {
    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var response = eval('xhr'+n).responseXML;
        var ret = response.getElementsByTagName('response');
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("malat"+n).style.color = "green";
           //document.getElementById('malat').innerText('ok');
            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("malat"+n).style.color = "red";
        }
    } else {
        document.getElementById("malat"+n).style.color = "blue";
    }
}

function gestoreFerie() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var response = eval('xhr'+n).responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("ferie"+n).style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("ferie"+n).style.color = "red";
        }
    } else {
        document.getElementById("ferie"+n).style.color = "blue";
    }
}

function gestoreLinea() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var response = eval('xhr'+n).responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("lin"+n).style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("lin"+n).style.color = "red";
        }
    } else {
        document.getElementById("lin"+n).style.color = "blue";
    }
}

function gestoreOrario() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var response = eval('xhr'+n).responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("ora"+n).style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("ora"+n).style.color = "red";
        }
    } else {
        document.getElementById("ora"+n).style.color = "blue";
    }
}

function gestoreTurno() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var response = eval('xhr'+n).responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("turn"+n).style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("turn"+n).style.color = "red";
        }
    } else {
        document.getElementById("turn"+n).style.color = "blue";
    }
}

function gestoreSos() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var response = eval('xhr'+n).responseXML;
        var ret = response.getElementsByTagName("response");
        var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

        if ("" + risp.localeCompare('ok')) {
            document.getElementById("sos"+n).style.color = "green";

            //$('#my-submodal-malat').css("background-color","transparent");
        } else {
            document.getElementById("sos"+n).style.color = "red";
        }
    } else {
        document.getElementById("sos"+n).style.color = "blue";
    }
}

</script>
</body>
</html>