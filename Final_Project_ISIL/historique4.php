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
 mysql_query("SET NAMES utf8");
$idPC=$_SESSION['idPC'];
$sql = "SELECT * FROM permisconduire where idPC ='$idPC'";  
$result = mysql_query( $sql); 
$row = mysql_fetch_array($result);
$sql1 = "SELECT * FROM ProcesVerbal where numPermis ='".$row["numPermis"]."'";  
$result1 = mysql_query( $sql1); 
if(mysql_num_rows($result1)>0){
 ?>  
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>                   
                     <td  width="7%">  <a><b><font size="+2" > Date proces verbal</font></b></a> </td>  
					 <td  width="7%">  <a><b><font size="+2" > Wilaya </font></b></a> </td>  
					 <td  width="7%">  <a><b><font size="+2" > Type vehicule</font></b></a> </td>  
					 <td  width="7%">  <a><b><font size="+2" > Matricule</font></b></a> </td>  
                     <td  width="40%"> <a><b><font size="+2" > Infractions</font></b></a> </td>
					 <td  width="40%"> <a><b><font size="+2" > Commission</font></b></a> </td>
                     <td  width="5%"> <a><b><font size="+2" > Amende</font></b></a> </td>
					 <td  width="5%"> <a><b><font size="+2" >  periode(jour)</font></b></a></td>
                     <td  width="7%"> <a><b><font size="+2" > dateFin</font></b></a> </td>
                     
                </tr> 
<?php 
              
while($row1 = mysql_fetch_array($result1)){
$query2="SELECT * FROM `RelPVInf` where idPV='".$row1["idPV"]."'";
$result2=mysql_query($query2);
$row2=mysql_fetch_array($result2);

$query4="SELECT * FROM `Sanction` where idPV='".$row2["idPV"]."'";
$result4=mysql_query($query4);
$row4 = mysql_fetch_array($result4);
if($row4=!'NULL'){
$periode=$row4["periode"];
$dateFin=$row4["dateFin"];
}
else{ 
$periode="---"; $dateFin="---";}
?>  

                     <tr>    
                     <td><font size="+1"> <?php echo $row1["date"];?></font></td>
                     <td><font size="+1"> <?php echo $row1["wilaya"];?></font></td>
                     <td><font size="+1"> <?php echo $row1["typeVehicule"];?></font></td>
                     <td><font size="+1"> <?php echo $row1["matricule"];?></font></td>
                     <td><font size="+1">
<?php
if(mysql_num_rows($result2)>0){
while($row2=mysql_fetch_array($result2)){ 
$query3="SELECT * FROM `Infractions` where inf='".$row2['inf']."'";
$result3=mysql_query($query3);
$row3=mysql_fetch_array($result3);
echo "".$row3["nomType"].": ".$row3["id"]."- ".$row3["natureInfraction"]."<br/>";}}
else{echo "---";}
?>  </font></td>
				<td><font size="+1">
<?php
if($row4=!'NULL'){
$query5="SELECT * FROM `Commission` where idCommission='".$row4["idCommission"]."'";
$result5=mysql_query($query5);
$row5 = mysql_fetch_array($result5);
echo "".$row5["dateCommission"]."/ ".$row5["lieuCommission"]."<br/>";}
else{echo "---";}
?>  </font>
                </td>
                <td><font size="+1"> <?php echo $row1["amende"];?> DA</font></td>        
                <td><font size="+1"> <?php echo $periode ;?></font></td>
                <td><font size="+1"> <?php echo $dateFin ;?></font></td>
                 </tr>  
         
<?php

  
 } }
 else{echo '<p><font color="#E91115"><a>Aucune historique .</a></font></p>';}

 ?>
