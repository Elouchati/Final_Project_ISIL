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
 $sql = "SELECT * FROM ProcesVerbal ORDER BY date ";  
 $result = mysql_query( $sql);  
 ?> 
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>               
                     <td class="w3-center txt1 w3-text-black" width="10%"><font size="+3" ><b><a> Date </a></b></font></td>  
                     <td class="w3-center txt1 w3-text-black" width="5%"><font size="+2" ><b><a>  Heure </a></b></font></td>  
					 <td class="w3-center txt1 w3-text-black" width="10%"><font size="+2" ><b><a> Numéro PC </a></b></font></td>  
					 <td class="w3-center txt1 w3-text-black" width="10%"><font size="+3" ><b><a> Nom </a></b></font></td>   
					 <td class="w3-center txt1 w3-text-black" width="10%"><font size="+2" ><b><a> Prénom </a></b></font></td>  
                     <td class="w3-center txt1 w3-text-black" width="50%"><font size="+3" ><b><a> Infractions </a></b></font></td>  
                     <td class="w3-center txt1 w3-text-black" width="2%"> </td>
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
                     <td class="date w3-center" data-id1="<?php echo $row["idPV"];?>" ><font size="+1" ><b><?php echo $row["date"];?></b></font></td>
                     <td class="heure w3-center" data-id2="<?php echo $row["idPV"];?>" ><font size="+1" ><b><?php echo $row["heure"];?></b></font></td>
					<td class="numPermis w3-center" data-id3="<?php echo $row["idPV"];?>" ><font size="+1" ><b><?php echo $row["numPermis"];?></b></font></td>
					 <td class="nom w3-center" data-id4="<?php echo $row["idPV"];?>" ><font size="+1" ><b><?php echo $row2["nom"];?></b></font></td>
					 <td class="prenom w3-center" data-id5="<?php echo $row["idPV"];?>" ><font size="+1" ><b><?php echo $row2["prenom"];?></b></font></td>
					 <td class="natureInfraction w3-center" data-id6="<?php echo $row["idPV"];?>" ><font size="+1" ><b>
					 <?php
					 if($numrow3>0){ 
					 while($row3=mysql_fetch_assoc($result3)){
					 //Infractions
					 $query4="SELECT * FROM `Infractions` where inf='".$row3['inf']."'";
					 $result4=mysql_query($query4);
					 $row4=mysql_fetch_assoc($result4);
					 echo " ".$row4["nomType"].": ".$row4["natureInfraction"]." <br/>";
					 }}
					 ?>
					</b></font></td>
       <td><button type="button" name="delete_btn" data-id7="<?php echo $row["idPV"];?>"class="btn btn-xs btn-danger btn_delete w3-center w3-red w3-text-black txt1"><font color="#E91115">X</font></button></td>
                </tr>  
<?php
      }  
 }  
 else  {
 ?>
 <tr><td colspan="7">Aucun procés n'est trouvé dans le systéme .</td></tr>
 <?php 
 }
 ?>

