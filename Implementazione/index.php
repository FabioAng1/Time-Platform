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
		<form action="login.php" method="POST">
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
				<input type="submit" value="LOGIN" id='subm'></input>
				</td>
			</tr>
			</table>	
		</form>
	</fieldset>
	</div>
</body>
</html>
