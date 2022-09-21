<?php
//fetch.php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
  
 $query="DELETE FROM `Commission` WHERE idCommission = '".$_POST["idCommission"]."'";
 $result=mysql_query($query);
 $query3 = "DELETE FROM `Sanction` WHERE idCommission = '".$_POST["idCommission"]."'";
 $result3=mysql_query($query3);
 if(( $result)&& ( $result3)){  
      echo 'Data Deleted'; }  
	  

 ?>