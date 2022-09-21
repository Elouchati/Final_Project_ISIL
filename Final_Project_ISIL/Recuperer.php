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
 
 $query="SELECT * FROM `PermisConduire` WHERE idPC = '".$_POST["idPC"]."'";
 $result=mysql_query($query);
 $row=mysql_fetch_assoc($result);
$query1="SELECT * FROM `ProcesVerbal` WHERE numPermis = '".$row["numPermis"]."'";
 $result1=mysql_query($query1);
 $row1=mysql_fetch_assoc($result1);
$sql = "UPDATE `ProcesVerbal` SET sanctionner='6' WHERE numPermis='".$row["numPermis"]."'";
$result2=mysql_query($sql);
 ?>