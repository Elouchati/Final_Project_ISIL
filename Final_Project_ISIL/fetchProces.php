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
//fetch.php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
if(isset($_POST["query"]))
{
 $search = mysql_real_escape_string( $_POST["query"]);
 $query = "
  SELECT * FROM ProcesVerbal
  WHERE date LIKE '".$search."%' ORDER BY date limit 5 ";
 
}
else
{
 $query = " SELECT * FROM ProcesVerbal ORDER BY date limit 5 ";
}
$result = mysql_query($query);

if(mysql_num_rows($result) > 0)
{
  ?> 
      
  
  <div class="table-responsive">
   <table class="table table bordered"id="gr" >
    <tr>
     <th  width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="+2"><a>Date de transgression</a></font></th>
     <th  width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="+2"><a>Heure</a></font></th>
	 <th  width="10%">&nbsp;&nbsp;<font size="+2"><a>Numéro PC</a></font></th>
     <th  width="15%">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <font size="+2"><a>Nom</a></font></th>
     <th  width="15%">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <font size="+2"><a>Prénom</a></font></th>
	 <th  width="40%" align="right"><font size="+2">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <a>Infractions commis</font></a></th>
    </tr>
	<?php
 while($row = mysql_fetch_array($result))
 {
 //PC
$query2="SELECT * FROM `PermisConduire` where numPermis='".$row["numPermis"]."'";
$result2=mysql_query($query2);
$row2=mysql_fetch_array($result2);
 //PV
$query3="SELECT * FROM `RelPVInf` where idPV='".$row['idPV']."'";
$result3=mysql_query($query3);
$numrow3=mysql_num_rows($result3);
?>
   <tr>
    <td  ><?php echo $row["date"];?></td>
    <td ><?php echo $row["heure"];?></td>
	<td ><?php echo $row["numPermis"];?></td>
    <td><?php echo $row2["nom"];?></td>
    <td ><?php echo $row2["prenom"];?></td>
	<td  align="right"><font size="+1">
	<?php
	 if($numrow3>0){ 
	 while($row3=mysql_fetch_assoc($result3)){
	//Infractions
	$query4="SELECT * FROM `Infractions` where inf='".$row3['inf']."'";
    $result4=mysql_query($query4);
    $row4=mysql_fetch_array($result4);
	echo "".$row4["nomType"].": ".$row4["natureInfraction"]."<br/>";
					 }}
	?>
	</font></td>
   </tr>
  <?php
 }
}
else 
{
 echo '<p><b>Ce PV n&#8217;exicte pas dans notre systéme, il faut d&#8217;abord l&#8217;ajouter .</b></p>';
}

?>
