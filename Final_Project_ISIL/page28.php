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
$idPV=$_SESSION['idPV']; 
$query = "SELECT * FROM Sanction WHERE idPV='".$idPV."'";
$result=mysql_query($query);
$row = mysql_fetch_array($result);
$idSanction=$row["idSanction"];
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
			<script type="text/javascript" src="js/jquery.min.js"> </script>
            			<link rel="stylesheet" href="assets/css/date.css" />
            <style>#gr ,#gg ,#prenom_manquant,#nom_manquant{ font-weight: bold;}</style> 
	</head>
    


	<body>
 



	<!-- Wrapper -->
				<div id="wrapper" style="background-color: rgba(0,0,0,0.74)" >

				<!-- Header -->
                
					<header id="header">
				
						<div class="content">
                        <br/>
                       <h1> <u>Ajouter recours</u> </h1>
                       <br/>
                    <form action="page28.php?insert=1"   method="POST" name ="login" >
                   
				 <font size="+2">	<b>Date du recours :</b>                 <?php $dateRecours= date("F j, Y g:i a"); echo $dateRecours; ?></font><br/>
				 <font size="+2">   <b>période de sanction de ce procés :  </b><?php echo $row["periode"]; ?> jours </font><br/><br/>
				
			 
                    <input  size="80px"  type="text" placeholder="Justification" required name="justification"><br/>
							
					<div >
                    
						
						
                        <button type="submit" id="okok">
						  <font size="+2" color="green" style="font-weight:bold">Ajouter</font>
						</button>
					</div>
                        

					</form>
                        </div>
						
					</header>
  
				<!-- Footer -->
					<footer id="footer">
                   <b>  <div id="ejs_heure"  align="right">   </div></b>
                     <br/>
                     <div  align="right">
                     <form action="Recours.php"> <input  id="gr"align="left" type="submit" value="RETOUR"></form>
                     <div>
					</footer>

			</div>




		<!-- BG -->
			<div id="bg2"></div>

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
<?php


if(isset($_POST) && !empty($_POST['justification'])){
	$query="INSERT INTO Recours(dateRecours, justification, idSanction)VALUES('$dateRecours','$_POST[justification]','$idSanction')";
	$result=mysql_query($query) or die(mysql_error());
	$query1="UPDATE `ProcesVerbal` SET sanctionner='2' WHERE idPV ='".$idPV."'";
    $result1=mysql_query($query1) or die(mysql_error());
	if (($result)&&($result1)){echo'<script  language="javascript">alert (" faire recours avec succé ")</script>';
	header('Location:Recours.php');
	}
	else{ echo'<script  language="javascript">alert (" recours non saisie  ")</script>';}
	
	
	
}// fin IF
?>