<?php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");  
 $sql = "SELECT * FROM ProcesVerbal where sanctionner = '0' or sanctionner = '4' ORDER BY date "; 
 $result = mysql_query( $sql);  
 ?> 
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>               
                     <th class="w3-center txt1 w3-text-black" width="15%"><a><font size="+1">Date d'infraction</font></a></th>  
                     <th class="w3-center txt1 w3-text-black" width="10%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
                     <a><font size="+1">Heure </font></a></th>
					 <th class="w3-center txt1 w3-text-black" width="10%"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><font size="+1">Numéro PC</font></a> </th>
					 <th class="w3-center txt1 w3-text-black" width="10%"> 
                     														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <a><font size="+1">Nom</font></a> </th> 
					 <th class="w3-center txt1 w3-text-black" width="10%">
                     														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <a><font size="+1">Prénom</font></a> </th>
                     <th class="w3-center txt1 w3-text-black" width="50%">
                     														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <a><font size="+1"> Infractions</font></a> </th>
                      <th ></th>
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
                     <td class="date w3-center" data-id1="<?php echo $row["idPV"];?>" ><?php echo $row["date"];?></td>
                     <td class="heure w3-center" data-id2="<?php echo $row["idPV"];?>" ><?php echo $row["heure"];?></td>
					 <td class="numPermis w3-center" data-id3="<?php echo $row["idPV"];?>" ><?php echo $row["numPermis"];?></td>
					 <td class="nom w3-center" data-id4="<?php echo $row["idPV"];?>" ><?php echo "<b><font size=+0.5>".$row2["nom"]."</b></font>";?></td>
					 <td class="prenom w3-center" data-id5="<?php echo $row["idPV"];?>" ><?php echo $row2["prenom"];?></td>
					 <td class="natureInfraction w3-center" data-id6="<?php echo $row["idPV"];?>" >
					 <?php
					 if($numrow3>0){ 
					 while($row3=mysql_fetch_assoc($result3)){
					 //Infractions
					 $query4="SELECT * FROM `Infractions` where inf='".$row3['inf']."'";
					 $result4=mysql_query($query4);
					 $row4=mysql_fetch_assoc($result4);
					 echo " ".$row4["nomType"].": ".$row4["natureInfraction"]."<br/>";
					 }}
					 ?>
					 </td> 
       <td><button type="button" name="delete_btn" data-id7="<?php echo $row["idPV"];?>"class="btn btn-xs btn-danger btn_delete w3-center w3-green w3-text-black txt1"><font color=green size="+2" > +</font></button></td>
                </tr>  
<?php
      }  
 }  
 else  {
 ?>
 <tr><td colspan="7">Rien n'est trouvé !! </td></tr>
 <?php 
 }
 ?>

