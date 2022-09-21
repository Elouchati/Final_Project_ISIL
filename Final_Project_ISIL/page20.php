<?php
// Start the session
session_start();
require("auth.php");
if (Auth::isLogged()){ 
}
else { 
header('Location:index.php#connecter');
}
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8"); 
 $sql = "SELECT * FROM Commission ORDER BY dateCommission ";  
 $result = mysql_query( $sql);  
 ?>  
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>  
				     <td class="w3-center txt1 w3-text-black" width="10%"><font size="+1"><b><a> Date</a></b></font> </td>
					 <td class="w3-center txt1 w3-text-black" width="15%"><font size="+1"><b><a> Heure </a></b></font> </td>  
                     <td class="w3-center txt1 w3-text-black" width="15%"> <font size="+1"><b><a>Lieu  </a></b></font> </td>
					 <td class="w3-center txt1 w3-text-black" width="40%"> <font size="+1"><b><a>Les procés verbaux</a></b></font> </td>  
                </tr>
	<?php			    
 if(mysql_num_rows($result) > 0)  
 {  
      while($row = mysql_fetch_array($result))  
      {  
	  $a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$dateCommission=$row["dateCommission"];
$dateCommission_S= strtotime($row["dateCommission"]);
if($ds<=$dateCommission_S){
         ?>  
                <tr class="w3-hover-opacity">  
				     <td class="dateCommission w3-center" data-id2=" <?php echo $row["idCommission"];?>"> <?php echo $row["dateCommission"];?></td>
					 <td class="heureCommission w3-center" data-id3=" <?php echo $row["idCommission"];?>"> <?php echo $row["heureCommission"];?></td>  
                     <td class="lieuCommission w3-center" data-id1=" <?php echo $row["idCommission"];?>"> <?php echo $row["lieuCommission"];?></td>
                     	 
					 <td align="left" class="PC " data-id4="  <?php echo $row["idCommission"];?>">
					 <?php
$query2="SELECT * FROM `Sanction` where idCommission='".$row["idCommission"]."'";
$result2=mysql_query($query2);
 $i=1;
while($row2=mysql_fetch_array($result2)){
$query3="SELECT * FROM `ProcesVerbal` where idPV='".$row2['idPV']."'";
$result3=mysql_query($query3);
$row3=mysql_fetch_array($result3);
$query4="SELECT * FROM `PermisConduire` where numPermis='".$row3['numPermis']."'";
$result4=mysql_query($query4);
$row4=mysql_fetch_array($result4);
					 echo $i ;echo "-"."--<b>".$row4["nom"]."</b> ".$row4["prenom"]." <b>Permis n°</b>".$row4["numPermis"]."<br/>"; $i=$i+1;}
					
					 ?>
					 </td> 
                 
                </tr>  
         
<?php
      }  
 } }
 else  {
 ?>
 <tr><td colspan="5">Il n'y a aucune commission dans le systéme pour l'afficher !! </td></tr>
 </table>
 </div>
 <?php 
 }
 ?>
