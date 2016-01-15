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
		</style>
		<title>Calendario</title>
	</head>
	
	<body>
		<script type="text/javascript" language="javascript">

		if(<?php echo $flagp;?>){
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
					<?php $_SESSION['controllorichiesta']="ok";?>
					$('#formgroup-fer').html(`<?php include"RichiestaFerie.php";?>`);
					//$('#data-fer').text(calEvent.start);
					$('#datarange-fer').daterangepicker({
						timePicker: true,
						timePickerIncrement: 30,
						startDate: $('#calendar').fullCalendar('getDate'),
						endDate: $('#calendar').fullCalendar('getDate'),
						locale: {
							format: 'DD/MM/YYYY h:mm A'
						}
					});
				});$('#confirm-fer').click(function(){
													data_fer=document.getElementById("datarange-fer").value;
													//data=document.getElementById('datamalat').innerHTML;


													////data inizio//////////////////////////////////////////////////////
													var data_inizio = data_fer.substr(0,data_fer.indexOf('-'));
													data_inizio_data=data_inizio.substr(0,data_inizio.indexOf(' '));
													data_inizio_data=data_inizio_data.replaceAll("/","-");
													ora_inizio = data_inizio.substr(data_inizio.indexOf(' ')+1);
													ora_inizio=ora_inizio.replaceAll("PM","");
													ora_inizio=ora_inizio.replaceAll("AM","");
													data_inizio=data_inizio_data+"T"+ora_inizio+":00+02:00";
													///////data fine/////////////////////////////////////////////////////
													var data_fine = data_fer.substr(data_fer.indexOf('-')+2);
													data_fine_data=data_fine.substr(0,data_fine.indexOf(' '));
													data_fine_data=data_fine_data.replaceAll("/","-");
													ora_fine = data_fine.substr(data_fine.indexOf(' ')+1);
													ora_fine=ora_fine.replaceAll("PM","");
													ora_fine=ora_fine.replaceAll("AM","");
													data_fine=data_fine_data+"T"+ora_fine+":00+02:00";
													////////////////////////////////////////////////////////////////////

													ajax("ferie",data_inizio,data_fine);
													});

				$('#close-fer').click(function(){
					$('#my-submodal-fer').css("background-color","transparent");
				});

				$('#my-submodal-sos').on('show', function() { alert('sos');});
				$('#confirm-sos').click(function(){alert("sos");});
				$('#close-sos').click(function(){
					$('#my-submodal-sos').css("background-color","transparent");
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
												$('#modal-title').html("Utente:"+calEvent.idLinea);
												
												//$('#modalBody').html(html);
												//$('#eventUrl').attr('href',calEvent.url);
												//$arr=array("malat"=>"Avviso malattia","stra"=>"Richiesta Straordinario","fer"=>"Richiesta ferie","lin"=>"Richiesta cambio linea","ora"=>"Richiesta cambio orario","turn"=>"Richiesta cambio turno","sos"=>"Richiesta soccorso");
												
												$('#my-modal').on('show', function() { 
														//arr=["malat","stra","fer","lin","ora","turn","sos"];
														
														//////////////////////////////////////////////////////////////////////////////////
														$('#confirm-malat').click(function(){
															
															descrizionemalat=document.getElementById('descrizionemalat').value;
															//data=document.getElementById('datamalat').innerHTML;
															 
															var data_utc_malat = moment(calEvent.start).format('YYYY-MM-DDTHH:mm:ss')+"+02:00";
															
															//alert("malattia -> "+descrizione+" il "+calEvent.start);
															ajax("malattia",descrizionemalat,data_utc_malat);
															});	   
															
														$('#close-malat').click(function(){
															$('#my-submodal-malat').css("background-color","transparent");
															});
														/////////////////////////////////////////////////////////////////////////////////
														
													/*	$('#confirm-stra').click(function(){
																							descrizionestra=document.getElementById('descrizionestra').value;
																							//data=document.getElementById('datamalat').innerHTML;

																							var data_utc_stra = moment(calEvent.start).format('YYYY-MM-DDTHH:mm:ss')+"+02:00";
																							ajax("straordinario",descrizionestra,data_utc_stra);
																							
																							});
														
														$('#close-stra').click(function(){
															$('#my-submodal-stra').css("background-color","transparent");
															});*/
														////////////////////////////////////////////////////////////////////////////////
														

														////////////////////////////////////////////////////////////////////////////////
														
														$('#confirm-lin').click(function(){alert("lin");});
														
														$('#close-lin').click(function(){
															$('#my-submodal-lin').css("background-color","transparent");
															});
														/////////////////////////////////////////////////////////////////////////////////
														
														$('#confirm-ora').click(function(){alert("ora");});
														
														$('#close-ora').click(function(){
															$('#my-submodal-ora').css("background-color","transparent");
															});
														/////////////////////////////////////////////////////////////////////////////////
														
														$('#confirm-turn').click(function(){alert("turn");});
														
														$('#close-turn').click(function(){
															$('#my-submodal-turn').css("background-color","transparent");
															});
														//////////////////////////////////////////////////////////////////////////////
														

														//////////////////////////////////////////////////////////////////////////////
																			
													});
												$('#my-modal').modal();


												
												/*
												<!--
												avviso malattia: descrizione, orario e data 
												richiesta straordinario: data e ora
												richiesa ferie: data inizio e data fine
												richiesta cambio linea: descrizione, ora data linea
												richiesa cambio orario: descrizione, ora data
												richiesa cambio turno: descrizione ora e data
												richiesa soccorso: descrizione posizione ora data
												-->
												*/
												$('#my-submodal-malat').on('show', function() {
																								//alert("matricola: "+calEvent.id+" utente: "+calEvent.title+"dal giorno: "+calEvent.start+" al giorno: "+calEvent.end);
																								//$('#formgroup').html("<html><body><label class='col-sm-3 control-label' for='data'>Data:</label><p id='data'>gtreb</p><label class='col-sm-3 control-label' for='descrizione'>Descrizione:</label><div class='col-sm-9'><textarea class='form-control' id='descrizione' cols='3' rows='3'></textarea></div></body></html>");
																								<?php $_SESSION['controllorichiesta']="ok";?>
																								$('#formgroup-malat').html(`<?php include "AlertDisease.php";?>`);
																								//alert("la data: "+calEvent.start);
																								
																								$('#datamalat').text(calEvent.start);
																								});
																								
											/*	$('#my-submodal-stra').on('show', function() {

																								<?php /*$_SESSION['controllorichiesta']="ok";*/?>
																							$('#formgroup-stra').html(`<?php /*include "RichiestaFerie.php";*/?>`);
																							$('#datastra').text(calEvent.start);
																							// $('input[name="datarange"]').daterangepicker({
																							//											timePicker: true,
																							//											timePickerIncrement: 30,
																							//											startDate: $('#calendar').fullCalendar('getDate'),
																							//											endDate: $('#calendar').fullCalendar('getDate'),

																																	//	locale: {
																																	//		format: 'DD/MM/YYYY h:mm A'
																																	//	}
																																	//});
																							
																							});*/
																							


												$('#my-submodal-lin').on('show', function() {  });
												$('#my-submodal-ora').on('show', function() { });
												$('#my-submodal-turn').on('show', function() { });

											},
										
									/*	eventClick:
												function(calEvent, jsEvent, view) {
																alert('Autista: ' + calEvent.title);
																alert('id: ' + calEvent.id);
															
																//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
																//alert('View: ' + view.name);
																},*/
										/* dayRightclick: 
													function(date, jsEvent, view) {
														alert('a day has been rightclicked!');
														// Prevent browser context menu:
														return false;
													},
										eventRightclick: function(event, jsEvent, view) {
														
													
																	 
														return false;
													},*/
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
																 
		/*	$(document).contextmenu({
							delegate: ".hasmenu",
							preventContextMenuForPopup: true,
							preventSelect: true,
							menu: [
									{title: "Cut", cmd: "cut", uiIcon: "ui-icon-scissors"},
									{title: "Copy", cmd: "copy", uiIcon: "ui-icon-copy"},
									{title: "Paste", cmd: "paste", uiIcon: "ui-icon-clipboard", disabled: true },
								],
							select: function(event, ui) {
									// Logic for handing the selected option
							},
							beforeOpen: function(event, ui) {
									// Things to happen right before the menu pops up
							}
						});	*/				 
										 
		
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
						/*	if(cosa.localeCompare("straordinario")==0){
																xhr.onreadystatechange=gestoreStraordinario;
																xhr.open("POST","salvaRichiestaStraordinario.php",true);
																xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhr.send("datastra="+data+"&descrizionestra="+descrizione);
																}*/
							if(arguments[0].localeCompare("ferie")==0){
																xhr.onreadystatechange=gestoreFerie;
																xhr.open("POST","salvaRichiestaFerie.php",true);
																xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhr.send("data_inizio="+arguments[1]+"&data_fine="+arguments[2]);
																}
							if(arguments[0].localeCompare("linea")==0){
																xhr.onreadystatechange=gestoreLinea;
																xhr.open("POST","setRequest.php",true);
																xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhr.send("cosa="+cosa+"datamalat="+data+"descrizionemalat="+descrizione);
																}
							if(arguments[0].localeCompare("orario")==0){
																xhr.onreadystatechange=gestoreOrario;
																xhr.open("POST","setRequest.php",true);
																xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhr.send("cosa="+cosa+"datamalat="+data+"descrizionemalat="+descrizione);
																}
							if(arguments[0].localeCompare("turno")==0){
																xhr.onreadystatechange=gestoreTurno;
																xhr.open("POST","setRequest.php",true);
																xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhr.send("cosa="+cosa+"datamalat="+data+"descrizionemalat="+descrizione);
																}
							if(arguments[0].localeCompare("sos")==0){
																xhr.onreadystatechange=gestoreSos;
																xhr.open("POST","setRequest.php",true);
																xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																xhr.send("cosa="+cosa+"datamalat="+data+"descrizionemalat="+descrizione);
																}
												}
							}
						
						
						
						
						
		function gestoreMalattia(){
			if(xhr.readyState==4 && xhr.status==200){
						response = xhr.responseXML;
						ret = response.getElementsByTagName('response');
						risp=ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;
						
						if(""+risp.localeCompare('ok')){
												$('#my-submodal-malat').css("background-color","green");
												
												//$('#my-submodal-malat').css("background-color","transparent");
												}else{
													$('#my-submodal-malat').css("background-color","red");
													//$('#my-submodal-malat').css("background-color","transparent");
													//$('#my-submodal-malat').css("left","20px");
													//$('#my-submodal-malat').css("right","20px");
													}
									}
								}
						
					/*	
						var th2=[];
						var txt2=[];
						var tr=[];
						var thn=[];
						var thdist=[];
						var N=[];
						var td=[];
						var text=[];
						tabella = document.createElement('table');
						tabella.setAttribute('border',0);
						tabella.setAttribute('cellspacing','10px');
																
						tr = document.createElement('tr');
						th = document.createElement('th');
						txt = document.createTextNode(partenza+" -> "+arrivo);
						th.setAttribute('colspan',4);
						th.setAttribute('style','text-align:center;');
						th.appendChild(txt);
						tr.appendChild(th);
						tabella.appendChild(tr);		
																
						tr1 = document.createElement('tr');
						td = document.createElement('td');
						txt1=document.createTextNode(tipo);
																			
						td.setAttribute('colspan',4);
						td.setAttribute('style','text-align:center;color:red;');
						td.appendChild(txt1);
						tr1.appendChild(td);
						tabella.appendChild(tr1);
																			
						intest = ['N', 'Distanza', 'Costo', 'Tempo'];
						tr2=document.createElement('tr');
																
						for(i=0;i<intest.length;i++){
									th2[i]=document.createElement('th');
									txt2[i]=document.createTextNode(intest[i]);
									th2[i].appendChild(txt2[i]);
									tr2.appendChild(th2[i]);
													}
													
						tabella.appendChild(tr2);
						N = response.getElementsByTagName("N");
						for(t=0;t<N.length;t++){
									valori = ["Distanza","Costo","Tempo"];
									thn[t]=document.createElement('td');
							   txtn = document.createTextNode(N[t].getAttribute('valore'));
									thn[t].appendChild(txtn);
									tr[t]=document.createElement('tr');
									tr[t].appendChild(thn[t]);
									for(i=0;i<valori.length;i++){
										td[i]=document.createElement('td');
										text[i]=document.createTextNode(N[t].getElementsByTagName(valori[i])[0].childNodes[0].nodeValue);
										td[i].appendChild(text[i]);
										tr[t].appendChild(td[i]);
																}
									tabella.appendChild(tr[t]);
									}
						infoajax.appendChild(tabella);//infoajax è dichiarato in prelevadati
						*/
						
					//fine gestore
		/*function gestoreStraordinario(){
			
			if(xhr.readyState==4 && xhr.status==200){
						response = xhr.responseXML;
						ret = response.getElementsByTagName("response");
						risp=ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;
						
						if(""+risp.localeCompare('ok')){
												$('#my-submodal-stra').css("background-color","green");
												
												//$('#my-submodal-malat').css("background-color","transparent");
												}else{
													$('#my-submodal-stra').css("background-color","red");
													//$('#my-submodal-malat').css("background-color","transparent");
													//$('#my-submodal-malat').css("left","20px");
													//$('#my-submodal-malat').css("right","20px");
													}
			}
			}*/
			
		function gestoreFerie(){
			
			if(xhr.readyState==4 && xhr.status==200){
						response = xhr.responseXML;
						ret = response.getElementsByTagName("response");
						risp=ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;
						
						if(""+risp.localeCompare('ok')){
												$('#my-submodal-fer').css("background-color","green");
												
												//$('#my-submodal-malat').css("background-color","transparent");
												}else{
													$('#my-submodal-fer').css("background-color","red");
													//$('#my-submodal-malat').css("background-color","transparent");
													//$('#my-submodal-malat').css("left","20px");
													//$('#my-submodal-malat').css("right","20px");
													}
			}
			}
		
		function gestoreLinea(){
			
			if(xhr.readyState==4 && xhr.status==200){
						response = xhr.responseXML;
						ret = response.getElementsByTagName("response");
						risp=ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;
						
						if(""+risp.localeCompare('ok')){
												$('#my-submodal-lin').css("background-color","green");
												
												//$('#my-submodal-malat').css("background-color","transparent");
												}else{
													$('#my-submodal-lin').css("background-color","red");
													//$('#my-submodal-malat').css("background-color","transparent");
													//$('#my-submodal-malat').css("left","20px");
													//$('#my-submodal-malat').css("right","20px");
													}
			}
			}
			
		function gestoreOrario(){
			
			if(xhr.readyState==4 && xhr.status==200){
						response = xhr.responseXML;
						ret = response.getElementsByTagName("response");
						risp=ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;
						
						if(""+risp.localeCompare('ok')){
												$('#my-submodal-ora').css("background-color","green");
												
												//$('#my-submodal-malat').css("background-color","transparent");
												}else{
													$('#my-submodal-ora').css("background-color","red");
													//$('#my-submodal-malat').css("background-color","transparent");
													//$('#my-submodal-malat').css("left","20px");
													//$('#my-submodal-malat').css("right","20px");
													}
			}
			}
			
		function gestoreTurno(){
		
			if(xhr.readyState==4 && xhr.status==200){
						response = xhr.responseXML;
						ret = response.getElementsByTagName("response");
						risp=ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;
						
						if(""+risp.localeCompare('ok')){
												$('#my-submodal-turn').css("background-color","green");
												
												//$('#my-submodal-malat').css("background-color","transparent");
												}else{
													$('#my-submodal-turn').css("background-color","red");
													//$('#my-submodal-malat').css("background-color","transparent");
													//$('#my-submodal-malat').css("left","20px");
													//$('#my-submodal-malat').css("right","20px");
													}
													
			}
			}
			
		function gestoreSos(){
			
			if(xhr.readyState==4 && xhr.status==200){
						response = xhr.responseXML;
						ret = response.getElementsByTagName("response");
						risp=ret[0].getElementsByTagName('setter')[0].childNodes[0].nodeValue;
						
						if(""+risp.localeCompare('ok')){
												$('#my-submodal-sos').css("background-color","green");
												
												//$('#my-submodal-malat').css("background-color","transparent");
												}else{
													$('#my-submodal-sos').css("background-color","red");
													//$('#my-submodal-malat').css("background-color","transparent");
													//$('#my-submodal-malat').css("left","20px");
													//$('#my-submodal-malat').css("right","20px");
													}
			}
			}
		
	
	</script>	
		
		
		
		<div id='heads'>
			<p id='title'>Time Platform</p>
		</div>
		
		<div id='bodys'>
		
			<div id='calendar'> </div>
			
		<!--	<div id="fullCalModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 id="modalTitle" class="modal-title"></h4>
						</div>
						<div id="modalBody" class="modal-body">
							</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
							
						</div>
					</div>
				</div>
			</div>-->
			<!--<button class="btn btn-primary"><a id="eventUrl" target="_blank">Invia</a></button>-->
			<!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">Chiudi</span></button>-->


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
				

                    <!-- SUBMODAL -->
					
                   <?php
				   include_once('FormRequest.php');
					
				   ?>
                    <!-- /SUBMODAL -->


                    <?php
					include_once('CreateMenu.php');
					?>

                </div> <!-- /.modal-body -->

            </div>
        </div>
    </div>
			
			
			
		</div>
	
	<div id='footers'>
		<span id='logout'>
			<form action='logout.php'>
				<input type='submit' value='Chiudi' id='chiudi'></input>
			</form>
		</span>
	</div>
	
</body>

</html>
