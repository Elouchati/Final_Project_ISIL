<?php
include('connect.php');
if(isset($_POST['numPermis'])&& !empty($_POST['numPermis']))
{
	$numPermis=mysql_real_escape_string(htmlentities($_POST['numPermis']));
	$query="SELECT * FROM PermisConduire WHERE numPermis ='$numPermis'";
	$result=mysql_query($query) or die(mysql_error());
	
	$rows = mysql_num_rows($result);

	if ($rows==1){
		echo" existe déja ";
		
	
	}else {
		echo" ";
	}
}


?>