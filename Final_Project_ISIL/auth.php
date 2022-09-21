	<?php
class Auth {
	static function isLogged (){
		if(isset($_SESSION['Auth'])&&isset($_SESSION['Auth']['login'])&& isset($_SESSION['Auth']['pass'])) { mysql_connect("localhost","root","");
		extract($_SESSION['Auth']);
	mysql_select_db("appretraitpermisconduire");
	$sql = "SELECT id FROM Admin WHERE login='$login' AND pass='$pass' ";
	$req = mysql_query($sql) or die(mysql_error());
	 
	 
	 // INITIALISATION DES VARIABLES DE SESSION 
if(mysql_num_rows($req)>0){ return true ; }
		else {return false ;}


 }
		else {return false ;}
		}// fin isLogged  
	
	}//fin Class


?>