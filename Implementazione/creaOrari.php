<?php
	session_start();
	if(isset($_SESSION['ut'])&&isset($_SESSION['pw'])&& ( strlen($_SESSION['ut'])>0 ) && ( strlen($_SESSION['pw'])>0 )){
		
		echo "<script type='text/javascript'>flag=true;</script>";
		$flagorari=true;
		}else{
			close();
		    }
	function close(){
					$flagorari=false;
					echo "<script type='text/javascript'>flag=false;</script>";
					unset($_SESSION['ut']);
					unset($_SESSION['pw']);
					session_destroy();
					header('Location: index.php');
					exit;
					}
	?>
	<script type="text/javascript" language="javascript">
		flagphp=<?php echo $flagorari;?>;
		window.onload=function(){init();}
		function init(){
					if((flagphp==true)&&(flag==true)){
													  var ute,line;
													  
													  ajax();
													  
													  function ajax(){
																	if(window.XMLHttpRequest){
																							ute = new XMLHttpRequest();
																							line = new XMLHttpRequest();
																							ute.onreadystatechange=gestore;
																							ute.open("GET","getUtenti.php",true);
																							ute.send("");
																							
																							line.onreadystatechange=gestore;
																							line.open("GET","getLinee.php",true);
																							line.send("");
																							}else{
																								 ute = new ActiveXObject("Microsoft.XMLHTTP");
																								 line = new ActiveXObject("Microsoft.XMLHTTP");
																								 ute.onreadystatechange=gestore;
																									ute.open("GET","getUtenti.php",true);
																									ute.send("");
																									
																									line.onreadystatechange=gestore;
																									line.open("GET","getLinee.php",true);
																									line.send("");
																								  }
																								  
																							
																			}
														 function ajax_setter(title,id,start,end){
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
																		
														function gestore_setter(){
																		  if((setorari.readyState==4 && setorari.status==200)){
																			  responseSetter = setorari.responseXML;
																			  
																			  
																			 
																			 }
																			}
																		
														function gestore(){
																		  if((ute.readyState==4 && ute.status==200) && (line.readyState==4 && line.status==200)){
																			  responseUTE = ute.responseXML;
																			  responseLINE = line.responseXML;
																			  
																			  valori=["utente","Nome","Cognome"];
																			  nute=responseUTE.getElementsByTagName("n");
																			  nline=responseLINE.getElementsByTagName("n");
																			  
																			  for(i=0;i<nute.length;i++){
																									  nn=nute[i].getAttribute("n");
																									  for(j=0;j<valori.length;j++){
																																   utente=nute[i].getElementsByTagName(valori[0])[0].childNodes[0].nodeValue;	
																																   nome=nute[i].getElementsByTagName(valori[1])[0].childNodes[0].nodeValue;	
																																   cognome=nute[i].getElementsByTagName(valori[2])[0].childNodes[0].nodeValue;	
																																	}
																										
																										}
																			  
																			  
																			 
																			 }
														}
																			 
														
																			
																			
																			
														function close_logout(message){
																						alert(""+message);
																						location.href="./logout.php";
																						}
													  }else{
															/*<?php if($flagorari==false) close();?>*/
															flag=false;
															<?php $flagorari=false;?>
															close_logout("ERROR 303");
															}
		}
		</script>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		