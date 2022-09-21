<?php
// Start the session
session_start();
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
 
 $idCommission=$_SESSION['idCommission'];
 $query1="SELECT * FROM `Sanction` where idCommission='$idCommission'";
 $result1=mysql_query($query1);
 $numrows=mysql_num_rows($result1);
 $row = mysql_fetch_array($result1);
 
 
 $query2="SELECT * FROM `ProcesVerbal` where idPV='".$_POST["idPV"]."'";
 $result2=mysql_query($query2);
 $row2 = mysql_fetch_array($result2);
 if($row2["sanctionner"]=='0'){$sanctionner=1;$idCommission=$idCommission;$idRecours='';}
 else{$sanctionner=5;
 $query3="SELECT * FROM `Recours` where idSanction='".$row["idSanction"]."'";
 $result3=mysql_query($query3);
 $row3= mysql_fetch_array($result3);
 $idCommission='';$idRecours=$row3["idRecours"];}
 $sql = "UPDATE `ProcesVerbal` SET sanctionner='$sanctionner' WHERE idPV='".$_POST["idPV"]."'"; 
 mysql_query($sql);
 $query="INSERT INTO Sanction(idPV, idCommission, idRecours, periode, dateFin, payement) VALUES('".$_POST["idPV"]."', '$idCommission', '$idRecours', '', '', '')";
 $result=mysql_query($query);
 if(mysql_query($query))echo 'Ajouté avec succé'; 
 
 else{echo 'La commission est plainne ';}
 ?>