<?php
// Start the session
session_start();
require("auth.php");
if (Auth::isLogged()){ 
}
else { 
header('Location:index.php#connecter');
}
mysql_query("SET NAMES cp1256" ); // pour afficher en arabe 
	mysql_query("SET character set cp1256" ); // pour afficher en arabe 
?>
<!-- *** **** ****** ****** ***** ******* ****** ****** ****** * ***** *** **** *** *** * *** * *-->
<?php
// Start the session
session_start();
mysql_connect("localhost", "root", ""	);
mysql_select_db("AppRetraitPermisConduire");
mysql_query("SET NAMES utf8");
$idCommission=$_SESSION['idCommission'];
$query="SELECT * FROM `Sanction` WHERE idCommission = '$idCommission'";
$result=mysql_query($query);
 if(mysql_num_rows($result)>0)  
 {  
      header('Location:page19.php');
 }  
 else{echo'<script  language="javascript">alert (" il faut saisir les PV correspondant")</script>';
 header('Location:page9.php');}

 ?>