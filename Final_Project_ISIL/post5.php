<?php
include('connect.php');
if(isset($_POST['dateDeDelivraison'])&& !empty($_POST['dateDeDelivraison']))
{
	$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$dateDeDelivraison=$_POST['dateDeDelivraison'];
$dateDeDelivraison_S= strtotime($_POST["dateDeDelivraison"]);
$a18=3600*24*365*18 ;
	if ($ds<$dateDeDelivraison_S){
	echo" Date invalide ";}
	else {
		echo"";
	}
}




?>
