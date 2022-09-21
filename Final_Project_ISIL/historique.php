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


	</head>
    


	<body>
 



	<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
                
					<header id="header">
				
						<div class="content">
                        <br/>
                       <h1> Rechercher un permis de conduire </h1>
                       <br/>
                    <input type="text" name="search_text" id="search_text" placeholder="Entrez numéro PC , nom , prénom OU adresse .  " class="form-control" /><br/>
   					<div id="result"></div>
                        </div>
						
					</header>

				<!-- Main -->
					<div id="main">
 					    
				   	
					</div>
                    
				<!-- Footer -->
					<footer id="footer">
                     <div id="ejs_heure"  align="right">   </div>
                     <br/>
                     <div align="right">
                     
					 <form action="accueil.php#permis"> <input align="left" type="submit" value="RETOUR"></form>                     
                     </div>
					</footer>

			</div>




		<!-- BG -->
			<div id="bg2"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
<script src="jquery.js"></script>





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

<script>
$(document).ready(function(){

 

 function load_data(query)
 {
  $.ajax({
   url:"historique2.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
   
  });
  }
  load_data();
  function fetch_historique(){  
           $.ajax({  
                url:"historique4.php",  
                success:function(data){$('#result').html(data);}  
                  });  
      }
  
  $(document).on('click', '.btn_delete', function(){  
           var idPC=$(this).data("id1"); 
           {  
                $.ajax({  
                     url:"historique3.php",  
                     method:"POST",  
                     data:{idPC:idPC},  
                     dataType:"text",  
                     success:function(data){  
                          fetch_historique()}	 
                });  
           }  
      });  
 
 
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>