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

$query1="SELECT * FROM `PermisConduire`";
		$result1=mysql_query($query1);
		if(mysql_num_rows($result1)>0){
		while($row1=mysql_fetch_assoc($result1)){
		$string=$row1["nom"]." --".$row1["prenom"]." -- ".$row1["numPermis"];
		if($_POST['numPermis']==$string){$numPermis=$row1["numPermis"];}}}

$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$date_S= strtotime($_POST["date"]);
if ($ds<$date_S){
$_POST["date"]="NULL";
	}

if(isset($_POST) && !empty($_POST['heure'])&& !empty($_POST['numDeRoute'])&& !empty($_POST['date'])&& !empty($_POST['provenanceDuPermis'])&& !empty($_POST['commune'])&& !empty($_POST['wilaya'])&& !empty($_POST['typeVehicule'])&& !empty($_POST['matricule']) && !empty($_POST['amende']) && !empty($_POST['numPermis'])){
	
	$query="INSERT INTO ProcesVerbal(heure, date, numDeRoute, provenanceDuPermis, commune, wilaya, typeVehicule, matricule, amende, numPermis, sanctionner) VALUES('$_POST[heure]', '$_POST[date]', '$_POST[numDeRoute]', '$_POST[provenanceDuPermis]', '$_POST[commune]', '$_POST[wilaya]', '$_POST[typeVehicule]', '$_POST[matricule]', '$_POST[amende]','$numPermis', '0')";
	if(($_POST["date"]!="NULL")&&($numPermis!="NULL")&&($numPermis!=0)){
	$result = mysql_query($query) or die(mysql_error());
	if ($result){
	$query1="SELECT * FROM `ProcesVerbal`";
    $result1=mysql_query($query1);
	$numrows=0;
	while($row1=mysql_fetch_assoc($result1)){
	$numrows=$numrows+1;
	if($numrows==mysql_num_rows($result1)){
	$idPV=$row1["idPV"];}}

	$_SESSION['idPV']=$idPV;
	                
	//PC
    $query1="SELECT * FROM `PermisConduire` where numPermis='$numPermis'";
    $result1=mysql_query($query1);
    $row1=mysql_fetch_assoc($result1);
    $nbPV=$row1["nbPV"]+1;
	$query2="UPDATE `PermisConduire` SET `nbPV`='$nbPV' WHERE `numPermis`='$numPermis'";
    $result2 = mysql_query($query2) or die(mysql_error());
	
 header('Location:page9.php');}
 else{echo "erreur1";}}
}// fin IF
else {echo "erreur2";}
?>