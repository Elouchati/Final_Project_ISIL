<?php
  	
mysql_connect("localhost", "root", ""	);
mysql_select_db("AppRetraitPermisConduire");
mysql_query("SET NAMES utf8");

//les infractions les plus utiliser
	$de18a25=0;
	$de25a32=0;
	$de32a39=0;
	$de39a47=0;
	$de47a54=0;
	$de54a61=0;
	$de61a68=0;
	$de68a75=0;
	$de75a82=0;
	$de82a89=0;

$query1="SELECT * FROM `ProcesVerbal`";
$result1=mysql_query($query1);
while($row1=mysql_fetch_assoc($result1)){
$query2="SELECT * FROM `PermisConduire` where numPermis='".$row1["numPermis"]."'";
$result2=mysql_query($query2);
$row2=mysql_fetch_assoc($result2);
//test3
$a= date("F j, Y g:i a");                         
$ds = strtotime($a);
$dateNais=$row2['dateNais'];
$dateNais_S= strtotime($row2["dateNais"]);
$a=$ds-$dateNais_S; 
$age=$a/31536000; 
if ((18<=$age)&&($age<25)){$de18a25=$de18a25+1;}
else if((25<=$age)&&($age<32)){$de25a32=$de25a32+1;}
else if((32<=$age)&&($age<39)){$de32a39=$de32a39+1;}
else if((39<=$age)&&($age<47)){$de39a47=$de39a47+1;}
else if((47<=$age)&&($age<54)){$de47a54=$de47a54+1;}
else if((54<=$age)&&($age<61)){$de54a61=$de54a61+1;}
else if((61<=$age)&&($age<68)){$de61a68=$de61a68+1;}
else if((68<=$age)&&($age<75)){$de68a75=$de68a75+1;}
else if((75<=$age)&&($age<82)){$de75a82=$de75a82+1;}
else if((82<=$age)&&($age<89)){$de82a89=$de82a89+1;}

}
 
 
$dataPoints = array(
	array("label"=> "De 18 ans à 25 ans ", "y"=> $de18a25),
	array("label"=> "De 26 ans à 32 ans ", "y"=> $de25a32),
	array("label"=> "De 33 ans à 39 ans ", "y"=> $de32a39),
	array("label"=> "De 40 ans à 47 ans ", "y"=> $de39a47),
	array("label"=> "De 48 ans à 54 ans ", "y"=> $de47a54),
	array("label"=> "De 55 ans à 61 ans ", "y"=> $de54a61),
	array("label"=> "De 62 ans à 68 ans ", "y"=> $de61a68),
	array("label"=> "De 69 ans à 75 ans ", "y"=> $de68a75),
	array("label"=> "De 76 ans à 82 ans ", "y"=> $de75a82),
	array("label"=> "De 83 ans à 89 ans ", "y"=> $de82a89)
);
	
?>
<!DOCTYPE HTML>
<html>

<head> 
<link rel="stylesheet" href="assets/css/main.css" />
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <style>.gr{ font-weight:bold;}</style>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "ANNEE 2018 "
	},
	subtitles: [{
		text: " "
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "##0# infractions",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body style="background-color: rgba(0,0,0,1)">
<br/>
<h1 style="color:rgba(255,255,255,1.00)" align="center">Statistiques des infractions</h1>
<div id="chartContainer" style="height: 370px; width: 78%; margin:10%; margin-right:10%; margin-top: 1%;"></div>
<script src="pie.js"></script>
  <div align="left"  style=" margin-left:2%;font-weight:bold;"> 
                  
                     </div>
                       <div align="left"  style=" margin-left:2%;font-weight:bold;"> 
                    De 18 ans à 25 ans <?php echo $de18a25 ;?></br>
					De 26 ans à 32 ans <?php echo $de25a32 ;?></br>
					De 33 ans à 39 ans <?php echo $de32a39 ;?></br>
					De 40 ans à 47 ans <?php echo $de39a47 ;?></br>
					De 48 ans à 54 ans <?php echo $de47a54 ;?></br>
					De 55 ans à 61 ans <?php echo $de54a61 ;?></br>
					De 62 ans à 68 ans <?php echo $de61a68 ;?></br>
					De 69 ans à 75 ans <?php echo $de68a75 ;?></br>
					De 76 ans à 82 ans <?php echo $de75a82 ;?></br>
					De 83 ans à 89 ans <?php echo $de82a89 ;?></br>

                     </div>

<footer id="footer">
                     <div align="right">
                     <form action="accueil.php#stat" >
                      <button  align="left" type="submit" ><font size="+1">RETOUR</font></button></form>
                     
                     </div>
                     
					</footer>
</body>
</html>     
