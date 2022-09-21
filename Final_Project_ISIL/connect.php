<?php
//connection to MySQL & db:
$hostname='localhost';
$username='root';
$passeword='';
$connect=mysql_connect($hostname,$username,$passeword);	
if(!$connect){die("<br>"."failed to connect".mysql_error()."<br><br>"."<b>error nombre: </b>".mysql_errno());}
$connect1=mysql_select_db('AppRetraitPermisConduire');
?>
