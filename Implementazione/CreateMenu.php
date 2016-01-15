<?php

echo '<form class="form-horizontal"><div class="form-group">';
                         								
echo "<center>";
foreach($arr as $key=>$value){
    if((strcmp($key,'sos')!=0) && (strcmp($key,'fer')!=0))
    echo "<button type=\"button\" class=\"menus btn btn-default\" data-toggle=\"submodal\" href=\"#my-submodal-".$key."\">".$value."</button>"."</br>";
}
echo "</center>";
			                  
echo "</div></form>";
?>



<!--  <div class="col-sm-8">
                                <a href="#my-submodal" role="button" class="btn btn-default btn-xs" data-toggle="submodal">Close my account...</a>
                                <p>Using a submodal to do something as serious as close an account is shitty UX, Jacob</p>
                            </div>-->