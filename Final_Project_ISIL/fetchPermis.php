
<?php
//fetch.php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysql_real_escape_string( $_POST["query"]);
 $query = "
  SELECT * FROM permisconduire
  WHERE numPermis LIKE '".$search."%' ORDER BY nom";

$result = mysql_query($query);
if(mysql_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th class="w3-text-white">Numéro du permis </th>
     <th class="w3-text-white">Nom</th>
     <th class="w3-text-white">Prenom</th>
     <th class="w3-text-white">Wilaya</th>
    </tr>
 ';
 while($row = mysql_fetch_array($result))
 {
  $output .= '
   <tr>
    <td class="w3-text-white">'.$row["numPermis"].'</td>
    <td class="w3-text-white">'.$row["nom"].'</td>
    <td class="w3-text-white">'.$row["prenom"].'</td>
    <td class="w3-text-white">'.$row["wilaya"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else 
{
 echo '<p class="w3-text-white">Ce permis de conduire n&#8217;exicte il faut d&#8217;abord l&#8217;ajouter au systéme.</p>';
}
}
?>