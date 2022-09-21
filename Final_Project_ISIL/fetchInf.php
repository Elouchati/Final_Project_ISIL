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
$output = '';
if(isset($_POST["query"]))
{
 $search = mysql_real_escape_string( $_POST["query"]);
 mysql_set_charset('utf8');
 $query = "
  SELECT * FROM infractions
  WHERE idType LIKE '%".$search."%'
  OR natureInfraction LIKE '%".$search."%' 
  OR nomType LIKE '%".$search."'
 ";
}
else
{
 $query = " SELECT * FROM infractions  ORDER BY idType LIMIT 5 ";
}
$result = mysql_query($query);
if(mysql_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><font size="+2">Type</font></a></th>
     <th width="30%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <a><font size="+2">Nature d&#8217;nfraction</font></a> </th>
     <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><font size="+2">Decret</font></a> </th>
     <th width="10%"><a><font size="+2">Punissable </font></a></th>
	  <th width="30%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <a><font size="+2">Observation</font></a></th>
	   <th width="15%"><a><font size="+2">Amende</font></a></th>
    </tr>
 ';
 while($row = mysql_fetch_array($result))
 {
  $output .= '
   <tr>
    <td><b>'.$row["nomType"].'</b></td>
    <td>'.$row["natureInfraction"].'</td>
    <td>'.$row["decretInfraction"].'</td>
    <td>'.$row["punissableInfraction"].'</td>
	<td>'.$row["observationInfraction"].'</td>
	<td>'.$row["amendeInfraction"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Cette infraction n&#8217;exicte pas dans notre systéme .  ';
}

?>