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


mysql_connect("localhost", "root", ""   );
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
$idCommission=$_SESSION['idCommission'];
$sql = "SELECT * FROM Sanction where idCommission ='$idCommission'";  
$result = mysql_query( $sql); 
 ?>  
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>                 
                     <td  width="7%">  <a><b><font size="+2" > Date</font></b></a> </td>  
                     <td  width="5%">  <a><b><font size="+2" > Heure</font></b></a> </td>
                     <td  width="7%">  <a><b><font size="+2" > Numéro PC</font></b></a> </td>
                     <td  width="5%">  <a><b><font size="+2" > Nom</font></b></a> </td> 
                     <td  width="15%">  <a><b><font size="+2" >Prénom </font></b></a></td>
                     <td  width="40%"> <a><b><font size="+2" > Infractions</font></b></a> </td>
                     <td  width="5%"> <a><b><font size="+2" > Amende</font></b></a> </td>
                     <td  width="5%"> <a><b><font size="+2" > payement </font></b></a></td>
                     <td  width="7%"> <a><b><font size="+2" > dateFin</font></b></a> </td>
                     <td  width="5%"> <a><b><font size="+2" >  période(jour)</font></b></a></td>
                </tr> 
<?php               
while($row = mysql_fetch_array($result)){
$query2="SELECT * FROM `ProcesVerbal` where idPV='".$row["idPV"]."'";
$result2=mysql_query($query2);
while($row2=mysql_fetch_array($result2)){ 
$query3="SELECT * FROM `PermisConduire` where numPermis='".$row2['numPermis']."'";
$result3=mysql_query($query3);
$row3=mysql_fetch_array($result3);


?>  

                     <tr class="w3-hover-opacity">    
                     <td class="date w3-center" data-id1=" <?php echo $row["idSanction"];?>" ><font size="+1"> <?php echo $row2["date"];?></font></td>
                     <td class="heure w3-center" data-id2=" <?php echo $row["idSanction"];?>" > <font size="+1"><?php echo $row2["heure"];?></font></td>
                     <td class="numPermis w3-center" data-id3=" <?php echo $row["idSanction"];?>" ><font size="+1"> <?php echo $row3["numPermis"];?></font></td>
                     <td class="nom w3-center" data-id4=" <?php echo $row["idSanction"];?>" ><font size="+1"> <b><?php echo $row3["nom"];?></b></font></td>
                     <td class="prenom w3-center" data-id5=" <?php echo $row["idSanction"];?>" > <font size="+1"><?php echo $row3["prenom"];?></font></td>
                     <td class="infraction " data-id6=" <?php echo $row["idSanction"];?>" ><font size="+1">
<?php
$dd=$row2["date"];                       
$dd_s = strtotime($dd);
$period_s= 24*3600*$row["periode"]+$dd_s ; 
$period = date('Y-m-d' ,$period_s);// période exacte 
 $ok=$row["payement"];
 
if(($row["periode"]>0)&&($dd!=$period)) {

$query7 = "UPDATE `Sanction` SET dateFin='$period' WHERE idSanction ='".$row["idSanction"]."'";
$result7=mysql_query($query7);
$ok='OUI';
$query77 = "UPDATE `Sanction` SET payement='$ok' WHERE idSanction ='".$row["idSanction"]."'";
$result77=mysql_query($query77);
} 
else {$period='--';
	 $ok='NON';	
$query77 = "UPDATE `Sanction` SET payement='$ok' WHERE idSanction ='".$row["idSanction"]."'";
$result77=mysql_query($query77);
}

$query4="SELECT * FROM `RelPVInf` where idPV='".$row2['idPV']."'";
$result4=mysql_query($query4);
while($row4=mysql_fetch_array($result4)){
$query5="SELECT * FROM `Infractions` where inf='".$row4['inf']."'";
$result5=mysql_query($query5);
$row5=mysql_fetch_array($result5);
echo "".$row5["nomType"].": ".$row5["id"]."- ".$row5["natureInfraction"]."<br/>";}
?>  </font>
                </td>
                <td class="payement w3-center" data-id77=" <?php echo $row["idSanction"];?>" ><font size="+1"> <?php echo $row2["amende"];?> DA</font></td>       
                <td class="payement w3-center" data-id7=" <?php echo $row["idSanction"];?>" ><font size="+1"> <?php echo $ok;?></font></td>
                <td class="dateFin w3-center" data-id8=" <?php echo $row["idSanction"];?>"><font size="+1"> <?php echo $period;?></font></td>
                <td class="periode w3-center" data-id9=" <?php echo $row["idSanction"];?>" contenteditable><font size="+1"> <?php echo $row["periode"];?></font></td> 
                 </tr>  
         
<?php

  
 } } 

 ?>
