<?php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
 $sql = "SELECT * FROM Commission ORDER BY dateCommission ";  
 $result = mysql_query( $sql);  
 ?>  
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>  
				     <td class="w3-center txt1 w3-text-black" width="25%"><font size="+1"><b><a> Date</a></b></font> </td>
					 <td class="w3-center txt1 w3-text-black" width="10%"><font size="+1"><b><a> Heure </a></b></font> </td>  
                     <td class="w3-center txt1 w3-text-black" width="10%"><font size="+1"><b><a> Lieu  </a></b> </font></td>
					 <td class="w3-center txt1 w3-text-black" width="55%"> <font size="+1"><b><a>Les procés verbaux </a></b></font></td>  
                     <td>  </td> 
                </tr>
	<?php			    
 if(mysql_num_rows($result) > 0)  
 {  
      while($row = mysql_fetch_array($result))  
      {  
         ?>  
               <tr class="w3-hover-opacity">  
				     <td class="w3-center" data-id2=" <?php echo $row["idCommission"];?>" > <?php echo $row["dateCommission"];?></td>
					 <td class="w3-center" data-id3=" <?php echo $row["idCommission"];?>" > <?php echo $row["heureCommission"];?></td>  
                     <td class="w3-center" data-id1=" <?php echo $row["idCommission"];?>" > <?php echo $row["lieuCommission"];?></td>
                     	 
					 <td data-id4=" <?php echo $row["idCommission"];?>" >
					 <?php
$query2="SELECT * FROM `Sanction` where idCommission='".$row["idCommission"]."'";
$result2=mysql_query($query2);
while($row2=mysql_fetch_array($result2)){
$query3="SELECT * FROM `ProcesVerbal` where idPV='".$row2['idPV']."'";
$result3=mysql_query($query3);
$row3=mysql_fetch_array($result3);
$query4="SELECT * FROM `PermisConduire` where numPermis='".$row3['numPermis']."'";
$result4=mysql_query($query4);
$row4=mysql_fetch_array($result4);
					 echo "<p>- ".$row4["numPermis"].":<b> ".$row4["nom"]."</b> : ".$row4["prenom"]."</p>";}
					 
					 ?>
					 </td> 
                <td><button type="button" name="delete_btn" data-id5="<?php echo $row["idCommission"];?>"class="btn btn-xs btn-danger btn_delete w3-center w3-red w3-text-black txt1"><font color="#E91115"  size="+1"style="font-weight:bold">X</font></button></td> 
              </tr> 
         
<?php
      }  
 } 
 else  {
 ?>
 <tr><td colspan="5">Il n'y a aucune commission dans le systéme pour l'afficher !!  </td></tr>
 </table>
 </div>
 <?php 
 }
 ?>
