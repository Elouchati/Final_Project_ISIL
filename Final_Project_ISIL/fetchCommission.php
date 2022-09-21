
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
//fetch.php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
if(isset($_POST["query"]))
{
 $search = mysql_real_escape_string( $_POST["query"]);
 $query = "
  SELECT * FROM Commission
  WHERE dateCommission LIKE '".$search."%' ORDER BY dateCommission limit 5 ";
 
}

else
{
 $query = " SELECT * FROM Commission ORDER BY dateCommission limit 3 ";
}
$result = mysql_query($query);

if(mysql_num_rows($result) > 0)
{
		
  ?>  
      <div class="table-responsive">  
           <table class="table table-bordered ">  
                <tr>  
				     <th class="w3-text-white" width="10%"><font size="+1">	
                     &nbsp;&nbsp;
                     <a><b> Date</b></a></font> </th>
					 <th class="w3-text-white" width="10%"><font size="+1">
                     &nbsp;&nbsp;
                     <a><b>  Heure  </b></a></font></th>  
                     <th class="w3-text-white" width="10%">  
                     &nbsp;&nbsp; &nbsp;&nbsp;<font size="+1">
                   
                     <a><b>  Lieu   </b></a></font></th>
					 <th class="w3-text-white" width="20%"><font size="+1">
                     <a><b>  Les procés verbaux </b></a></font></th>  
                </tr>
	<?php

	
 while($row = mysql_fetch_array($result))
 {
?>
   <tr>
    <td ><?php echo $row["dateCommission"];?></td>
    <td ><?php echo $row["heureCommission"];?></td>
	<td ><?php echo $row["lieuCommission"];?></td>
    <td  align="left">
					 <?php
$query2="SELECT * FROM `Sanction` where idCommission='".$row["idCommission"]."'";
$result2=mysql_query($query2);
$a=1;
while($row2=mysql_fetch_array($result2)){
$query3="SELECT * FROM `ProcesVerbal` where idPV='".$row2['idPV']."'";
$result3=mysql_query($query3);
$row3=mysql_fetch_array($result3);
$query4="SELECT * FROM `PermisConduire` where numPermis='".$row3['numPermis']."'";
$result4=mysql_query($query4);
$row4=mysql_fetch_array($result4);
					 echo "<p>   ".$a."- <b>".$row4["nom"]."</b> ".$row4["prenom"]."</p>";
					 $a=$a+1;}
					 
					 ?>
					 </td> 
   </tr>
  <?php
 }
}
else 
{
 echo '<p>Cette commission ou ce conducteur n&#8217;existe pas dans le systéme !! </p>';
}

?>