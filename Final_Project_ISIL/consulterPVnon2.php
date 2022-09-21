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

<?php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");  
 $sql = "SELECT * FROM ProcesVerbal where sanctionner='0' ORDER BY date ";  
 $result = mysql_query( $sql);  
 ?> 
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>               
                     <td  width="7%"> <font size="+2"><b><a>   Date       <a><b></font> </td>  
                     <td  width="7%"> <font size="+2"><b><a>   Heure      <a><b></font></td>
					 <td  width="10%"> <font size="+1"><b><a>  Numéro PC  <a><b></font></td>
					 <td  width="7%"> <font size="+2"><b><a>   Nom        <a><b></font></td> 
					 <td  width="10%"> <font size="+1"><b><a>  Prénom     <a><b></font> </td>
                     <td  width="30%"> <font size="+2"><b><a>  Infractions<a><b></font> </td>
                </tr> 
<?php				    
 if(mysql_num_rows($result) > 0)  
 {  
      while($row = mysql_fetch_array($result))  
      {  
$query2="SELECT * FROM `PermisConduire` where numPermis='".$row["numPermis"]."'";
$result2=mysql_query($query2);
$row2=mysql_fetch_array($result2);
//RelPVInf
$query3="SELECT * FROM `RelPVInf` where idPV='".$row['idPV']."'";
$result3=mysql_query($query3);
$numrow3=mysql_num_rows($result3);
		   ?>
		   
                <tr class="w3-hover-opacity">     
                    <td class="date w3-center" data-id1="<?php echo $row["idPV"];?>" ><b><?php echo $row["date"];?></b></td>
                     <td class="heure w3-center" data-id2="<?php echo $row["idPV"];?>" ><b><?php echo $row["heure"];?></b></td>
					 <td class="numPermis w3-center" data-id3="<?php echo $row["idPV"];?>" ><b><?php echo $row["numPermis"];?></b></td>
					 <td class="nom w3-center" data-id4="<?php echo $row["idPV"];?>" ><b><?php echo $row2["nom"];?></b></td>
					 <td class="prenom w3-center" data-id5="<?php echo $row["idPV"];?>" ><b><?php echo $row2["prenom"];?></b></td>
					 <td class="natureInfraction w3-center" data-id6="<?php echo $row["idPV"];?>" ><b>
					 <?php
					 if($numrow3>0){ 
					 while($row3=mysql_fetch_assoc($result3)){
					 //Infractions
					 $query4="SELECT * FROM `Infractions` where inf='".$row3['inf']."'";
					 $result4=mysql_query($query4);
					 $row4=mysql_fetch_assoc($result4);
					 echo "".$row4["nomType"].": ".$row4["natureInfraction"]."<br/>";
					 }}
					 ?></b>
					 </td> 
                </tr>  
<?php
      }  
 }  
 else  {
 ?>
 <tr><td colspan="6">y a pas de PV</td></tr>
 <?php 
 }
 ?>

