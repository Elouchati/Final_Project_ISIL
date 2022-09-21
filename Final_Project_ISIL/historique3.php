<?php
// Start the session
session_start();
mysql_connect("localhost", "root", ""	);
mysql_select_db("AppRetraitPermisConduire");
mysql_query("SET NAMES utf8");
$_SESSION['idPC']=$_POST["idPC"];
?>