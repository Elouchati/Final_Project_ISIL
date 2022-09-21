<?php
include('connect.php');
if(isset($_POST['dateNais'])&& !empty($_POST['dateNais']))
{
	$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$dateNais=$_POST['dateNais'];
$dateNais_S= strtotime($_POST["dateNais"]);
$a18=3600*24*365*18 ;
$dns18 = $dateNais_S+$a18 ;
$a=$ds-$dateNais_S; 
$age=$a/31536000; 


	if (($ds < $dns18)||($ds<$dateNais_S)){
	echo" Date invalide ";}
	else {
		echo"";
	}
}




?>
