<?php
//fetch.php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
 
 
 $query="SELECT * FROM `ProcesVerbal` WHERE idPV = '".$_POST["idPV"]."'";
 $result=mysql_query($query);
 $row=mysql_fetch_assoc($result);
 $query1="SELECT * FROM `PermisConduire` where numPermis='".$row['numPermis']."'";
 $result1=mysql_query($query1);
 $row1=mysql_fetch_assoc($result1);
 if($row1['nbPV']>0){
 $nbPV=$row1['nbPV']-1;
 $query2="UPDATE `PermisConduire` SET `nbPV`='$nbPV' WHERE `numPermis`='".$row['numPermis']."'";
 $result2=mysql_query($query2);}
 $query3 = "DELETE FROM RelPVInf WHERE idPV ='".$_POST["idPV"]."'";
 $result3=mysql_query($query3);
 $sql = "DELETE FROM ProcesVerbal WHERE idPV = '".$_POST["idPV"]."'"; 
 if(mysql_query($sql))  
 {  
      echo 'Procés verbal supprimé avec succé ! ';  
 }  

 ?>
 