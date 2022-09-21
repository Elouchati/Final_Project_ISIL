<?php
// Start the session
session_start();
require("auth.php");
if (Auth::isLogged()){ 
}
else { 
header('Location:bienvenue.php');
}
?>
<?php
if(isset($_POST) && !empty($_POST['lieuCommission'])&& !empty($_POST['dateCommission'])&& !empty($_POST['heureCommission'])&& !empty($_POST['representantTravauxPublic'])&& !empty($_POST['representantGendarmerie'])&& !empty($_POST['representantPolice'])&& !empty($_POST['representantenrgMine'])&& !empty($_POST['representantAuto_ecole']) && !empty($_POST['representantTransport'])&& !empty($_POST['rapporteur'])&& !empty($_POST['presidentCommission'])){	         
	$query="INSERT INTO Commission(lieuCommission,dateCommission, heureCommission, representantTravauxPublic, representantGendarmerie, representantPolice, representantenrgMine, representantAuto_ecole, representantTransport, rapporteur, presidentCommission) 
	
	VALUES('$_POST[lieuCommission]','$_POST[dateCommission]','$_POST[heureCommission]','$_POST[representantTravauxPublic]','$_POST[representantGendarmerie]','$_POST[representantPolice]','$_POST[representantenrgMine]','$_POST[representantAuto_ecole]','$_POST[representantTransport]','$_POST[rapporteur]','$_POST[presidentCommission]')";
	
	
	
	
	$result = mysql_query($query) or die(mysql_error());
	if ($result) {
	$query1="SELECT * FROM `Commission`";
    $result1=mysql_query($query1);
	$numrows=0;
	while($row1=mysql_fetch_assoc($result1)){
	$numrows=$numrows+1;
	if($numrows==mysql_num_rows($result1)){
	$idCommission=$row1["idCommission"];}}
	$_SESSION['idCommission']=$idCommission;
	header('Location:page13.php');}
	
	else{ echo'<script  language="javascript">alert (" Commission non saisie  ")</script>';}
	
	
	
}// fin IF
?>