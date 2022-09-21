<?php
include('connect.php');
if(isset($_POST['numImpr'])&& !empty($_POST['numImpr']))
{
	$numImpr=mysql_real_escape_string(htmlentities($_POST['numImpr']));
	$query="SELECT * FROM PermisConduire WHERE numImpr ='$numImpr'";
	$result=mysql_query($query) or die(mysql_error());
	
	$rows = mysql_num_rows($result);

	if ($rows==1){
		echo" existe déja ";
	}else {
		echo"";
	}
}


?>