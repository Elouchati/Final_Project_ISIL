<?php
// Start the session
session_start();
require("auth.php");
if (Auth::isLogged()){ 
}
else { 
header('Location:index.php#connecter');
}
mysql_query("SET NAMES cp1256" ); // pour afficher en arabe 
	mysql_query("SET character set cp1256" ); // pour afficher en arabe 
?>
<!-- *** **** ****** ****** ***** ******* ****** ****** ****** * ***** *** **** *** *** * *** * *-->
<!DOCTYPE HTML>

<html>
	<head>
		<title>Appschicksal</title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="assets/css/main.css" />
			<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
			<link rel="shortcut icon" type="image/x-icon" href="imag/avatar14.png" > 
			<script type="text/javascript" src="js/jquery.min.js"> </script>
			<script src="jquery.js" ></script>
  			<script  src="js/bootstrap.min.js"></script>
			<style>#gr { font-weight: bold;}</style> 
	</head>
    
    
 
	<body>
 



	<!-- Wrapper -->
		<div id="wrapper" style="background-color: rgba(0,0,0,0.74)" >

				<!-- Header -->
                
					<header id="header">
				
						<div class="content">
                        <br/>
 					<h1> Liste des commissions  </h1>
                        <br/>
                        <div id="live_data"></div> 
      <script>
 $(document).ready(function(){ 
 function fetch_data(){  
           $.ajax({  
                url:"page17.php",   
                success:function(data){$('#live_data').html(data);}  
                  });  
      } 
	  
fetch_data();
$(document).on('click', '.btn_delete', function(){  
           var idCommission=$(this).data("id5");  
           if(confirm("Etes vous sur de vouloir supprimer cette commission ?"))  
           {  
                $.ajax({  
                     url:"page18.php",  
                     method:"POST",  
                     data:{idCommission:idCommission},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  

});    	  
     </script> 
                        </div>
						
					</header>

				<!-- Main -->
				
                    
				<!-- Footer -->
					<footer id="footer">
                    <b> <div id="ejs_heure"  align="right">   </div></b>
                     <br/>
                     <div align="right">
                     
						 <form action="accueil.php#com"> <input align="left" type="submit" id="gr"value="RETOUR"></form>                     
                     </div>
					</footer>

			</div>




		<!-- BG -->
			<div id="bg2"></div>

		<!-- Scripts -->
			



	</body>
</html>   

<SCRIPT LANGUAGE="JavaScript">
  // pour l'affichage de la date dynamique 
function HeureCheckEJS()
	{
	var ladate=new Date();
	// pour l'affichage du jour 
	var ladate=new Date() 
    var tab_jour=new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
    var tab_mois=new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	krucial = new Date;
	heure = krucial.getHours();
	min = krucial.getMinutes();	
	sec = krucial.getSeconds();	
	jour = krucial.getDate();
	mois = krucial.getMonth()+1;
	annee = krucial.getFullYear();
	if (sec < 10)sec0 = "0";
	else sec0 = "";	
	if (min < 10)	min0 = "0";	
	else min0 = "";	
	if (heure < 10)	heure0 = "0";
	else heure0 = "";
	DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
	DinaJour = "Le  "+tab_jour[ladate.getDay()]+" "+ladate.getDate()+" "+tab_mois[ladate.getMonth()] +" "+ ladate.getFullYear()+"." ;
    which = DinaHeure
	date = DinaJour
	if (document.getElementById){
		document.getElementById("ejs_heure").innerHTML=which+"<br/>"+date;
		
	}
	setTimeout("HeureCheckEJS()", 1000)
	}
	window.onload = HeureCheckEJS;
</SCRIPT>
