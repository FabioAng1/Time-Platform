<?php
$arr = array("fer" => "Richiesta ferie", "sos" => "Richiesta soccorso");
foreach ($arr as $key => $value) {
    echo "
				    <div class=\"modal submodal\" id=\"my-submodal-" . $key . "\">
                        <div class=\"modal-dialog\">
                            <div class=\"modal-content\">
                                <div class=\"modal-body\">
                                    <p class=\"text-center\">" . $value . "<br/></p>
                                     <form class=\"form-horizontal\">
                                        <div class=\"form-group\" id=\"formgroup-" . $key . "\">
                                         <!-- <label class=\"col-sm-3 control-label\" for=\"descrizione\">Descrizione:</label>
                                            <div class=\"col-sm-9\">
                                                <textarea class=\"form-control\" id=\"descrizione" . $key . "\" cols=\"3\" rows=\"3\"></textarea>
                                            </div>-->
                                        </div>
                                    </form>
                                </div>
                                <div class=\"modal-footer\">
                                    <button class=\"btn btn-default\"  aria-hidden=\"true\" data-dismiss\"submodal\" id=\"confirm-" . $key . "\">Conferma</button>
                                    <button class=\"btn btn-danger\" data-dismiss=\"submodal\" id=\"close-" . $key . "\">Chiudi</button>
                                </div>
                            </div>
                        </div>
                    </div>
				   ";
}
?>