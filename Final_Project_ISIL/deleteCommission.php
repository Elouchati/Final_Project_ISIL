<?php
// Start the session
session_start();
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
 $idCommission=$_SESSION['idCommission'];
 $query="SELECT * FROM `Sanction` WHERE idCommission = '$idCommission'";
 $result=mysql_query($query);
 $row=mysql_fetch_assoc($result);
 $query1="SELECT * FROM `ProcesVerbal` where idPV='".$row['idPV']."'";
 $result1=mysql_query($query1);
 $row1=mysql_fetch_assoc($result1);
 if($row1['sanctionner']!=0){
 $query2="UPDATE `ProcesVerbal` SET `sanctionner`='0' WHERE `idPV`='".$row['idPV']."'";
 $result2=mysql_query($query2);}
 $query3 = "DELETE FROM Sanction WHERE idCommission ='$idCommission'";
 $result3=mysql_query($query3);
 $sql = "DELETE FROM Commission WHERE idCommission = '$idCommission'"; 
 if(mysql_query($sql))  
 {  
      header('Location:Commission.php');
 }  

 ?>
 