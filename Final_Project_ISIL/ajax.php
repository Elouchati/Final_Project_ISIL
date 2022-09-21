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
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" /> 
<title>Connexion</title>
</head>
<body>
<?php
	mysql_query("SET NAMES utf8"); // pour afficher en arabe 
	mysql_query("SET character set utf8" ); // pour afficher en arabe 
	if(isset($_GET['degre']) && !empty($_GET['degre'])){
	
	$id = $_GET['degre'];
	$query = "SELECT * FROM Infractions WHERE idType='$id'";
		  
	$do= mysql_query($query);
	$count = mysql_num_rows($do);
	
	
	if($count>0){
		while($row= mysql_fetch_array($do)){
			echo '<option value="'.$row['inf'].'">'.$row['natureInfraction'].'</option>';
			} //fin while 
		}// fin if
		else {
			echo'<option> il faut selectionner le degré avant </option>'; 
			
			}// fin else  
	}// fin if 
	else {
		echo'<h1>erreur</h1>';
		} // fin else 
?>

</body>
</html>