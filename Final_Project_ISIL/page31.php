<?php  
session_start();
require("auth.php");
if (Auth::isLogged()){ 
}
else { 
header('Location:index.php#connecter');
}
mysql_query("SET NAMES cp1256" ); // pour afficher en arabe 
mysql_query("SET character set cp1256" ); // pour afficher en arabe 
mysql_connect("localhost", "root", ""	);
mysql_select_db("AppRetraitPermisConduire");
mysql_query("SET NAMES utf8");

$query3 = "UPDATE ProcesVerbal SET sanctionner ='4' where idPV = '".$_POST["idPV"]."'";
$result3 = mysql_query( $query3); 			    
if($result3){echo "Terminer";}
else{echo"pas Terminer";}

 ?>