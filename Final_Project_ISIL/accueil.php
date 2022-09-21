<?php
// Start the session
session_start();
require("auth.php");
if (Auth::isLogged()){ 
}
else { 
header('Location:index.php#connecter');
}
?>
<!-- *** **** ****** ****** ***** ******* ****** ****** ****** * ***** *** **** *** *** * *** * *-->
<!DOCTYPE HTML>

<html>
	<head>
		<title>Acceuil</title>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="assets/css/main.css" />
			<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
			<link rel="shortcut icon" type="image/x-icon" href="imag/avatar14.png" > 
            <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
           <style>#gr ,#men{ font-weight: bold;}
           		  .mghazla{ background-color: rgba(27, 31, 34, 0.3);
				  			margin-left: 39%;
							margin-right:39%;	}
				  #po { background-color: rgba(27, 31, 34, 0.3);
							    margin-left: 10%;
								margin-right:10%;}				
           
           </style> 
	</head>
	<body>
 

	<!-- Wrapper -->
			<div id="wrapper" style="background-color: rgba(0,0,0,0.3)">
            <?php 
                    echo'<marquee  id="po" direction="right"  > <div align="center"><b>Bonjour !! Soyez le bienvenue</b> </div> </marquee>';
				
					?> 
				<!--
                     <?php
					if (0<2){
                    echo'<marquee  direction="right" ><font font size="+3" color="#E91115"><a>aaaa</a></font></marquee>';
					}
					?> 
								
                -->
					<header id="header">  
                    
			    
                    <nav id="men">
                    		<ul>
								<li><a href="#permis">Gestion des procés </a></li>
								<li><a href="#inf">	  Catalogue d'infraction</a></li>
								<li><a href="#com">

								<?php 
								 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
$a= date("F j, Y g:i a"); // date d'aujourd'hui 
$ds = strtotime($a);// date d'aujourd'hui en seconde 
$dyn = $ds-(9*3600) ; // date d'aujourd'hui -12h en seconde 
$dyp =  $ds+(9*3600) ; // date d'aujourd'hui +12h en seconde



$sql = "SELECT * FROM Commission";  
$result = mysql_query( $sql); 
$commission="0";
$q=0;
while(($row = mysql_fetch_array($result))&&($q==0)){


$dataCommission_S= strtotime($row["dateCommission"]);


if (($dyn <= $dataCommission_S )&&($dataCommission_S <= $dyp)){
	echo'<div><marquee HEIGHT="40" direction="down"><font color=red >Gestion des commissons <br/>Gestion des commissons </font></marquee></div>';
	$commission="1";$q=1;
}}
 if($commission!="1"){	echo"Gestion des commissons "; }


							
								
								
															
								/**
								if(0<2){
									echo'<div><marquee HEIGHT="40" direction="down"><font color=red >Gestion des commissons <br/>Gestion des commissons </font></marquee></div>'; 
								}
								else {
									echo"Gestion des commissons ";			
									}
								*/
								?>
                                </a></li>
                                <li><a href="#sanc"> Gerer sanction et recours </a></li>
                                <li><a href="#stat">
                                        Statistique&nbsp;&nbsp;&nbsp;&nbsp;
                                		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                		&nbsp;</a></li>
                                
								
							</ul>
						</nav>
                   
					</header>
                    
										
                      
				<!-- Main -->
					<div id="main">
    
    <!-- permis -->
    						<article id="permis">
							  <div  align="center">
                              <h1>GESTION DES PROCES</h1> 
                              <b><a href="SaisiPermitConduire.php">Ajouter Permis de conduire</a></b><br/>
                              <b><a href="chercherPermis.php">Rechercher Permis de conduire </a></b><br/>
                              <b><a href="page1.php">Supprimer/Modifier Permis de conduire </a></b><br/>
							  <b><a href="consulterPC.php">Consulter l'historique des permis de conduire </a></b><br/>
                              <b><a href="SaisiProcesVerbal.php">Nouveau Procés verbal</a></b><br/>	
                              <b><a href="chercherProces.php">Rechercher Procés verbal </a></b><br/>
                              <b><a href="page5.php">Supprimer Procés verbal </a></b><br/>
		                      <b><a href="consulterPV.php">Consulter la liste des Procés verbaux sanctionner </a></b><br/>
                              <b><a href="consulterPVnon.php">Consulter la liste des Procés verbaux non sanctionner </a></b><br/>
                              </div>
                              </article>
    
    
    <!-- infraction -->
    	<article id="inf">
							  <div  align="center">
                              <h2>CATALOGUE D'INFRACTION </h2> 
                              <b><a href="catalogueInf.php">Liste des infractions </a></b><br/>
                              <b><a href="chercheInf.php">rechercher une infraction  </a></b><br/>
                              
                              </div>
                              </article>
                              
      <!-- Commission -->       
       <article id="com">
							  <div  align="center">
                               <h2>GESTION DES COMMISSIONS</h2> 
                              <b><a href="Commission.php">Programmer une commission </a></b><br/>
							  <b><a href="page16.php">Annuler une commission </a></b><br/>
                              <b><a href="page19.php">Planning des commissions </a></b><br/>
                              <b><a href="chercherCommission.php">Chercher une commission </a></b><br/>
                              </div>
                              </article>    
      <!-- SANCTION ET RECOURS -->       
       <article id="sanc">
							  <div  align="center">
                               <h2>GESTION SANCTION ET RECOURS </h2> 
                             
                              <b><a href="sanctionner.php">Attribuer les sanctions</a></b><br/>
							  <b><a href="Recours.php">Ajouter les recours</a></b><br/>
							  <b><a href="Recours2.php">validation des recours</a></b><br/>
                              
                              </div>
                              </article>     
    
       <!-- Statistiques -->       
       <article id="stat">
							  <div  align="center">
                               <h2>Statistique :  </h2> 
                             
                              <b><a href="statique2.php">Par tranche d'age </a></b><br/>
							  <b><a href="statistique1 .php">Par degré </a></b><br/>
							  <b><a href="statique.php">Par sexe </a></b><br/>
                              
                              </div>
                              </article>       
    
       <!--- déconnexion --->    
       						<article id="vers">
								<p>Etes vous sur de vouloir quitter <b>Appschicksal</b> ?</p>
                             <div align="center"><b><a href="deconnexion.php">OUI</a></b></div>
							</article>
					</div>
    
                    
				<!-- Footer -->
					<footer id="footer">
                       <div align="center" class="mghazla"> <font color="#FFFFFF"> قال النبي عليه الصلاة والسلام 
															<br/>
       											((إِنّ اللَّهَ تَعَالى يُحِبّ إِذَا عَمِلَ أَحَدُكُمْ عَمَلاً أَنْ يُتْقِنَهُ ))
															<br/>			
									[البيهقي عَنْ عَائِشَةَ]</font></div><br/><br/>
                                    
                       <div align="center" class="mghazla"> <font color="#FFFFFF" size="+1"> 
                      "Allah will be pleased with those who try to do thier work in a perfect way"
                       </font></div>
                                    

                                    
                     <b><div id="ejs_heure"  align="right">   </div></b>
                     <br/>
                     <div  align="right"><form action="#vers"> 
                     <input type="submit" id="gr"value="QUITTER"></form>
                                      
                                     
                                    
             
                      <div>
                  

					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>
</div>
		<!-- Scripts -->
        
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

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