<?php
// Start the session
session_start();
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
//$a= date("F j, Y g:i a");                         
//$ds = strtotime($a);
//$idCommission_S= strtotime($_POST["idCommission"]);
//if ($ds == $idCommission_S){
$_SESSION['idCommission']=$_POST["idCommission"];
//header('Location:sanctionner.php');
//}
//else echo 'commission pas disponible'; 
 ?>