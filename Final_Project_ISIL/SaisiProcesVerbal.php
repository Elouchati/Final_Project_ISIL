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
			<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" /> 
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="assets/css/main.css" />
			<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
			<link rel="shortcut icon" type="image/x-icon" href="imag/avatar14.png" > 
			<script type="text/javascript" src="js/jquery.min.js"> </script>
			<link rel="stylesheet" href="assets/css/date.css" />
            <style>#gr ,#gg{ font-weight: bold;}</style> 
            
<script>
$(document).ready(function(){
	$('#degre').on('change',function(){
		var degreId = $(this).val();
		if (degreId){
			$.get(
			"ajax.php",
			{degre: degreId},
			function(data){
				$('#nature').html(data);
				}// fin func data
			);
		
		}//fin if
		else{
			$('#nature').html('<option> Selectionnez le degré d&#8217;abord </option>');
			}//fin else 
		});//fin func 
	
	});// fin doc
</script>
</head>
    


	<body>
 



	<!-- Wrapper -->
			<div id="wrapper" style="background-color: rgba(0,0,0,0.74)" >

				<!-- Header -->
                
					<header id="header">
				
						<div class="content">
                        <br/>
                       <h1> Nouveau proc&eacute;s verbal </h1>
                       <br/>
                    <form action="RedigerProcesVerbal.php"   method="POST" name ="login" >
                    	            
                                    
                        <b>Heure de transgression :</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="time"  name="heure" placeholder="Enter l'heure " required /><br/><br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       &nbsp;&nbsp; <b>Date de transgression :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                       <input type="date"  name="date" id="date" placeholder="Enter la date " required  /><label for="date"></label>
                       <font id="gg" color="#E91115" style="text-shadow:rgba(233,17,21,1.00)"><span class="feedback7"></span></font><br/><br/>
							<select name="provenanceDuPermis"  class="input100 w3-text-black"/><br/>
                            <option value="" selected disabled hidden>Provenance du permis de conduire</option>
                    			<option class="w3-text-grey">POLICE NATIONALE </option>
                    			<option class="w3-text-grey">GENDARMERIE NATIONALE </option>
                    		</select><br/>
                            
					    <input type="text"  name="numDeRoute" placeholder="Enter la route " required /><br/>
					    <input class="input100" type="text" placeholder="Commune" required name="commune"><br/>
					<select  required name="wilaya">
                    <option value="" selected disabled hidden>Wilaya</option>
                    <option  >Adrar</option>
                    <option  >Chlef</option>
					<option  >Laghouat</option>
                    <option  >Oum El Bouaghi</option>
                    <option  >Batna</option>
					<option  >B&eacute;ja&iuml;a</option>
                    <option  >Biskra</option>
                    <option  >B&eacute;char</option>
					<option  >Blida</option>
                    <option  >Bouira</option>
                    <option  >Tamanrasset</option>
					<option  >T&eacute;bessa</option>
                    <option  >Telemcen</option>
                    <option  >Tiaret</option>
					<option  >Tizi Ouzou</option>
                    <option  >Alger</option>
                    <option  >Djelfa</option>
                    <option  >Jijel</option>
                    <option  >S&eacute;tif</option>
					<option  >Sa&iuml;da</option>
                    <option  >Skikda</option>
                    <option  >Sidi Bel Abb&egrave;s</option>
					<option  >Annaba</option>
                    <option  >Guelma</option>
                    <option  >Constantine</option>
					<option  >M&eacute;d&eacute;a</option>
                    <option  >Mostaganem</option>
                    <option  >M'Sila</option>
					<option  >Mascara</option>
                    <option  >Ouargla</option>
                    <option  >Oran</option>
					<option  >El Bayadh</option>
                    <option  >Illizi</option>
                    <option  >Bordj Bou Arreridj</option>
					<option  >Boumerd&egrave;s</option>
                    <option  >El Tarf</option>
                    <option  >Tindouf</option>
					<option  >Tissemsilt</option>
                    <option  >El Oued</option>
                    <option  >Khenchela</option>
					<option  >Souk Ahras</option>
                    <option  >Tipaza</option>
                    <option  >Mila</option>
                    <option  >A&iuml;n Defla</option>
                    <option  >Na&acirc;ma</option>
					<option  >A&iuml;n T&eacute;mouchent</option>
                    <option  >Gharda&iuml;a</option>
                    <option  >Relizane</option>
                    </select><br/>
                     <input type="text"  name="typeVehicule" placeholder="Enter le type v&eacute;hicule" required/><br/>
                    <input type="text"  name="matricule" placeholder="Entrer le matricule" required /><br/>
                    
				
                    <select type="text" name="numPermis" required />
					<option value="" selected disabled hidden>selectionnez le permis que vous voulez l'ajouter dans ce procés </option>
					<?php
		            $query1="SELECT * FROM `PermisConduire` order by nom";
		            $result1=mysql_query($query1);
		            if(mysql_num_rows($result1)>0){
		            while($row1=mysql_fetch_assoc($result1)){
	             	echo"<option>".$row1["nom"]." --".$row1["prenom"]." -- ".$row1["numPermis"]."</option>";}}
	            	else if(mysql_num_rows($result1)==0) {
					echo"<option> Aucun pérmis de conduire n’est éxictant dans le systéme. </option>";}
	            	?>
					 </select><a href="SaisiPermitConduire.php"> <font style="color: rgba(252,120,5,0.90)  ">Ajouter un nouveau permis de conduire </font></a> <br/><br/>
                     	                     
                     
                     <input type="text"  name="amende" placeholder="Entrer l'amende de ce Procés verbal" required /><br/>

				
					
							
					<div >
                    
						
						<button type="reset">
						<b>Annuler</b>
						</button>&nbsp; &nbsp;&nbsp; &nbsp;
                        <button type="submit" id="okok">
						<b>Suivant</b>
						</button>
                        <br/><br/>
					</div>
                        

					</form>
                        </div>
						
					</header>

				<!-- Main -->
					<div id="main">
 					    
				   
					</div>
                    
				<!-- Footer -->
					<footer id="footer">
                    <b> <div id="ejs_heure"  align="right">   </div></b>
                     <br/>
                     <div  align="right">
                      <form action="accueil.php#permis"> <input id="gr"align="left" type="submit" value="RETOUR"></form>
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
<script src="func7.js"></script>


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
