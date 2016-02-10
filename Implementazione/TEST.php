<html>
<head>
    <title>TEST</title>
    <noscript><H1>Richiede JS</H1></noscript>
    <style type="text/css">
        .risposta {
            color: blue;
        }

        #logout {
            color: red;
        }

        .contenitore {
            background: cadetblue;
            padding: 10px;
            margin-right: 100px;
            margin-left: 100px;
        }

        .testn {
            color: black;
            text-align: center;
        }

    </style>
</head>
<body>
<center><h1>_______________________TEST_____________________</h1></center>

<!--
    <span><button id="tll">Test Login/Logout</button></span>
    <span><button id="Richieste">Test Richieste</button></span>-->


<script>
/*
     document.getElementById("tll").addEventListener("click",function(){
     var quanti = prompt("Quanti test eseguire?");
     testLoLo(quanti);
     });

     document.getElementById("Richieste").addEventListener("click",function(){
     var quante = prompt("Quanti test eseguire?");
     Richieste(quante);
     });*/




    //testLoLo(50);

    Nrichieste(5);

   // testCaratteri(200);

    //testCaratteri(301);

    function testCaratteri(i) {
        var stringa = "";
        for (var x = 1; x <= i; x++) {
            if (x == 200) {
                stringa = stringa + "X";
            } else {
                stringa = stringa + "T";
            }
        }
        document.write("<div class='contenitore'><span class='testn'><h2>TEST con " + i + " caratteri</h2></span>");
        setTimeout(testLogOut(0), 1);

        setTimeout(testLogin(1, "1648", "12345678"), 500);

        setTimeout(testAvvisoMalattia(2, "Mon Feb 01 2016 08:00:00 GMT+0200", stringa), 1000);

        setTimeout(testRichiestaCambioLinea(3, "m33", stringa, "3"), 2000);

        setTimeout(testRichiestaCambioOrario(4, "16/24", stringa, "3"), 3000);

        setTimeout(testRichiestaCambioTurno(5, stringa, "16/24", "3", "m33"), 4000);

        setTimeout(testRichiestaFerie(6, "03/02/2016 5:13 PM - 03/02/2016 5:13 PM"), 5000);

        setTimeout(testRichiestaSos(7, stringa, "17.4", "17.67"), 6000);

        setTimeout(testLogOut(8), 1);
        document.write("</div></br>");
    }


    //inizio test
    function Nrichieste(quante) {

        for (i = 0; i < quante; i++) {
            document.write("<div class='contenitore'><span class='testn'><h2>TEST RICHIESTE N." + i + "</h2></span>");
            setTimeout(testLogOut(i + 0), 1);

            if (i == 0) {
                setTimeout(testLogin(i + 0, "1648", "1234567"), 500);
            }
            else {
                setTimeout(testLogin(i + 1, "1648", "12345678"), 500);
            }
            setTimeout(testAvvisoMalattia(i + 2, "Mon Feb 01 2016 08:00:00 GMT+0200", "test"), 1000);

            setTimeout(testRichiestaCambioLinea(i + 3, "m33", "", "3"), 2000);

            setTimeout(testRichiestaCambioOrario(i + 4, "16/24", "test", "3"), 3000);

            setTimeout(testRichiestaCambioTurno(i + 5, "test", "16/24", "3", "m33"), 4000);

            setTimeout(testRichiestaFerie(i + 6, "03/02/2016 5:13 PM - 03/02/2016 5:13 PM"), 5000);

            setTimeout(testRichiestaSos(i + 7, "test", "17.4", "17.67"), 6000);

            setTimeout(testLogOut(i + 8), 1);
            document.write("</div></br>");
        }

    }

    //inizio stress-test login/logout
    function testLoLo(quanti) {

        for (i = 0; i < quanti; i++) {
            document.write("<div class='contenitore'><span class='testn'><h2>TEST LOGIN/LOGOUT N." + i + "</h2></span>");
           /* eval("var div_"+i+" = document.createElement('div');");
            eval("var span_"+i+" = document.createElement('span');");
            eval("var h2_"+i+" = document.createElement('h2');");
            eval("span_"+i).setAttribute('class','testn');
            eval("div_"+i).setAttribute('class','contenitore');
            eval("span_"+i).appendChild(eval("h2_"+i));
            eval("div_"+i).appendChild(eval("span_"+i));
            eval("txt_"+i+" =document.createTextNode('TEST LOGIN/LOGOUT N.'+i);");
            eval("h2_"+i).appendChild(eval("txt_"+i));
            document.body.appendChild(eval("div_"+i));*/

            setTimeout(testLogOut(i + 0), 1);
            setTimeout(testLogin(i + 1, "1648", "12345678"), 500);
            setTimeout(testLogOut(i + 2), 1);
            document.write("</div></br>");
        }

    }

    function testLogOut(i) {
        document.write("<div id='logout'" + i + "'>(" + i + ") LogOut</div></br></br></br>");
        var t = setTimeout(Richiesta(i, "logout"), 200 * i);
        clearTimeout(t);
    }

    function testLogin(i, matricola, password) {
        <?php if(isset($_SESSION))session_start(); ?>
        document.write("<div id='login'" + i + "'>(" + i + ") Login: <span id='login-span" + i + "' class='risposta'></span></div></br></br>");
        var t0 = setTimeout(Richiesta(i, "login", "" + matricola, "" + password), 200 * i);
        clearTimeout(t0);
    }

    //Mon Feb 01 2016 08:00:00 GMT+0200
    function testAvvisoMalattia(i, data, descrizione) {
        document.write("<div id='malat'" + i + "'>(" + i + ") Avviso malattia: <span id='malat-span" + i + "' class='risposta'></span></div></br></br>");
        var t1 = setTimeout(Richiesta(i, "malattia", "" + data, "" + descrizione), 200 * i);
        clearTimeout(t1);
    }

    //03/02/2016 5:13 PM - 03/02/2016 5:13 PM
    function testRichiestaFerie(i, dataIF) {
        document.write("  <div id='ferie'" + i + "'>(" + i + ") Richiesta Ferie: <span id='ferie-span" + i + "'class='risposta'></span></div></br></br>");
        var t2 = setTimeout(Richiesta(i, "ferie", "" + dataIF), 200 * i);
        clearTimeout(t2);

    }

    function testRichiestaCambioLinea(i, linea, descrizione, idTurno) {
        <?php  $_SESSION['controllorichiesta'] = "ok"; ?>
        document.write("<div id='linea'" + i + "'>(" + i + ") Richiesta cambio linea: <span id='linea-span" + i + "'class='risposta'></span></div></br></br>");
        var t3 = setTimeout(Richiesta(i, "linea", "" + linea, "" + descrizione, "" + idTurno), 200 * i);
        clearTimeout(t3);
    }

    function testRichiestaCambioOrario(i, fasciaOrario, descrizione, idTurno) {
        <?php  $_SESSION['controllorichiesta'] = "ok"; ?>
        document.write("<div id='orario'" + i + "'>(" + i + ") Richiesta cambio orario: <span id='orario-span" + i + "'class='risposta'></span></div></br></br>");
        var t4 = setTimeout(Richiesta(i, "orario", "" + fasciaOrario, "" + descrizione, "" + idTurno), 200 * i);
        clearTimeout(t4);
    }

    function testRichiestaCambioTurno(i, descrizione, fasciaOrario, idTurno, idLinea) {
        <?php  $_SESSION['controllorichiesta'] = "ok"; ?>
        document.write("<div id='turno'" + i + "'>(" + i + ") Richiesta cambio turno: <span id='turno-span" + i + "'class='risposta'></span></div></br></br>");
        var t5 = setTimeout(Richiesta(i, "turno", "" + descrizione, "" + fasciaOrario, "" + idTurno, "" + idLinea), 200 * i);
        clearTimeout(t5);
    }

    function testRichiestaSos(i, descrizione, lat, long) {
        <?php  $_SESSION['controllorichiesta'] = "ok"; ?>
        document.write("<div id='sos'" + i + "'>(" + i + ") Richiesta sos: <span id='sos-span" + i + "'class='risposta'></span></div></br></br>");
        var t6 = setTimeout(Richiesta(i, "sos", "" + descrizione, "" + lat, "" + long), 200 * i);
        clearTimeout(t6);
    }


    function Richiesta() {
        if (window.XMLHttpRequest) {
            n = arguments[0];

            eval('xhr' + n + ' = new XMLHttpRequest();');

            if (arguments[1].localeCompare("logout") == 0) {
                eval('xhr' + n).open("POST", "logout_test.php", false);
                eval('xhr' + n).send();
            }

            if (arguments[1].localeCompare("malattia") == 0) {
                //alert("malattia: cosa="+cosa+"&datamalat="+data+"&descrizionemalat="+descrizione);
                eval('xhr' + n).onreadystatechange = gestoreMalattia;
                eval('xhr' + n).open("POST", "salvaAvvisoMalattia.php", false);
                eval('xhr' + n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr' + n).send("datamalat=" + arguments[2] + "&descrizionemalat=" + arguments[3]);

            }

            if (arguments[1].localeCompare("login") == 0) {
                //alert("malattia: cosa="+cosa+"&datamalat="+data+"&descrizionemalat="+descrizione);
                eval('xhr' + n).onreadystatechange = gestoreLogin;
                eval('xhr' + n).open("POST", "login.php", false);
                eval('xhr' + n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr' + n).send("matricola=" + arguments[2] + "&psw=" + arguments[3]);

            }

            if (arguments[1].localeCompare("ferie") == 0) {
                eval('xhr' + n).onreadystatechange = gestoreFerie;
                eval('xhr' + n).open("POST", "salvaRichiestaFerie.php", false);
                eval('xhr' + n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr' + n).send("data=" + arguments[2]);
            }

            if (arguments[1].localeCompare("linea") == 0) {
                eval('xhr' + n).onreadystatechange = gestoreLinea;
                eval('xhr' + n).open("POST", "salvaRichiestaCambioLinea.php", false);
                eval('xhr' + n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr' + n).send("linea=" + arguments[2] + "&descrizione=" + arguments[3] + "&idTurno=" + arguments[4]);
            }


            if (arguments[1].localeCompare("orario") == 0) {

                eval('xhr' + n).onreadystatechange = gestoreOrario;
                eval('xhr' + n).open("POST", "salvaRichiestaCambioOrario.php", false);
                eval('xhr' + n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //jax('orario',fasciaOra,descrizioneOra,calEvent.id);
                eval('xhr' + n).send("fasciaOra=" + arguments[2] + "&descrizioneOra=" + arguments[3] + "&idTurno=" + arguments[4]);
            }

            if (arguments[1].localeCompare("turno") == 0) {
                eval('xhr' + n).onreadystatechange = gestoreTurno;
                eval('xhr' + n).open("POST", "salvaRichiestaCambioTurno.php", false);
                eval('xhr' + n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr' + n).send("descrizione=" + arguments[2] + "&fasciaOrario=" + arguments[3] + "&idTurno=" + arguments[4] + "&idLinea=" + arguments[5]);
            }

            if (arguments[1].localeCompare("sos") == 0) {
                eval('xhr' + n).onreadystatechange = gestoreSos;
                eval('xhr' + n).open("POST", "salvaRichiestaSOS.php", false);
                eval('xhr' + n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                eval('xhr' + n).send("descrizione=" + arguments[2] + "&lat=" + arguments[3] + "&long=" + arguments[4]);
            }
        }
    }

    function gestoreLogin() {
        if (eval('xhr' + n).readyState == 4 && eval('xhr' + n).status == 200) {
            var ret = (eval('xhr' + n).responseXML).getElementsByTagName("response");
            eval('risp' + n + ' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
            document.getElementById("login-span" + n).innerText = eval('risp' + n);
        } else {
            document.getElementById("login-span" + n).innerText = "errore Response";
        }
    }

    function gestoreMalattia() {
        if (eval('xhr' + n).readyState == 4 && eval('xhr' + n).status == 200) {
            var ret = (eval('xhr' + n).responseXML).getElementsByTagName("response");
            eval('risp' + n + ' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
            document.getElementById("malat-span" + n).innerText = eval('risp' + n);
        } else {
            document.getElementById("malat-span" + n).innerText = "errore Response";
        }
    }

    function gestoreFerie() {
        if (eval('xhr' + n).readyState == 4 && eval('xhr' + n).status == 200) {
            var ret = (eval('xhr' + n).responseXML).getElementsByTagName("response");
            eval('risp' + n + ' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
            document.getElementById("ferie-span" + n).innerHTML = eval('risp' + n);
        } else {
            document.getElementById("ferie-span" + n).innerText = "errore Response";
        }
    }

    function gestoreLinea() {
        if (eval('xhr' + n).readyState == 4 && eval('xhr' + n).status == 200) {
            var ret = (eval('xhr' + n).responseXML).getElementsByTagName("response");
            eval('risp' + n + ' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
            document.getElementById("linea-span" + n).innerHTML = eval('risp' + n);
        } else {
            document.getElementById("linea-span" + n).innerText = "errore Response";
        }
    }

    function gestoreOrario() {
        if (eval('xhr' + n).readyState == 4 && eval('xhr' + n).status == 200) {
            var ret = (eval('xhr' + n).responseXML).getElementsByTagName("response");
            eval('risp' + n + ' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
            document.getElementById("orario-span" + n).innerHTML = eval('risp' + n);
        } else {
            document.getElementById("orario-span" + n).innerText = "errore Response";
        }
    }

    function gestoreTurno() {
        if (eval('xhr' + n).readyState == 4 && eval('xhr' + n).status == 200) {
            var ret = (eval('xhr' + n).responseXML).getElementsByTagName("response");
            eval('risp' + n + ' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
            document.getElementById("turno-span" + n).innerHTML = eval('risp' + n);
        } else {
            document.getElementById("turno-span" + n).innerText = "errore Response";
        }
    }

    function gestoreSos() {
        if (eval('xhr' + n).readyState == 4 && eval('xhr' + n).status == 200) {
            //eval('responsee'+n) = eval('xhr'+n).responseXML;
            var ret = (eval('xhr' + n).responseXML).getElementsByTagName("response");
            eval('risp' + n + ' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
            document.getElementById("sos-span" + n).innerHTML = eval('risp' + n);
        } else {
            document.getElementById("sos-span" + n).innerText = "errore Response";
        }
    }
</script>
</body>
</html>