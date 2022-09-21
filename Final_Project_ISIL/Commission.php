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
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="assets/css/main.css" />
			<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
			<link rel="shortcut icon" type="image/x-icon" href="imag/avatar14.png" > 
            			<link rel="stylesheet" href="assets/css/date.css" />

			<script type="text/javascript" src="js/jquery.min.js"> </script>
			<style>#gr { font-weight: bold;}
			</style>

	</head>
    


	<body>
 



	<!-- Wrapper -->
			<div id="wrapper" style="background-color: rgba(0,0,0,0.74)">
				<!-- Header -->
                
					<header id="header">
				
						<div align="center" class="content">
                        <br/>
                       <h1> Programmer commission </h1>
                       <br/>
                    <form action="Commission2.php?insert=1"   method="POST" name ="login" >
                       
					   <b>Heure de commission : </b> <input type="time" name="heureCommission" placeholder="Enter l'heure " required /><br/><br/>
					   <b>Date de commission  : </b>
					   
                       <input type="date" id="dateCommission" placeholder="" required name="dateCommission"><font color="#E91115"><span class="feedback6"></span></font><br/><br/>
					   
                       <input  size="80px" type="text" placeholder="Lieu du commission" required name="lieuCommission" onkeypress="return verif(event);"> <br/>
					   <input  size="80px" type="text" placeholder="Nom et prénom  du rapporteur"  required name="rapporteur"onkeypress="return verif(event);"> <br/>
					   
					   <input  size="80px" type="text" placeholder="Nom et prénom  du président de la commission" required name="presidentCommission"onkeypress="return verif(event);"> <br/>
					   <input  size="80px" type="text" placeholder="Nom et prénom  du représentant  des travaux public" required name="representantTravauxPublic"onkeypress="return verif(event);"> <br/>
					   <input  size="80px" type="text" placeholder="Nom et prénom  du représentant  du gendarmerie nationale" required name="representantGendarmerie"onkeypress="return verif(event);"> <br/>
					   <input  size="80px" type="text" placeholder="Nom et prénom  du représentant  de la police" required name="representantPolice"onkeypress="return verif(event);"> <br/>
					   <input  size="80px" type="text" placeholder="Nom et prénom  du représentant  de l'energie et des mines" required name="representantenrgMine"onkeypress="return verif(event);"> <br/>
					   <input  size="80px" type="text" placeholder="Nom et prénom  du représentant  des auto-ecoles" required name="representantAuto_ecole"onkeypress="return verif(event);"> <br/>
					   <input  size="80px" type="text" placeholder="Nom et prénom  du représentant  du transport " required name="representantTransport"onkeypress="return verif(event);"> <br/>
					   
				
					
							
					<div >
                    
						
						<button type="reset">
						<b>Annuler</b>
						</button>&nbsp; &nbsp;&nbsp; &nbsp;
                        <button type="submit" id="okok">
						<b>suivant</b>
						</button>
					</div>
                        

					</form>
                        </div>
						
					</header>

				<!-- Main -->
					<div id="main">
 					    
				   	<article id="vers">
								<p>Etes vous sur de vouloir quitter <b>Appschicksal</b> ?</p>
                             <div align="center"><b><a href="deconnexion.php">OUI</a></b></div>
							</article>
					</div>
                    
				<!-- Footer -->
					<footer id="footer">
                    <b> <div id="ejs_heure"  align="right">   </div> </b>
                     <br/>
                     <div align="right">
                     
                     <form action="accueil.php?#com"> <input  id="gr"align="left" type="submit" value="RETOUR"></form>
                     
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
<script src="func6.js"></script>
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
<script type="text/javascript">
    function verif(evt) {
        var keyCode = evt.which ? evt.which : evt.keyCode;
        var accept = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZéàçè \s';
        if (accept.indexOf(String.fromCharCode(keyCode)) >= 0) {
            return true;
        } else {
            return false;
        }
    }
</script>