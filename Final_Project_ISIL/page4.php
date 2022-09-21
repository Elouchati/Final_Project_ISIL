<?php  
session_start();
require("auth.php");
if (Auth::isLogged()){ 
}
else { 
header('Location:index.php#connecter');
}
 mysql_query("SET NAMES cp1256" ); // pour afficher en arabe 
	mysql_query("SET character set cp1256" ); // pour afficher en arabe 
 mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");

	 $idPC=$_POST['idPC'];
	 $text= $_POST['text']; 
 	 $column= $_POST['column']; 
     $sql = "UPDATE `PermisConduire` SET ".$column."='".$text."' WHERE idPC='".$idPC."'"; 
	 
//test1 
if($column=="numPermis"){
$numPermis=$_POST['text'];
$query1="SELECT numPermis FROM `PermisConduire`where numPermis='$numPermis'";
$result1=mysql_query($query1);
$result6=mysql_num_rows($result1);
if($result6==0){
mysql_query($sql);
echo 'Modification faite avec succé ! ';
  }
else{echo 'Ce numéro ide permis de conduire existe déja dans notre systéme .';}
}
//test2
else if($column=="numImpr"){
$numImpr=$_POST['text'];
$query1="SELECT numImpr FROM `PermisConduire`where numImpr='$numImpr'";
$result1=mysql_query($query1);
$result6=mysql_num_rows($result1);
if($result6==0){
mysql_query($sql);
echo 'Modification faite avec succé ! ';}
else{echo 'Ce numéro ide permis de conduire existe déja dans notre systéme .';}
}
//test3
else if($column=="dateNais"){
$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$dateNais=$_POST['text'];
$dateNais_S= strtotime($_POST["text"]);
$a18=3600*24*365*18 ;
$dns18 = $dateNais_S+$a18 ;
$a=$ds-$dateNais_S; 
$age=$a/31536000; 
if ($ds < $dns18){
	echo 'Cet date de naissance est invalide car l age de ce conducteur est moin de 18 ans '.(int)$age.'ans .  ';}
else{
mysql_query($sql);
echo 'Modification faite avec succé ! ';}
}


//test4
else if($column=="sexe"){
$sexe=$_POST['text'];
if(($sexe=="femme")||($sexe=="homme")){
mysql_query($sql);
echo 'Modification faite avec succé ! ';}
else{echo 'Y a une erreur !!';}
}
//test5
else if($column=="groupeSanguin"){
$groupeSanguin=$_POST['text'];
if(($groupeSanguin=="A+")||($groupeSanguin=="A-")||($groupeSanguin=="B+")||($groupeSanguin=="B-")||($groupeSanguin=="AB+")||($groupeSanguin=="AB-")||($groupeSanguin=="O+")||($groupeSanguin=="O-")){
mysql_query($sql);
echo 'Modification faite avec succé ! ';}
else{echo 'Y a une erreur !! ';}
}
//test6
else if($column=="categorie"){
$categorie=$_POST['text'];
if(($categorie=="A1")||($categorie=="A2")||($categorie=="B1")||($categorie=="B2")||($categorie=="C1")||($categorie=="C2")||($categorie=="D1")||($categorie=="D2")||($categorie=="E1")||($categorie=="E2")||($categorie=="F1")||($categorie=="F2")){
mysql_query($sql);
echo 'Modification faite avec succé ! ';}
else{echo 'Ya une erreur !! ';}
}
//test7
else if($column=="nbPV"){
echo 'Ce numéro ide permis de conduire existe déja dans notre systéme .';
}
//test8
else if($column=="dateDeDelivraison"){
$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$dateDeDelivraison_S= strtotime($_POST["text"]);
$query1="SELECT * FROM `PermisConduire`where idPC='$idPC'";
$result1=mysql_query($query1);
$row= mysql_fetch_assoc($result1);
$age_S= strtotime($row["dateNais"]);

if (($ds < $dateDeDelivraison_S)||($dateDeDelivraison_S<$age_S)){
	echo 'Y a une erreur';}
else{
mysql_query($sql);
echo 'Modification faite avec succé ! ';}
}
//test9
else{mysql_query($sql);
echo 'Modification faite avec succé ! ';}

 ?>