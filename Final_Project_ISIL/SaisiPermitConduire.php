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
			<script type="text/javascript" src="js/jquery.min.js"> </script>
            			<link rel="stylesheet" href="assets/css/date.css" />
                        
            <style>#gr ,#gg ,#prenom_manquant,#nom_manquant{ font-weight: bold;}</style> 
	</head>
    


	<body>
 



	<!-- Wrapper -->
			<div id="wrapper" style="background-color: rgba(0,0,0,0.74)">

				<!-- Header -->
                
					<header id="header">
				
						<div class="content">
                        <br/>
                       <h1> Ajouter permis de conduire </h1>
                       <br/>
                    <form action="SaisiPermitConduire.php?insert=1"   method="POST" name ="login" >
                    	<font color="#E91115" ><span  class="feedback"></span></font><br/>
                        
                       <input  size="80px" type="text" id="numPermis" placeholder="Numéro permis de conduire" required name="numPermis" onkeypress="return ok(event);"/> 
                       
                       
                       
                       <br/>
                       					
                     <input  size="80px" type="text" id="nom" placeholder="Nom" required name="nom" onkeypress="return verif(event);" ><br/>
                       						
                       <input  size="80px" type="text" placeholder="Prénom" required name="prenom" onkeypress="return verif(event);"><br/>
					   <label><b>Date de naissance :</b><input  size="" type= "date" id ="dateNais"  required name="dateNais" /><font id ="gg" color="#E91115" > <span class="feedback4"></span> </font></label><br/>
					   <input  size="80px" type="text" placeholder="Lieu de naissance" required name="lieuNais"><br/>
                       <select    name="sexe" >
                       <option value="" selected disabled hidden>Sexe</option>
                       <option>Femme </option>
                       <option>Homme </option>
                       </select><br/>
					   <input class="input100" type="text" placeholder="Adresse" required name="adresse"><br/>
					   <input class="input100" type="text" placeholder="Commune" required name="commune"><br/>
					<select  required name="wilaya">
                    <option value="" selected disabled hidden>Wilaya</option>
					
                    <option  >Adrar</option>
                    <option  >Chlef</option>
					<option  >Laghouat</option>
                    <option  >Oum El Bouaghi</option>
                    <option  >Batna</option>
					<option  >Béjaïa</option>
                    <option  >Biskra</option>
                    <option  >Béchar</option>
					<option  >Blida</option>
                    <option  >Bouira</option>
                    <option  >Tamanrasset</option>
					<option  >Tébessa</option>
                    <option  >Telemcen</option>
                    <option  >Tiaret</option>
					<option  >Tizi Ouzou</option>
                    <option  >Alger</option>
                    <option  >Djelfa</option>
                    <option  >Jijel</option>
                    <option  >Sétif</option>
					<option  >Saïda</option>
                    <option  >Skikda</option>
                    <option  >Sidi Bel Abbès</option>
					<option  >Annaba</option>
                    <option  >Guelma</option>
                    <option  >Constantine</option>
					<option  >Médéa</option>
                    <option  >Mostaganem</option>
                    <option  >M'Sila</option>
					<option  >Mascara</option>
                    <option  >Ouargla</option>
                    <option  >Oran</option>
					<option  >El Bayadh</option>
                    <option  >Illizi</option>
                    <option  >Bordj Bou Arreridj</option>
					<option  >Boumerdès</option>
                    <option  >El Tarf</option>
                    <option  >Tindouf</option>
					<option  >Tissemsilt</option>
                    <option  >El Oued</option>
                    <option  >Khenchela</option>
					<option  >Souk Ahras</option>
                    <option  >Tipaza</option>
                    <option  >Mila</option>
                    <option  >Aïn Defla</option>
                    <option  >Naâma</option>
					<option  >Aïn Témouchent</option>
                    <option  >Ghardaïa</option>
                    <option  >Relizane</option>
                    </select><br/>
                    <select required name="groupeSanguin">
                <option value="" selected disabled hidden>Groupe sanguin</option>
                    <option  >A+</option>
                    <option  >A-</option>
					<option  >B+</option>
                    <option  >B-</option>
                    <option  >AB+</option>
					<option  >AB-</option>
                    <option  >O+</option>
                    <option  >O-</option>
                    </select><br/>
   					 <label><b>Date de délivrance du permis :</b><input id ="dateDeDelivraison" type="date" placeholder="Date de delivraison" required name="dateDeDelivraison"><font color="#E91115" ><span id="gg"class="feedback5"></span> </font></label>
                     
              <input onChange="javascript:changeCase(this.form.champ2)"  size="80px" type="text" id="categorie" placeholder="Entrer la categorie du permis ( A1 |A2 |B |C1 |C2 |D |E |F ) " onkeypress="return verifa(event);" required name="categorie">
                 
          
                    <label for="numImpr"></label><font color="#E91115" ><span class="feedback2"></span></font>
   					<input type="text" id ="numImpr" placeholder="Numéro de l’imprimé" required name="numImpr" onkeypress="
     if((event.keyCode < 44 || event.keyCode > 57) && !((event.keyCode == 8) || (event.keyCode == 37) || (event.keyCode == 39) || (event.keyCode ==46))) event.returnValue = false;
     if((event.which < 45 || event.which > 57) && !((event.which==8) || (event.which ==37) || (event.which==39) || (event.which==46))) return false;
     if(window.event.preventDefault) window.event.preventDefault();" />
                    <br/>

				
					
							
					<div >
                    
						
						<button type="reset">
						<b>Annuler</b>
						</button>&nbsp; &nbsp;&nbsp; &nbsp;
                        <button type="submit" id="okok">
						<b>Ajouter</b>
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
                   <b>  <div id="ejs_heure"  align="right">   </div></b>
                     <br/>
                     <div  align="right">
                     <form action="accueil.php#permis"> <input  id="gr"align="left" type="submit" value="RETOUR"></form>
                     <div>
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
<script src="func1.js"></script>
<script src="func2.js"></script>
<script src="func3.js"></script>
<script src="func4.js"></script>
<script src="func5.js"></script>






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

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchPermis.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
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
<?php


if(isset($_POST) && !empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['dateNais'])&& !empty($_POST['lieuNais'])&& !empty($_POST['adresse'])&& !empty($_POST['sexe'])&& !empty($_POST['commune'])&& !empty($_POST['wilaya']) && !empty($_POST['groupeSanguin'])&& !empty($_POST['dateDeDelivraison'])&& !empty($_POST['categorie']) && !empty($_POST['numImpr'])){
//test1
$mrs =$_POST['nom'];
$numPermis=$_POST['numPermis'];
$query1="SELECT numPermis FROM `PermisConduire`";
$result1=mysql_query($query1);
while($row1 = mysql_fetch_assoc($result1)){
if($numPermis==$row1["numPermis"]){
		 $numPermis="NULL";}
		 }//fin while
//test2
$numImpr=$_POST['numImpr'];
$query2="SELECT numImpr FROM `PermisConduire`";
$result2=mysql_query($query2);
while($row2 = mysql_fetch_assoc($result2)){
if($numImpr==$row2["numImpr"]){
		 $numImpr="NULL";}
		 }//fin while
//test3
$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$dateNais=$_POST['dateNais'];
$dateNais_S= strtotime($_POST["dateNais"]);
$a18=3600*24*365*18 ;
$dns18 = $dateNais_S+$a18 ;
$a=$ds-$dateNais_S; 
$age=$a/31536000; 
if (($ds < $dns18)||($ds < $dateNais_S)){
	$dateNais="NULL";}
	
//test3
$dateDeDelivraison=$_POST['dateDeDelivraison'];
$dateDeDelivraison_S= strtotime($_POST["dateDeDelivraison"]);
if (($dateDeDelivraison_S < $dns18)||($ds<$dateDeDelivraison_S)){
	$dateDeDelivraison="NULL";}
	
	
	$query="INSERT INTO PermisConduire(numPermis, nom, prenom, dateNais, lieuNais, sexe, adresse, commune, wilaya, groupeSanguin, dateDeDelivraison, categorie, numImpr) VALUES('$_POST[numPermis]','$_POST[nom]','$_POST[prenom]','$_POST[dateNais]','$_POST[lieuNais]','$_POST[sexe]','$_POST[adresse]','$_POST[commune]','$_POST[wilaya]','$_POST[groupeSanguin]','$_POST[dateDeDelivraison]','$_POST[categorie]','$_POST[numImpr]')";
	if(($numPermis!="NULL")&&($numImpr!="NULL")&&($dateNais!="NULL")&&($dateDeDelivraison!="NULL")){
	$result = mysql_query($query) or die(mysql_error());
	if ($result) echo'<script  language="javascript">alert (" permis de conduire ajouté avec succé ")</script>';
	
	}
	else{ echo'<script  language="javascript">alert (" Permis non saisie  ")</script>';}
	
	
	
}// fin IF
?>


<script type="text/javascript">
    function verif(evt) {
        var keyCode = evt.which ? evt.which : evt.keyCode;
        var accept = 'abcdefghijklmnopqrstuvwxyzéçàùABCDEFGHIJKLMNOPQRSTUVWXYZ-_ \s';
        if (accept.indexOf(String.fromCharCode(keyCode)) >= 0) {
            return true;
        } else {
            return false;
        }
    }
</script>
<script type="text/javascript">
    function verifa(evt) {
        var keyCode = evt.which ? evt.which : evt.keyCode;
        var accept = 'A1 A2 B C1 C2 D E F';
        if (accept.indexOf(String.fromCharCode(keyCode)) >= 0) {
            return true;
        } else {
            return false;
        }
    }
</script>
<script type="text/javascript">
    function ok(evt) {
        var keyCode = evt.which ? evt.which : evt.keyCode;
        var accept = '1234567890/.';
        if (accept.indexOf(String.fromCharCode(keyCode)) >= 0) {
            return true;
        } else {
            return false;
        }
    }
</script>