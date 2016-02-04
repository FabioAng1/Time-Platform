<!-------------------------------------INDEX.PHP------------------------------------>
<?php
session_start();
if(isset($_SESSION['ut'])&& isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 )){
	if(strcmp(substr($matricola,0,2),"17")==0){//amministratori->17
		//$myPassword = sha1(mysqli_real_escape_string($password));
		header('Location: admin.php');
	}else{
		header('Location: calendario.php');
	}
}
	?>
<html>
	<head>

		<title>TIME PLATFORM</title>
		<style type='text/css'>

			#legen{font-size:30px; color:#607d8b; font-weight:800;}
			#field{position:relative;  width:40px; height:200px; display:block;margin-left: auto;
				margin-right: auto; border-radius:25px;}
			#logo{position:relative;display:block;margin-left: auto;
				margin-right: auto;}


			#loginfield{font-size:25px; color:black; font-weight:800;}


			body{display:block; position: relative;}



		</style>
		<link rel="stylesheet" href="stile.css"></link>
	</head>
<body>
<img id="logo" src='logo.jpg' width="200px" height="217px" id="logo"></img>

	<div id="bodys">

	<fieldset id='field'>
		<legend id='legen'>LOGIN</legend>
		<span id="errLog"></span>
	<!--	<form action="login.php" method="POST"> -->
			<table border=0 id='loginfield'>
			<tr>
				<td>
				<label for='matricola'>Matricola</label>
				<input type="text" name="matricola" id='ut'></input>
				</td>
			</tr>
			<tr>
				<td>
				<label for='psw'>Password</label>
				<input type="password" name="psw" id='pw'></input>
				</td>
			</tr>
			<tr align='center'>
				<td>

				<input type="button" value="LOGIN" id='subm'></input>
				</td>
			</tr>
			</table>
		<!--</form>-->
	</fieldset>
	</div>

<script>

	document.getElementById('subm').addEventListener("click",function (){Login(1,"login",document.getElementById('ut').value,document.getElementById('pw').value)});


	function Login() {
		if (window.XMLHttpRequest) {
			n = arguments[0];

			eval('xhr' + n + ' = new XMLHttpRequest();');

			if (arguments[1].localeCompare("login") == 0) {
				//alert("malattia: cosa="+cosa+"&datamalat="+data+"&descrizionemalat="+descrizione);
				eval('xhr' + n).onreadystatechange = gestoreLogin;
				eval('xhr' + n).open("POST", "login.php", false);
				eval('xhr' + n).setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				eval('xhr' + n).send("matricola=" + arguments[2] + "&psw=" + arguments[3]);

			}


		}
	}

	function gestoreLogin(){
		if (eval('xhr'+n).readyState == 4 && eval('xhr'+n).status == 200) {

			var ret = (eval('xhr'+n).responseXML).getElementsByTagName("response");
			eval('risp'+n+' = ret[0].getElementsByTagName(\'setter\')[0].childNodes[0].nodeValue;');
			if(eval('risp'+n).localeCompare("admin")==0){
													//admin
													window.location="admin.php";
													}else{
														if(eval('risp'+n).localeCompare("autista")==0) {
															//autista
															window.location="calendario.php";
														}else{
															document.getElementById("errLog").innerHTML = "" + eval('risp' + n);
															document.getElementById("errLog").style.color="red";
															setTimeout(function(){window.location="logout.php";},2000);
														}
													}
			//alert(""+eval('risp'+n));
		} else {
			alert(""+eval('risp'+n));
			setTimeout(function(){window.location="logout.php";},2000);
			//document.getElementById("login-span"+n).innerText = "errore Response";
		}
	}
</script>



</body>
</html>
