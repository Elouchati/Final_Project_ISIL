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
 ?>  
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>                 
					 <th width="5%">  <font size="+1"><b><a>Numéro_PC </a></b></font></th>
					 <th width="7%">  <font size="+1"><b><a>Nom </a></b></font></th> 
					 <th width="10%"> 	<font size="+1"><b><a> Prénom </a></b></font></th>
                     <th width="40%"> 
                    
                     <font size="+1"> 
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a>Infractions </a></b></font></th>
					 <th width="10%"> <font size="+1"><b><a>Sanction </a></b></font></th>
					 <th width="17%"> <font size="+1"><b><a>Date du recours</a></b></font></th>
					 <th width="11%"> 
                     
                     <font size="+1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a>Justification </a></b></font></th>
                     <th> </th>
                     <th> </th>
                </tr> 
<?php
$sql6 = "SELECT * FROM ProcesVerbal where sanctionner='2'";  
$result6 = mysql_query( $sql6); 
if(mysql_num_rows($result6) > 0){		
$sql1 = "SELECT * FROM Recours ";  
$result1 = mysql_query( $sql1); 		    
while($row1 = mysql_fetch_array($result1)){
$sql2 = "SELECT * FROM Sanction where idSanction ='".$row1["idSanction"]."'";  
$result2 = mysql_query( $sql2); 			    
$row2 = mysql_fetch_array($result2);
$sql3 = "SELECT * FROM ProcesVerbal where idPV ='".$row2["idPV"]."' and sanctionner='2'";  
$result3 = mysql_query( $sql3); 			    
$row3 = mysql_fetch_array($result3);
$query4="SELECT * FROM `PermisConduire` where numPermis='".$row3['numPermis']."'";
$result4=mysql_query($query4);
$row4=mysql_fetch_array($result4);


?>  
                     <tr class="w3-hover-opacity">    
					 <td class="w3-center"><b> <?php echo $row3["numPermis"];?></b></td>
					 <td class="w3-center"> <?php echo $row4["nom"];?></td>
					 <td class="w3-center"> <?php echo $row4["prenom"];?></td>
					 <td>
<?php
$query55="SELECT * FROM `RelPVInf` where idPV='".$row3['idPV']."'";
$result55=mysql_query($query55);
while($row55=mysql_fetch_array($result55)){
$query5="SELECT * FROM `Infractions` where inf='".$row55['inf']."'";
$result5=mysql_query($query5);
$row5=mysql_fetch_array($result5);
echo "<b>".$row5["nomType"].": ".$row5["id"]."- ".$row5["natureInfraction"]."</b><br/>";}
?>  
                </td>
				<td>
<?php
echo "<p> Periode: ".$row2["periode"]." </p>";
echo "<p> Date de fin: ".$row2["dateFin"]." </p>";
?>  
                </td>
				<td class="w3-center"> <?php echo $row1["dateRecours"];?></td>       
                <td class="w3-center"> <b><?php echo $row1["justification"];?></b></td> 
				<td><button type="button" name="delete_btn" data-id1="<?php echo $row3["idPV"];?>"class="btn btn-xs btn-danger btn_delete w3-center w3-green w3-text-black txt1">Refuser</button></td>
				<td><button type="button" name="delete_btn" data-id2="<?php echo $row3["idPV"];?>"class="btn btn-xs btn-danger btn_delete2 w3-center w3-green w3-text-black txt1">Accepter</button></td>
                </tr>  
         
<?php
}} 
else  {echo '<tr><td colspan="9">Y a aucun recours !! </td></tr>';}
 ?>