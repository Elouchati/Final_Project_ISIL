<?php
include('connect.php');
if(isset($_POST['nom'])&& !empty($_POST['nom']))
{
	$nom=mysql_real_escape_string(htmlentities($_POST['nom']));

	if (($nom==1)||($nom==2)||($nom==3)||($nom==4)||($nom==5)||($nom==6)||($nom==7)||($nom==8)||($nom==9)||($nom=="!")||($nom=="?")||($nom==".")||($nom=="/")||($nom=="*")||($nom==",")||($nom==";")||($nom=="&")||($nom==":")||($nom=="a1")){
		echo" Nom incorrecte, les caractères spéciaux et les numéros sont invalides  (1..9 , * / ; ! ? . : &)";
	}else {
		echo"";
	}
}


?>