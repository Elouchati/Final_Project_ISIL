<?php
// Start the session
session_start();
mysql_connect("localhost", "root", ""	);
mysql_select_db("AppRetraitPermisConduire");
mysql_query("SET NAMES utf8");
$idPV=$_SESSION['idPV'];
$query="SELECT * FROM `RelPVInf` WHERE idPV = '$idPV'";
$result=mysql_query($query);
 if(mysql_num_rows($result)>0)  
 {  
      header('Location:ProcesVerbalResult.php');
 }  
 else{echo'<script  language="javascript">alert (" il faut saisi les infractions correspondant")</script>';
 header('Location:page9.php');}

 ?>