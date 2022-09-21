<?php
include('connect.php');
if(isset($_POST['dateCommission'])&& !empty($_POST['dateCommission']))
{
$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$dateCommission=$_POST['dateCommission'];
$dateCommission_S= strtotime($_POST["dateCommission"]);

if ($ds > $dateCommission_S){
	echo" erreur ";}
	else {
		echo"";
	}
}




?>
