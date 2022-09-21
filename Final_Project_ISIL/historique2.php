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
 $query = " SELECT * FROM permisconduire ORDER BY nom";
}
$result = mysql_query($query);

if(mysql_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Numéro du permis </th>
     <th class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	Nom</th>
     <th class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Prénom</th>
     <th class="w3-text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wilaya</th>
	 <th class="w3-text-white"></th>
    </tr>
 ';
 while($row = mysql_fetch_array($result)){
  $output .= '
   <tr>
    <td class="w3-text-white">'.$row["numPermis"].'</td>
    <td class="w3-text-white">'.$row["nom"].'</td>
    <td class="w3-text-white">'.$row["prenom"].'</td>
    <td class="w3-text-white">'.$row["wilaya"].'</td>
	<td><button  type="button" name="delete_btn" data-id1="'.$row["idPC"].'"class="btn btn-xs btn-danger btn_delete"><font color=green> Historique </font></button></td>
   </tr>
  ';}
 
 echo $output;
}
else
{
 echo '<font color="#E91115"><a class="w3-text-white" >Ce permis de conduire n&#8217;exicte pas dans notre systéme .</a></font>';
}

?>