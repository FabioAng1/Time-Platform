<?php
session_start();
if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 )){
	include "classi.php";
	//$utente=$_SESSION['ut'];
	//$passw=$_SESSION['pw'];
	
	//$datab = new Datab();
	//$datab->querySEL("localita","SELECT nome FROM citta");
	
	$flagp=true;
	echo "<script type='text/javascript'>flag=true;</script>";
	}else{
		  $flagp=false;
		  echo "<script type='text/javascript'>flag=false;</script>";
		  unset($_SESSION['ut']);
		  unset($_SESSION['pw']);
		  session_destroy();
		  header("location:index.php");
		  exit;
		  }
	?>
<html>
	
	<head>
		<!--<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
		<script src='fullcalendar/lib/jquery.min.js'></script>
		<script src='fullcalendar/lib/moment.min.js'></script>
		<script src='fullcalendar/fullcalendar.js'></script>-->
		<style type="text/css">
			
			#title{font-size:3em;font-weight:800; text-align:center; left:50%; color:#ff5722;}
			#chiudi{position:relative; left:50%; font-size:20px; font-weight:400; padding: 7px 7px 7px 7px;}
			body{background:#9e9e9e;}
			#bodys{background:#9e9e9e;}
			#footers{padding: 30px 30px 30px 30px;}
		</style>
		<title>Calendario</title>
	</head>
	
	<body>
		<script type="text/javascript">
		flagphp=<?php echo $flagp;?>;
		window.onload=function(){init();}
		function init(){
		
					if((flagphp==true)&&(flag==true)){
													  var setorari;
													  var title="rosario";
													  var id="1650";
													  var start="00";
													  var end="11";
													  
													  ajax();
													  
													  function ajax(){
																	if(window.XMLHttpRequest){
																							setorari = new XMLHttpRequest();
																						
																							setorari.onreadystatechange=gestore;
																							setorari.open("POST","setOrari.php",true);
																							setorari.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

																							setorari.send("title="+title+"&id="+id+"&start="+start+"&end="+end);
																							}else{
																								 setorari = new ActiveXObject("Microsoft.XMLHTTP");
																								 setorari.onreadystatechange=gestore;
																								 setorari.open("POST","setOrari.php",true);
																								 setorari.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
																								 setorari.send("title="+title+"&id="+id+"&start="+start+"&end="+end);
																								  }
																								  
																							
																			}
																		
														function gestore(){
																		  if((setorari.readyState==4 && setorari.status==200)){
																			  responseSetter = setorari.responseXML;
																			  
																			  
																			 
																			 }
																			}
																			 
														
														function close_logout(message){
																						alert(""+message);
																						location.href="./logout.php";
																						}
													  }else{
															
															flag=false;
															<?php $flagp=false;?>
															close_logout("ERROR 303");
															}
		}
		</script>
		<div id='heads'>
			<p id='title'>Time Platform</p>
		</div>
		
		<div id='bodys'>
			<div id='calendar'> </div>
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
