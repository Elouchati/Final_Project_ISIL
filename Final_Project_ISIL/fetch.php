<?php
//fetch.php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysql_real_escape_string( $_POST["query"]);
 $search = trim($search);
 $query = "
  SELECT * FROM permisconduire
  WHERE numPermis LIKE '%".$search."%'
  OR nom LIKE '%".$search."%' 
  OR prenom LIKE '%".$search."%' 
  OR numImpr LIKE '%".$search."%' 
  OR wilaya LIKE '%".$search."%' 
  OR commune  LIKE '%".$search."%' 
  OR adresse LIKE '%".$search."%'
 ";
}
else
{
 $query = " SELECT * FROM permisconduire ORDER BY nom limit 5 ";
}
$result = mysql_query($query);

if(mysql_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Numéro du permis </th>
     <th class="w3-text-white"> &nbsp;&nbsp;&nbsp; 	Nom</th>
     <th class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp; Prénom</th>
     <th class="w3-text-white">&nbsp;&nbsp;&nbsp;Wilaya</th>
	 <th class="w3-text-white"> &nbsp;&nbsp;&nbsp;&nbsp;Commission</th>
	 <th class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Periode</th>
	 <th class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Etat</th>
	 <th class="w3-text-white"></th>
    </tr>
 ';
 while($row = mysql_fetch_array($result))
 {
  $query1 = " SELECT * FROM ProcesVerbal where numPermis='".$row["numPermis"]."' ";
  $result1=mysql_query($query1);
  $row1 = mysql_fetch_array($result1);
  if($row1["sanctionner"]==6){$row11="Recuperer";}
  else if(($row1["sanctionner"]==3)||($row1["sanctionner"]==-1)){$row11="Non recuperer";}
  else{$row11="---";}
  $query2 = " SELECT * FROM Sanction where idPV='".$row1["idPV"]."' ";
  $result2=mysql_query($query2);
  $row2 = mysql_fetch_array($result2);
  if(($row2["periode"]!="")&&($row2["periode"]!="0")){$row22=$row2["periode"];$row222=$row2["dateFin"];}
  else{$row22="---";$row222="---";}
  $a= date("F j, Y g:i a");  
  $a_s=strtotime($a);                       
  $dateFin=$row2["dateFin"];
  $dateFin_s=strtotime($dateFin);
  $query3 = " SELECT * FROM Commission where idCommission='".$row2["idCommission"]."' ";
  $result3=mysql_query($query3);
  $row3 = mysql_fetch_array($result3);
  if((mysql_num_rows($result1)>0)&&(mysql_num_rows($result2)>0)){$row33=$row3["dateCommission"];}
  else{$row33="---";}
  $output .= '
   <tr>
    <td class="w3-text-white">'.$row["numPermis"].'</td>
    <td class="w3-text-white">'.$row["nom"].'</td>
    <td class="w3-text-white">'.$row["prenom"].'</td>
    <td class="w3-text-white">'.$row["wilaya"].'</td>
	<td class="w3-text-white">'.$row33.'</td>
	<td title="'.$row222.'" class="w3-text-white">'.$row22.'</td>
	<td class="w3-text-white">'.$row11.'</td>
	';
 
 if (($dateFin_s<=$a_s)||($row1["sanctionner"]==6)){
 $output .= '
	<td><button  disabled type="button" name="delete_btn" data-id1="'.$row["idPC"].'"class="btn btn-xs btn-danger btn_delete"><font color=green>Récupérer</font></button></td>
   </tr>
  ';}
  else{
 $output .= '
	<td><button  type="button" name="delete_btn" data-id1="'.$row["idPC"].'"class="btn btn-xs btn-danger btn_delete"><font color=green>Récupérer</font></button></td>
   </tr>
  ';}
 }
 echo $output;
}
else
{
 echo '<font color="#E91115"><a class="w3-text-white" >Ce permis de conduire n&#8217;exicte pas dans le systéme .</a></font>';
}

?>