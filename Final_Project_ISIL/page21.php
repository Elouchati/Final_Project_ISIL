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
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
 $a= date("F j, Y g:i a");                         
$ds = strtotime($a);
 $sql = "SELECT * FROM Commission ORDER BY dateCommission ";  
 $result = mysql_query( $sql);  
 ?>  
      <div class="table-responsive">  
           <table class="table table-bordered " border="1 ">  
                <tr>  
				     <th width="10%"> <a><b><font size="+2">Date</font></b></a> </th>
					 <th width="10%"> <a><b><font size="+2">Heure </font></b></a> </th>  
                     <th width="10%"> <a><b><font size="+2">Lieu   </font></b></a></th>
                     <th width="50%">
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       				  <a><b><font size="+2">Procés verbaux </font></b></a></th> 
                     <th  width="10%"> </th>  
                </tr>
	<?php			    
 if(mysql_num_rows($result) > 0)  
 {    
      while($row = mysql_fetch_array($result))  
      {  
$dateCommission_S= strtotime($row["dateCommission"]);
if ($ds<= $dateCommission_S){
         ?>  
                <tr class="w3-hover-opacity">  
				     <td class="dateCommission w3-center" data-id2=" <?php echo $row["idCommission"];?>" > <b><?php echo $row["dateCommission"];?></b></td>
					 <td class="heureCommission w3-center" data-id3=" <?php echo $row["idCommission"];?>" > <?php echo $row["heureCommission"];?></td>  
                     <td class="lieuCommission w3-center" data-id1=" <?php echo $row["idCommission"];?>" > <?php echo $row["lieuCommission"];?></td>
                     	 
					 <td class="PC " data-id4=" <?php echo $row["idCommission"];?>" >
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
					 echo "<p>- ".$row4["numPermis"]."/<b>".$row4["nom"]."</b>: ".$row4["prenom"]."</p>";}
					 
					 ?>
					 </td> 
                <td>
                
			<button type="button" name="delete_btn" data-id4="<?php echo $row["idCommission"];?>"class="btn btn-xs btn-danger btn_delete w3-center w3-green w3-text-black txt1">
			<font style="font-weight:bold" size="+1" color="green">
            	+
             </font>   
			</button>
                	</td> 
                </tr>  
         
<?php
      }  
 } } 
 else  {
 ?>
 <tr><td colspan="4">Aucunne comission à afficher !! </td></tr>
 <?php 
 }
 ?>
