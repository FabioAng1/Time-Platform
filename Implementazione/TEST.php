<html>
<head>
    <title>TEST</title>
    <noscript><H1>Richiede JS</H1></noscript>
    <style type="text/css">
       .risposta{
        color:blue;
        }
    </style>
</head>
<body>
<h1>_______________________TEST_____________________</h1>
<script>

setTimeout(testLogin(0),500);

setTimeout(testAvvisoMalattia(1),1000);

setTimeout(testRichiestaCambioLinea(2),2000);

setTimeout(testRichiestaCambioOrario(3),3000);

setTimeout(testRichiestaCambioTurno(4),4000);

setTimeout(testRichiestaFerie(5),5000);

setTimeout(testRichiestaSos(6),6000);

function testLogin(i){
    <?php session_start(); ?>
    document.write("<div id='login" + i + "'>(" + i + ") Login: <span id='login-span"+i+"' class='risposta'></span></div></br>");
    t1 = setTimeout(Richiesta(i, "login", "1648","1234567"), 200 * i);
    clearTimeout(t1);
}

function testAvvisoMalattia(i) {
     document.write("<div id='malat" + i + "'>(" + i + ") Avviso malattia: <span id='malat-span"+i+"' class='risposta'></span></div></br>");
     t1 = setTimeout(Richiesta(i, "malattia", "Mon Feb 01 2016 08:00:00 GMT+0200", "abc"), 200 * i);
     clearTimeout(t1);
}


    function testRichiestaFerie(i){

        document.write("  <div id='ferie"+i+"'>("+i+") Richiesta Ferie: <span id='ferie-span"+i+"'class='risposta'></span></div></br>");
        t2 = setTimeout(Richiesta(i, "ferie", "03/02/2016 5:13 PM - 03/02/2016 5:13 PM"), 200*i);
        clearTimeout(t2);

    }

    function testRichiestaCambioLinea(i){
        <?php  $_SESSION['controllorichiesta'] = "ok"; ?>
        document.write("<div id='linea"+i+"'>("+i+") Richiesta cambio linea: <span id='linea-span"+i+"'class='risposta'></span></div></br>");
        t3 = setTimeout(Richiesta(i, "linea", "m33", "abc", "3"), 200*i);
        clearTimeout(t3);
            }
     function testRichiestaCambioOrario(i){
         <?php  $_SESSION['controllorichiesta'] = "ok"; ?>
         document.write("<div id='orario"+i+"'>("+i+") Richiesta cambio orario: <span id='orario-span"+i+"'class='risposta'></span></div></br>");
         t4 = setTimeout(Richiesta(i, "orario", "16/24", "abc", "3"), 200*i);
         clearTimeout(t4);
     }

    function testRichiestaCambioTurno(i){
        <?php  $_SESSION['controllorichiesta'] = "ok"; ?>
        document.write("<div id='turno"+i+"'>("+i+") Richiesta cambio turno: <span id='turno-span"+i+"'class='risposta'></span></div></br>");
        t5 = setTimeout(Richiesta(i, "turno", "prova", "16/24", "5", "m33"), 200*i);
        clearTimeout(t5);
    }

    function testRichiestaSos(i){
        <?php  $_SESSION['controllorichiesta'] = "ok"; ?>
        document.write("<div id='sos"+i+"'>("+i+") Richiesta sos: <span id='sos-span"+i+"'class='risposta'></span></div></br>");
         t6 = setTimeout(Richiesta(i, "sos", "abc", "17.48", "16.48"), 200*i);
        clearTimeout(t6);
    }



    function Richiesta(){
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

            if(arguments[1].localeCompare("login")==0){
                //alert("malattia: cosa="+cosa+"&datamalat="+data+"&descrizionemalat="+descrizione);
                eval('xhr'+n).onreadystatechange=gestoreLogin;
                eval('xhr'+n).open("POST","login.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr'+n).send("matricola="+arguments[2]+"&psw="+arguments[3]);

            }

            if(arguments[1].localeCompare("ferie")==0){
                eval('xhr'+n).onreadystatechange=gestoreFerie;
                eval('xhr'+n).open("POST","salvaRichiestaFerie.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr'+n).send("data="+arguments[2]);
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
                eval('xhr'+n).send("descrizione="+arguments[2]+"&fasciaOrario="+arguments[3]+"&idTurno="+arguments[4]+"&idLinea="+arguments[5]);
            }

            if(arguments[1].localeCompare("sos")==0){
                eval('xhr'+n).onreadystatechange=gestoreSos;
                eval('xhr'+n).open("POST","salvaRichiestaSOS.php",false);
                eval('xhr'+n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr'+n).send("descrizione="+arguments[2]+"&lat="+arguments[3]+"&long="+arguments[4]);
            }
        }
    }

function gestoreLogin(){
    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {

        var ret = (eval('xhr'+n).responseXML).getElementsByTagName("response");
        eval('risp'+n+' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
        document.getElementById("login-span"+n).innerText = eval('risp'+n);

    } else {

        document.getElementById("login-span"+n).innerText = "errore Response";
    }
}

function gestoreMalattia() {
    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {

        var ret = (eval('xhr'+n).responseXML).getElementsByTagName("response");
        eval('risp'+n+' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
        document.getElementById("malat-span"+n).innerText = eval('risp'+n);

    } else {

        document.getElementById("malat-span"+n).innerText = "errore Response";
    }
}

function gestoreFerie() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var ret = (eval('xhr'+n).responseXML).getElementsByTagName("response");
        eval('risp'+n+' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
        document.getElementById("ferie-span"+n).innerHTML = eval('risp'+n);

    } else {
        document.getElementById("ferie-span"+n).innerText = "errore Response";
    }
}

function gestoreLinea() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var ret = (eval('xhr'+n).responseXML).getElementsByTagName("response");
        eval('risp'+n+' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
        document.getElementById("linea-span"+n).innerHTML = eval('risp'+n);

    } else {
        document.getElementById("linea-span"+n).innerText = "errore Response";
    }
}

function gestoreOrario() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var ret = (eval('xhr'+n).responseXML).getElementsByTagName("response");
        eval('risp'+n+' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
        document.getElementById("orario-span"+n).innerHTML = eval('risp'+n);

    } else {
        document.getElementById("orario-span"+n).innerText = "errore Response";
    }
}

function gestoreTurno() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        var ret = (eval('xhr'+n).responseXML).getElementsByTagName("response");
        eval('risp'+n+' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
        document.getElementById("turno-span"+n).innerHTML = eval('risp'+n);

    } else {
        document.getElementById("turno-span"+n).innerText = "errore Response";
    }
}

function gestoreSos() {

    if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {
        //eval('responsee'+n) = eval('xhr'+n).responseXML;
        var ret = (eval('xhr'+n).responseXML).getElementsByTagName("response");
         eval('risp'+n+' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');

        document.getElementById("sos-span"+n).innerHTML = eval('risp'+n);

    } else {
        document.getElementById("sos-span"+n).innerText = "errore Response";
    }
}

</script>
</body>
</html>