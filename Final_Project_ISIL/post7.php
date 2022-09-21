<?php
include('connect.php');
if(isset($_POST['date'])&& !empty($_POST['date']))
{
	$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$date_S= strtotime($_POST["date"]);
	if ($ds<$date_S){
	echo" date invalide ";}
	else {
		echo"";
	}
}




?>
