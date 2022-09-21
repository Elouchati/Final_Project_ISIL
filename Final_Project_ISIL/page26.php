<?php
// Start the session
session_start();
mysql_connect("localhost", "root", ""	);
mysql_select_db("AppRetraitPermisConduire");
mysql_query("SET NAMES utf8");
 ?>  
      <div class="table-responsive">  
           <table border="1">  
              <tr>                 
                    		    <th  width="7%">  &nbsp;&nbsp;<a><b><font size="+1">Date  </font></b></a></th>  
                    		    <th  width="5%">  &nbsp;&nbsp;<a><b><font size="+1">Heure  </font></b></a></th>
					            <th  width="10%"> &nbsp;&nbsp; <a><b><font size="+1">Numéro PC  </font></b></a></th>
					            <th  width="5%">  <a><b><font size="+1">Nom  </font></b></a></th> 
					            <th  width="10%">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><b><font size="+1">Prénom  </font></b></a></th>
                     		    <th  width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                <a><b><font size="+1">Infractions  </font></b></a></th>
					            <th  width="5%"> <a><b><font size="+1">période(jour) </font></b></a></th>
					            <th  width="5%"> <a><b><font size="+1">dateFin  </font></b></a></th>
                     		    <th  width="1%">  </th>
    </tr> 
<?php
$sql = "SELECT * FROM ProcesVerbal where sanctionner ='-1'";  
$result = mysql_query( $sql);
if(mysql_num_rows($result) > 0){ 			    
while($row = mysql_fetch_array($result)){
$query3="SELECT * FROM `PermisConduire` where numPermis='".$row['numPermis']."'";
$result3=mysql_query($query3);
$row3=mysql_fetch_array($result3);


?>  
                     <tr class="w3-hover-opacity">    
                     <td > <font size="+1"><?php echo $row["date"];?></font></td>
                     <td > <font size="+1"><?php echo $row["heure"];?></font></td>
					 <td ><font size="+1"> <?php echo $row3["numPermis"];?></font></td>
					 <td > <font size="+1"><?php echo $row3["nom"];?></font></td>
					 <td > <font size="+1"><?php echo $row3["prenom"];?></font></td>
					 <td>
<?php
$query7 = "SELECT * FROM `Sanction` WHERE idPV ='".$row["idPV"]."'";
$result7=mysql_query($query7);
$row7=mysql_fetch_array($result7);
$query4="SELECT * FROM `RelPVInf` where idPV='".$row['idPV']."'";
$result4=mysql_query($query4);
while($row4=mysql_fetch_array($result4)){
$query5="SELECT * FROM `Infractions` where inf='".$row4['inf']."'";
$result5=mysql_query($query5);
$row5=mysql_fetch_array($result5);
echo "<font size=+1>".$row5["nomType"].": ".$row5["id"]."- ".$row5["natureInfraction"]."</font><br/>";}
?>  
                </td>
				<td class="w3-center"> <?php echo $row7["periode"];?></td>       
                <td class="w3-center"><b> <?php echo $row7["dateFin"];?></b></td> 
				<td>
                <button type="button" name="delete_btn" data-id1="<?php echo $row["idPV"];?>"class="btn btn-xs btn-danger btn_delete w3-center w3-green w3-text-black txt1">
                <font size="+1" color="green" style="font-weight:bold">
                +
                </font>
                </button></td>
                </tr> 
                 
         
<?php
} }
else  {echo '<tr><td colspan="15"> il n&#8217;existe aucun permis de conduire sanctioné pour faire un recours !! </td></tr>';} 
 ?>