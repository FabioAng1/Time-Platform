<?php
session_start();
if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 )){
	//include "database.php";
	//$utente=$_SESSION['ut'];
	//$passw=$_SESSION['pw'];
	
	//$datab = new Datab();
	//$datab->querySEL("localita","SELECT nome FROM citta");
	 //echo "<script type='text/javascript'>flag=true;</script>";
	$flagp=true;
	}else{
		  $flagp=false;
		//  echo "<script type='text/javascript'>flag=false;</script>";
		  //unset($_SESSION['ut']);
		  //unset($_SESSION['pw']);
		  //session_destroy();
		  header("location:logout.php");
		  exit;
		  }
	?>
<html>
	
	<head>
	<meta charset='utf-8' />

		<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
		<link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='fullcalendar/lib/jquery.min.js'></script>
		<script src='fullcalendar/lib/moment.min.js'></script>
		<script src='fullcalendar/fullcalendar.js'></script>
		<script src='fullcalendar/lang-all.js'></script>
		<link rel="stylesheet" type="text/css" href="stile.css">
			<!--<script src='fullcalendar/jquery.contextmenu.js'></script>-->
		<!--<link rel='stylesheet' href='fullcalendar/jquery.contextmenu.css'></link>-->
	    <!--<link rel='stylesheet' href='bootstrap/bootstrapmodal.css'></link>-->
		<!--<script src='bootstrap/bootstrapmodal.min.js'></script>-->
	    <!--<script src='fullcalendar/frc/fullcalendar-rightclick.js'></script>-->
		
	  <!--  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/bs.sm.css">
		<!--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
		<script type="text/javascript" src="bootstrap/dist/bs.sm.js"></script>

		
		        <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
     
        <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		
<!--
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />-->
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

		   <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		
			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
		
		<!--<script src='fullcalendar/fullcalendar.min.js'></script>-->
			
		<style type="text/css">
			
			#title{font-size:3em;font-weight:800; text-align:center; left:50%; color:#ff5722;}
			#chiudi{position:relative; left:50%; font-size:20px; font-weight:400; padding: 7px 7px 7px 7px;}
			body{background:white;}
			#bodys{background:white;}
			#footers{padding: 30px 30px 30px 30px;}

            #map{position:relative;display:block;margin-left: auto;
                margin-right: auto;height:50%; width: 100%}
		</style>
		<title>Calendario</title>
	</head>
	
	<body>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2yNtlZO5JfHa1Fia5l_bfyRKmLnvHhcA&signed_in=true&callback=initMap"
            async defer>
    </script>
		<script type="text/javascript" language="javascript">
if((flagp=<?php echo $flagp;?>)==true){
            var pos;


			String.prototype.replaceAll = function(target, replacement) {
				return this.split(target).join(replacement);
			};



			function isoDate(msSinceEpoch) {
											var d = new Date(msSinceEpoch);
											return d.getUTCFullYear() + '-' + (d.getUTCMonth() + 1) + '-' +'0'+ d.getUTCDate() + 'T' + d.getUTCHours() + ':' + d.getUTCMinutes() + ':' + d.getUTCSeconds();
										   }
		
		
			matricola=<?php echo $_SESSION['ut'];?>;
			//alert("matricola: "+matricola);
			
			$(document).ready(function() {
				$('#my-submodal-fer').on('show', function() {

					$('#formgroup-fer').html(`<?php include"RichiestaFerie.php";?>`);
					//$('#data-fer').text(calEvent.start);
					$('#datarange-fer').daterangepicker({
						timePicker: true,
						timePickerIncrement: 30,

						minDate: $('#calendar').fullCalendar('getDate'),

                       // startDate: $('#calendar').fullCalendar('getDate'),


                        endDate: $('#calendar').fullCalendar('getDate'),

                            dateLimit: {
                                       "days": 30
                                       },




						locale: {
							format: 'DD/MM/YYYY h:mm A'
						}
					});
				});$('#confirm-fer').click(function(){
													data_fer=document.getElementById("datarange-fer").value;
													ajax("ferie",data_fer);
													});

				$('#close-fer').click(function(){
					$('#my-submodal-fer').css("background-color","transparent");
				});



                //RICHEISTA SOS

				$('#my-submodal-sos').on('show', function() {



                    (function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: -34.397, lng: 150.644},
                            zoom: 16
                        });
                        var infoWindow = new google.maps.InfoWindow({map: map});

                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                 pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };

                                infoWindow.setPosition(pos);
                                infoWindow.setContent('Sei qui.');
                                map.setCenter(pos);
                            }, function() {
                                handleLocationError(true, infoWindow, map.getCenter());
                            });
                        } else {
                            // Browser doesn't support Geolocation
                            handleLocationError(false, infoWindow, map.getCenter());
                        }
                    })();

                    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                        infoWindow.setPosition(pos);
                        infoWindow.setContent(browserHasGeolocation ?
                            'Error: The Geolocation service failed.' :
                            'Error: Your browser doesn\'t support geolocation.');
                    }

				});

                $('#my-submodal-sos').on('beforeShow', function() {

                    $('#formgroup-sos').html(`<?php include "RichiestaSos.php";?>`);



                });

                $('#close-sos').click(function(){
                    $('#my-submodal-sos').css("background-color","transparent");
                });

                $('#confirm-sos').click(function(){
                    $('#my-submodal-sos').css("background-color","transparent");

                    var descr=document.getElementById("descrizioneSOS").value;
                    ajax("sos",descr,pos.lat,pos.lng);
                });


				// page is now ready, initialize the calendar...
				$('#calendar').fullCalendar({

											height: 550,
											lang: 'it',//lingua italiana
											default:1,//parte da lunedi

										//defaultDate: '2015-02-12',

										eventLimit: 5, //visualizza 5 eventi alla volta in un singolo giorno
										events: {
											url: 'json/get-events.php?id='+matricola,
											error: function() {
												$('#script-warning').show();
											},
										},

										loading: function(bool) {
											$('#loading').toggle(bool);
										},
					customButtons: {
						rferie: {
							text: 'Richiesta Ferie',
							click: function() {$('#my-submodal-fer').submodal('show');}
						},
						rsos: {
							text: 'Richiesta SOS',
							click:function(){$('#my-submodal-sos').submodal('show');}
						}

					},
					header: {
						left: 'prev,next today, rferie,rsos',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},


										 eventClick:  
											function(calEvent, jsEvent, view) {
                                                now = new Date();
                                                giornoEvento = new Date(moment(calEvent.start).format('YYYY-MM-DD'));

                                                start = parseInt(moment(calEvent.start).format('HH'));																							//start = start.substring(start.indexOf('T'),start.indexOf('+'));
                                               // end= parseInt(moment(calEvent.end).format('HH'));
                                                hours = parseInt(now.getHours());
                                                min = parseInt(now.getMinutes());


                                                if(giornoEvento.toLocaleDateString()>=now.toLocaleDateString()){

												$('#modal-title').html("Utente:"+calEvent.MatricolaAut);
												$('#my-modal').modal();
                                                 /*   $('#my-modal').on('hide',function(){
                                                        $('#my-submodal-malat').submodal('hide');
                                                        $('#my-submodal-lin').submodal('hide');
                                                        $('#my-submodal-ora').submodal('hide');
                                                        $('#my-submodal-turn').submodal('hide');
                                                    });*/

                                                    $('#confirm-malat').bind("click",function(){

                                                        descrizionemalat=document.getElementById('descrizionemalat').value;
                                                        //data=document.getElementById('datamalat').innerHTML;

                                                        var data_utc_malat = moment(calEvent.start).format('YYYY-MM-DDTHH:mm:ss')+"+02:00";

                                                        //alert("malattia -> "+descrizione+" il "+calEvent.start);
                                                        ajax("malattia",descrizionemalat,data_utc_malat);
                                                    });

                                                    $('#close-malat').bind("click",function(){
                                                        $('#my-submodal-malat').css("background-color","transparent");
                                                        //$('#my-submodal-malat').remove();
                                                    });

                                                    $('#confirm-lin').bind("click",function(){
                                                        var selLinea = document.getElementById("listaLinee");
                                                        var linea = selLinea.options[selLinea.selectedIndex].value;
                                                        var descrizioneClinea=document.getElementById('descrizioneL').value;

                                                        ajax('linea',linea,descrizioneClinea,calEvent.id);
                                                    });

                                                    $('#close-lin').bind("click",function(){
                                                        $('#my-submodal-lin').css("background-color","transparent");
                                                    });

                                                    $('#confirm-ora').bind("click",function(){
                                                        var fasciaOra = ""+tipo_ora;/*document.getElementById('fascia-ora').textContent;*/
                                                         ajax('orario',fasciaOra,descrizioneOra,calEvent.id);
                                                    });

                                                    $('#close-ora').bind("click",function(){
                                                        $('#my-submodal-ora').css("background-color","transparent");
                                                    });

                                                    $('#confirm-turn').bind("click",function(){
                                                        var fasciaOra = ""+tipo_turno;/*document.getElementById('fascia-ora-turno').textContent;*/
                                                        var descrizioneTurno = document.getElementById('descrizione-turno').value;
                                                        ajax('turno',descrizioneTurno,fasciaOra,calEvent.id,calEvent.idLinea);
                                                    });

                                                    $('#close-turn').bind("click",function(){
                                                        $('#my-submodal-turn').css("background-color","transparent");
                                                    });

                                                $('#my-submodal-malat').on('show', function() {

																								$('#formgroup-malat').html(`<?php include "RichiestaAvvisoMalattia.php";?>`);
																								//alert("la data: "+calEvent.start);
																								
																								$('#datamalat').text(calEvent.start);

																								});

                                                $('#my-submodal-lin').on('beforeShow', function() {
                                                                // lineaGet = calEvent.idLinea;
                                                    if (((start == 8 ) && (hours < 8 && min < 40)) || ((start == 16) && (hours < 15 && min < 40))) {
                                                               $('#formgroup-lin').html($.load("RichiestaCambioLinea.php"));
                                                    }else{
                                                        $('#my-submodal-lin').submodal('hide');
                                                        alert("La richiesta doveva essere effettuata entro le: "+start);

                                                    }

                                                                 });


												$('#my-submodal-ora').on('beforeShow', function() {


																						//	alert("start: "+start+" end: "+end+" ora: "+hours+" min: "+min+" giorno: "+oggi+" giornoD: "+now.getDate());
																							//alert("oggi: "+now.toLocaleDateString()+" evento: "+giornoEvento.toLocaleDateString());
																							if(now.toLocaleDateString()==giornoEvento.toLocaleDateString()) {

																								if ((start == 8 ) && (hours < 8 && min < 40)) {
																									//effettuo cambio con le 16/24
                                                                                                                    tipo_ora="16/24";
																									$('#formgroup-ora').html(`<?php $tipo = "A"; include "RichiestaCambioOrario.php";?>`);
																								} else {
																									if ((start == 16) && (hours < 15 && min < 40)) {
																										//effettuo cambio con le 8/16
                                                                                                                    tipo_ora="8/16";
																										$('#formgroup-ora').html(`<?php $tipo = "B"; include "RichiestaCambioOrario.php";?>`);
																									} else {
																										//errore
                                                                                                        $('#my-submodal-ora').submodal('hide');
																										alert("Non è possibile effettuare la richiesta Cambio orario");
																									}
																								}
																							}else{
                                                                                                //alert("qua: "+start+" end: "+end);
																								if ((start == 8 )){
                                                                                                    tipo_ora="16/24";
                                                                                                   // alert("16/24 ");
																									$('#formgroup-ora').html(`<?php $tipo = "A"; include "RichiestaCambioOrario.php";?>`);
																								}else{
																									if ((start == 16 )){
                                                                                                        tipo_ora="8/16";
																										$('#formgroup-ora').html(`<?php $tipo = "B"; include "RichiestaCambioOrario.php";?>`);}
																								}
																								}



																							});

												$('#my-submodal-turn').on('beforeShow', function() {
                                                                            if(now.toLocaleDateString()==giornoEvento.toLocaleDateString()) {


																										if ((start == 8 ) && (hours < 8 && min < 40)) {
																											//effettuo cambio con le 16/24
                                                                                                            tipo_turno="16/24";
																											$('#formgroup-turn').html(`<?php $tipo = "A";include "RichiestaCambioTurno.php";?>`);
																										} else {
																											if ((start == 16) && (hours < 15 && min < 40)) {
																												//effettuo cambio con le 8/16
                                                                                                                tipo_turno="8/16";
																												$('#formgroup-turn').html(`<?php $tipo = "B"; include "RichiestaCambioTurno.php";?>`);
																											} else {
																												//errore
                                                                                                                $('#my-submodal-turn').submodal('hide');
																												alert("Non è possibile effettuare la richiesta Cambio Turno");
																											}
																										}
																									}else{
																										if ((start == 8 )){
                                                                                                            tipo_turno="16/24";
																											$('#formgroup-turn').html(`<?php $tipo = "A"; include "RichiestaCambioTurno.php";?>`);
																										}else{
																											if ((start == 16 )){
                                                                                                                tipo_turno="8/16";
																												$('#formgroup-turn').html(`<?php $tipo = "B"; include "RichiestaCambioTurno.php";?>`);}
																										}
																									}

												});

											}else{alert("Le richieste possono essere effettuate:\n-In data odierna\n-Giorni successivi.");}
                                            },

										eventMouseover: 
												function(calEvent, jsEvent, view) {
																$(this).css('border-color', '#ff5722');
																$(this).css('border-style', 'dashed');
																$(this).css('border-width', '3px');
																$(this).css('left', '6px');
																$(this).css('cursor', 'hand');
																},
										eventMouseout: 
												function(calEvent, jsEvent, view) {
																$(this).css('border-color', '');
																$(this).css('border-style', '');
																$(this).css('border-width', '0em');
																$(this).css('left', '0em');
																},
										});
	});
}
		

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
																xhr.send("data="+arguments[1]);
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
					$('#my-submodal-malat').css("background-color", "green");

					//$('#my-submodal-malat').css("background-color","transparent");
				} else {
					$('#my-submodal-malat').css("background-color", "red");
					//$('#my-submodal-malat').css("background-color","transparent");
					//$('#my-submodal-malat').css("left","20px");
					//$('#my-submodal-malat').css("right","20px");
				}
			} else {
				$('#my-submodal-malat').css("background-color", "red");
			}
		}



			function gestoreFerie() {

				if (xhr.readyState == 4 && xhr.status == 200) {
					var response = xhr.responseXML;
					var ret = response.getElementsByTagName("response");
					var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

					if ("" + risp.localeCompare('ok')) {
						$('#my-submodal-fer').css("background-color", "green");

						//$('#my-submodal-malat').css("background-color","transparent");
					} else {
						$('#my-submodal-fer').css("background-color", "red");
						//$('#my-submodal-malat').css("background-color","transparent");
						//$('#my-submodal-malat').css("left","20px");
						//$('#my-submodal-malat').css("right","20px");
					}
				} else {
					$('#my-submodal-malat').css("background-color", "red");
				}
			}

			function gestoreLinea() {

				if (xhr.readyState == 4 && xhr.status == 200) {
					var response = xhr.responseXML;
					var ret = response.getElementsByTagName("response");
					var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

					if ("" + risp.localeCompare('ok')) {
						$('#my-submodal-lin').css("background-color", "green");

						//$('#my-submodal-malat').css("background-color","transparent");
					} else {
						$('#my-submodal-lin').css("background-color", "red");
						//$('#my-submodal-malat').css("background-color","transparent");
						//$('#my-submodal-malat').css("left","20px");
						//$('#my-submodal-malat').css("right","20px");
					}
				} else {
					$('#my-submodal-malat').css("background-color", "red");
				}
			}

			function gestoreOrario() {

				if (xhr.readyState == 4 && xhr.status == 200) {
					var response = xhr.responseXML;
					var ret = response.getElementsByTagName("response");
					var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

					if ("" + risp.localeCompare('ok')) {
						$('#my-submodal-ora').css("background-color", "green");

						//$('#my-submodal-malat').css("background-color","transparent");
					} else {
						$('#my-submodal-ora').css("background-color", "red");
						//$('#my-submodal-malat').css("background-color","transparent");
						//$('#my-submodal-malat').css("left","20px");
						//$('#my-submodal-malat').css("right","20px");
					}
				} else {
					$('#my-submodal-malat').css("background-color", "red");
				}
			}

			function gestoreTurno() {

				if (xhr.readyState == 4 && xhr.status == 200) {
					var response = xhr.responseXML;
					var ret = response.getElementsByTagName("response");
					var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

					if ("" + risp.localeCompare('ok')) {
						$('#my-submodal-turn').css("background-color", "green");

						//$('#my-submodal-malat').css("background-color","transparent");
					} else {
						$('#my-submodal-turn').css("background-color", "red");
						//$('#my-submodal-malat').css("background-color","transparent");
						//$('#my-submodal-malat').css("left","20px");
						//$('#my-submodal-malat').css("right","20px");
					}

				} else {
					$('#my-submodal-malat').css("background-color", "red");
				}
			}

			function gestoreSos() {

				if (xhr.readyState == 4 && xhr.status == 200) {
					var response = xhr.responseXML;
					var ret = response.getElementsByTagName("response");
					var risp = ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;

					if ("" + risp.localeCompare('ok')) {
						$('#my-submodal-sos').css("background-color", "green");

						//$('#my-submodal-malat').css("background-color","transparent");
					} else {
						$('#my-submodal-sos').css("background-color", "red");
						//$('#my-submodal-malat').css("background-color","transparent");
						//$('#my-submodal-malat').css("left","20px");
						//$('#my-submodal-malat').css("right","20px");
					}
				} else {
					$('#my-submodal-malat').css("background-color", "red");
				}
			}

document.write(`
<div id='heads'>
<p id='title'>Time Platform</p>
</div>
<div id='bodys'>
    <div id='calendar'> </div>
    <?php include_once('SOSeFerie.php');?>
 <div class="modal fade" id="my-modal">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <a href="#" class="close" data-dismiss="modal">
    <span aria-hidden="true">&times;</span>
<span class="sr-only">Close</span>
    </a>
    <h4 id="modal-title"></h4>
    </div>
    <div class="modal-body">

    `);
menu = {"malat":"Avviso Malattia","fer":"Richiesta Ferie","lin":"Richiesta Cambio Linea","ora":"Richiesta Cambio Orario","turn":"Richiesta Cambio Turno","sos":"Richiesta Soccorso"};
 for (var key1 in menu){
   document.write("<div class=\"modal submodal\" id=\"my-submodal-"+key1+"\"><div class=\"modal-dialog\">");
   document.write("<div class=\"modal-content\"> <div class=\"modal-body\"><p class=\"text-center\">"+ menu[key1] +"<br/></p>");
   document.write("<form class=\"form-horizontal\"><div class=\"form-group\" id=\"formgroup-"+key1+"\"></div></form></div>");
   document.write("<div class=\"modal-footer\">");
   document.write("<button class=\"btn btn-default\"  aria-hidden=\"true\" id=\"confirm-"+key1+"\">Conferma</button>");
  document.write("<button class=\"btn btn-danger\" data-dismiss=\"submodal\" id=\"close-"+key1+"\">Chiudi</button>");
    document.write("</div></div></div></div>");
  }
document.write('<form class="form-horizontal"><div class="form-group">');
document.write("<center>");
for (var key in menu){
    if((key.localeCompare("sos")!=0) && (key.localeCompare("fer")!=0)) {
        document.write("<button type=\"button\" class=\"menus btn btn-default\" data-toggle=\"submodal\" href=\"#my-submodal-" + key + "\">" + menu[key] + "</button>" + "</br>");
          }
    }
document.write("</center>");
document.write("</div></form>");
document.write(`
</div> <!-- /.modal-body -->
</div>
</div>
</div>
</div>
<div id='footers'>
    <span id='logout'>
    <form action='logout.php'>
    <input type='submit' value='Logout' id='chiudi'></input>
    </form>
    </span>
    </div>
    `);
</script>




	
</body>

</html>
