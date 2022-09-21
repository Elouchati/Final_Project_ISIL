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

	 $idSanction=$_POST['idSanction'];
	 $text= $_POST['text']; 
 	 $column= $_POST['column']; 
     $sql = "UPDATE `Sanction` SET ".$column."='".$text."' WHERE idSanction='".$idSanction."'";
	 
//test1
if($column=="periode"){
$query = "SELECT * FROM Sanction WHERE idSanction='".$idSanction."'";
$result=mysql_query($query);
$row = mysql_fetch_array($result);

$query3 = "SELECT * FROM ProcesVerbal WHERE idPV='".$row['idPV']."'"; 
$result3=mysql_query($query3);
$row3= mysql_fetch_array($result3);
if($row3['sanctionner']=='5'){$query2 = "UPDATE `ProcesVerbal` SET sanctionner ='3' WHERE idPV='".$row['idPV']."'"; 
mysql_query($query2);}
else if ($row3['sanctionner']=='1'){$query2 = "UPDATE `ProcesVerbal` SET sanctionner ='-1' WHERE idPV='".$row['idPV']."'"; 
mysql_query($query2);}
mysql_query($sql);
echo 'Sanction faite avec succée ! ';
}
//test2

else{mysql_query($sql);
echo 'Sanction faite avec succée ! ';}

 ?>