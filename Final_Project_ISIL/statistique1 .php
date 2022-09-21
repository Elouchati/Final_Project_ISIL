<?php
  	
mysql_connect("localhost", "root", ""	);
mysql_select_db("AppRetraitPermisConduire");
mysql_query("SET NAMES utf8");

//les infractions les plus utiliser
$type1=0;
$type2=0;
$type3=0;
$type4=0;
$type5=0;

$query3="SELECT * FROM RelPVInf"; 
$result3=mysql_query($query3);
if(mysql_num_rows($result3)>0){
while($numrow3=mysql_fetch_array($result3)){
$query4="SELECT * FROM Infractions WHERE inf='".$numrow3["inf"]."'"; 
$result4=mysql_query($query4);
$numrow4=mysql_fetch_array($result4);
if($numrow4["idType"]==1){$type1+=1;}
else if($numrow4["idType"]==2){$type2+=1;}
else if($numrow4["idType"]==3){$type3+=1;}
else if($numrow4["idType"]==4){$type4+=1;}
else {$type5+=1;}}}
 
 
$dataPoints = array(
	array("label"=> "1er Degré ", "y"=> $type1),
	array("label"=> "2ém Degré ", "y"=> $type2),
	array("label"=> "3ém Degré", "y"=> $type3),
	array("label"=> "4ém Degré", "y"=> $type4),
	array("label"=> "Délit", "y"=> $type5)
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
                    <?php echo $type1 ;?> Infractions du type 1. <br/>
                    <?php echo $type2 ;?> Infractions du type 2. <br/>
                    <?php echo $type3 ;?> Infractions du type 3. <br/>
                    <?php echo $type4 ;?> Infractions du type 4. <br/>
                    <?php echo $type5 ;?> Délit.

                     </div>

<footer id="footer">
                     <div align="right">
                     <form action="accueil.php#stat" >
                      <button  id="gr"align="left" type="submit" ><font size="+1">RETOUR</font></button></form>
                     
                     </div>
                     
					</footer>
</body>
</html>     
