<?php
// Start the session
session_start();
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
 $idPV=$_SESSION['idPV'];
 $query="INSERT INTO RelPVInf(idPV, inf) VALUES('$idPV','".$_POST["inf"]."')";
 if(mysql_query($query))  
 {  
      echo 'Infraction ajouter dans ce PV avec succé . ';  
 }  

 ?>