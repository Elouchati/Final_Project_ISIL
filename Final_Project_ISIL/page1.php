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
			<div id="wrapper" style="background-color: rgba(0,0,0,0.5); ">

				<!-- Header -->
                
					<header id="header">
				
						<div class="content">
                        <br/>
 					<h1> Supprimer/Modifier Permis de conduire  </h1>
                        <br/>
                        <div id="live_data"></div> 
                    <script>
 $(document).ready(function(){ 
 function fetch_data(){  
           $.ajax({  
                url:"page2.php",  
                method:"POST",  
                success:function(data){$('#live_data').html(data);}  
                  });  
      } 
	  
fetch_data();
	  
function edit_data(idPC,text,column)  
      {  
           $.ajax({  
                url:"page4.php",  
                method:"POST",  
                data:{idPC:idPC, text:text, column:column},  
                dataType:"text",  
                success:function(data){alert(data);}  
           });  
      }
	  
$(document).on('blur', '.nom', function(){  
           var idPC = $(this).data("id1");  
		   var nom = $(this).text(); 
           edit_data(idPC, nom, "nom");  
      });
$(document).on('blur', '.prenom', function(){  
           var idPC = $(this).data("id2");  
		   var prenom = $(this).text(); 
           edit_data(idPC, prenom, "prenom");  
      });
$(document).on('blur', '.dateNais', function(){  
           var idPC = $(this).data("id3");  
		   var dateNais = $(this).text(); 
           edit_data(idPC, dateNais, "dateNais");  
      });
$(document).on('blur', '.lieuNais', function(){  
           var idPC = $(this).data("id4");  
		   var lieuNais = $(this).text(); 
           edit_data(idPC, lieuNais, "lieuNais");  
      });
$(document).on('blur', '.sexe', function(){  
           var idPC = $(this).data("id5");  
		   var sexe = $(this).text(); 
           edit_data(idPC, sexe, "sexe");  
      });
$(document).on('blur', '.groupeSanguin', function(){  
           var idPC = $(this).data("id6");  
		   var groupeSanguin = $(this).text(); 
           edit_data(idPC, groupeSanguin, "groupeSanguin");  
      });
$(document).on('blur', '.adresse', function(){  
           var idPC = $(this).data("id7");  
		   var adresse = $(this).text(); 
           edit_data(idPC, adresse, "adresse");  
      });
$(document).on('blur', '.commune', function(){  
           var idPC = $(this).data("id8");  
		   var commune = $(this).text(); 
           edit_data(idPC, commune, "commune");  
      });
$(document).on('blur', '.wilaya', function(){  
           var idPC = $(this).data("id9");  
		   var wilaya = $(this).text(); 
           edit_data(idPC, wilaya, "wilaya");  
      });
$(document).on('blur', '.numPermis', function(){  
           var idPC = $(this).data("id10");  
		   var numPermis = $(this).text(); 
           edit_data(idPC, numPermis, "numPermis");  
      });
$(document).on('blur', '.numImpr', function(){  
           var idPC = $(this).data("id11");  
		   var numImpr = $(this).text(); 
           edit_data(idPC, numImpr, "numImpr");  
      });
$(document).on('blur', '.dateDeDelivraison', function(){  
           var idPC = $(this).data("id12");  
		   var dateDeDelivraison = $(this).text(); 
           edit_data(idPC, dateDeDelivraison, "dateDeDelivraison");  
      });
$(document).on('blur', '.categorie', function(){  
           var idPC = $(this).data("id13");  
		   var categorie = $(this).text(); 
           edit_data(idPC, categorie, "categorie");  
      });
$(document).on('blur', '.nbPV', function(){  
           var idPC = $(this).data("id14");  
		   var nbPV = $(this).text(); 
           edit_data(idPC, nbPV, "nbPV");  
      });
$(document).on('click', '.btn_delete', function(){  
           var idPC=$(this).data("id15");  
           if(confirm("Etes vous sur de vouloir supprimer de permis de conduire ?"))  
           {  
                $.ajax({  
                     url:"page3.php",  
                     method:"POST",  
                     data:{idPC:idPC},  
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
                     
						 <form action="accueil.php#permis"> <input align="left" type="submit" id="gr"value="RETOUR"></form>                     
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
