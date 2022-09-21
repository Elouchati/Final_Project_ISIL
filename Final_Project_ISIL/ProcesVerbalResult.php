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
<?php
	$idPV=$_SESSION['idPV'];
//PV
$query2="SELECT * FROM `ProcesVerbal` where idPV='$idPV'";
$result2=mysql_query($query2);
$row2=mysql_fetch_assoc($result2);
	
//PC
$query1="SELECT * FROM `PermisConduire` where numPermis='".$row2['numPermis']."'";
$result1=mysql_query($query1);
$row1=mysql_fetch_assoc($result1);

?>
<!DOCTYPE>
<html>
<head>
<title> Procés verbal </title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='shortcut icon' type='image/x-icon' href='imag/avatar14.png' > 
<link rel='stylesheet' type='text/css' href='fonts/font-awesome-4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='./AppSchicksal/w3.css'>
<link rel='stylesheet' href='./AppSchicksal/css(1)'> 
<link rel="stylesheet" href="./AppSchicksal/css.css">
<link rel="stylesheet" type="text/css" href="./AppSchicksal/util.css">	


</head>
<body>


<!-- Page Content -->
<div class=" display-container w3-padding-large">


  <!-- About Section -->
  <div  class="w3-content w3-justify w3-text-grey w3-padding-64"id="PV">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;
   
 <font size="+5" color="#000000">Procés Verbal bien enregistrer !  </font> <br/><br/>
 
<p class="w3-center">
Nom et Prénom de contrevenant : 
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row1["nom"]; echo" "; echo $row1["prenom"];?></a></b><br/><br/>
Sexe: 
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row1["sexe"];?> </a></b>
Date de naissance:
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row1["dateNais"];?></a></b> &nbsp;
 A:
  <b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"> <?php echo $row1["lieuNais"];?> </a></b>
</p>
<p class="w3-center">
Adresse: 
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row1["adresse"];?> &nbsp;</a></b><br/><br/>
Numéro du permis de conduire :
 <b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row1["numPermis"];?></a></b><br/>

Commune: 
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row1["commune"];?> &nbsp;</a></b>
Wilaya de: 
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row1["wilaya"];?> &nbsp;</a></b>
</p>

<p class="w3-center">

 Type de véhicule :
 <b> <a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row2["typeVehicule"];?> &nbsp;</a> </b>
  Matricule de véhicule :
   <b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row2["matricule"];?> &nbsp;</a></b>
</p>
<p class="w3-center">
<br/>

<font size="+1"><u>Infractions commis :</u></font> 
<b><a class="w3-padding-large w3-text-black w3-large text-right w3-wide w3-animate-opacity"><?php 
			//RelPVInf
								$query3="SELECT * FROM `RelPVInf` where idPV='".$row2['idPV']."'";
								$result3=mysql_query($query3);
								$numrow3=mysql_num_rows($result3);
								if($numrow3>0){
								while($row3=mysql_fetch_assoc($result3)){
			//Infractions
								$query4="SELECT * FROM `Infractions` where inf='".$row3['inf']."'";
								$result4=mysql_query($query4);
								$row4=mysql_fetch_assoc($result4);
								echo "<p>".$row4["nomType"].": ".$row4["natureInfraction"]."</p>";
								}
										}
									?> 
  &nbsp;</a></b><br/>
Numéro de la route du transgression :
<b> <a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row2["numDeRoute"];?> &nbsp;</a></b>
Commune: 
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row2["commune"];?> &nbsp;</a></b>
Wilaya : 
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row2["wilaya"];?> &nbsp;</a></b>

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Amende du procés: 
<b><a class="w3-padding-large w3-text-black w3-large w3-wide w3-animate-opacity"><?php echo $row2["amende"];?> DA </a></b>
</p>
				
	<!-- End About Section -->
  </div>
<!-- END PAGE CONTENT -->
</div>
</body>
</html>
