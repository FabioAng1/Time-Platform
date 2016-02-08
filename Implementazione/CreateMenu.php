<script>
    menu = {
        "malat": "Avviso Malattia",
        "fer": "Richiesta Ferie",
        "lin": "Richiesta Cambio Linea",
        "ora": "Richiesta Cambio Orario",
        "turn": "Richiesta Cambio Turno",
        "sos": "Richiesta Soccorso"
    };
    document.write('<form class="form-horizontal"><div class="form-group">');
    document.write("<center>");
    for (var key in menu) {
        if ((key.localeCompare("sos") != 0) && (key.localeCompare("fer") != 0)) {
            // if(((start == 8 && end == 16) && (hours < 8 && min < 40) || ((start == 16 && end == 00) && (hours < 15 && min < 40))) && (key.localeCompare("malat")!=0) ) {
            document.write("<button type=\"button\" class=\"menus btn btn-default\" data-toggle=\"submodal\" href=\"#my-submodal-" + key + "\">" + menu[key] + "</button>" + "</br>");
            //  }
        }
    }
    document.write("</center>");
    document.write("</div></form>")
</script>
