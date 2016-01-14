<!-------------------------------------INDEX.PHP------------------------------------>
<?php

?>
<html>
	<head>
		<title>TIME PLATFORM</title>
		<style type='text/css'>
		
			#legen{font-size:30px; color:#607d8b; font-weight:800;}
			#field{position:relative;  left:50%; width:40px; height:200px;}
			
			
			
			#loginfield{font-size:25px; color:black; font-weight:800;}
			#heads{position:relative; color:#ff5722; top:0px; left:50%; font-size:50px; }
			
			#logo{position:relative; padding:10px 10px 10px 10px;}
			
			body{display:block; position: relative;}
		</style>
		<link rel="stylesheet" href="stile.css"></link>
	</head>
<body>
	
	<div id='heads'>
	<img src='logo.jpg' width="200px" height="217px" id="logo"></img>
	<!--<p id='title'>Time Platform</p>	-->
	</div>
	
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
