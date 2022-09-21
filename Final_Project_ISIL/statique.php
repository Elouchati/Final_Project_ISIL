<?php
$hostname='localhost';
$username='root';
$passeword='';
$connect=mysql_connect($hostname,$username,$passeword);
mysql_select_db('AppRetraitPermisConduire') or die(mysql_error());

	$femme=0;
	$homme=0;
$query1="SELECT * FROM `ProcesVerbal`";
$result1=mysql_query($query1);
while($row1=mysql_fetch_assoc($result1)){
$query2="SELECT * FROM `PermisConduire` where numPermis='".$row1["numPermis"]."'";
$result2=mysql_query($query2);
$row2=mysql_fetch_assoc($result2);
$homme=$homme+1;
if($row2["sexe"]=="femme"){$femme=$femme+1;$homme=$homme-1;}
}

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
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "HOMME / FEMME"
	},
	axisY: {
		title: "Nombre des personnes qui ont comis des infractions - année 2018",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		
		    
		yValueFormatString: "#,##0.# Personne ",
		dataPoints: [
		<?php  echo '{ label: "Homme", y: '.$homme.' },'; ?>
		<?php  echo '{ label: "Femme", y: '.$femme.' }'; ?>
			
		]
	},
	]
	
});
chart.render();

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>
</head>
<body style="background-color: rgba(0,0,0,1)">
<br/>
<h1 style="color:rgba(255,255,255,1.00)" align="center">Statistiques des infractions</h1>

  <div id="chartContainer" style="height: 370px; width: 78%; margin:10%; margin-right:10%; margin-top: 1%;"></div>
<script src="canvasjs.min.js"></script>
<div style="margin-left:margin-left:2%;"> 
Nombre totale d'infraction <?php echo ($femme+$homme) ; ?> .<br/>
Totale d'infractions comis par les hommes : <?php echo $homme; ?> infraction.<br/>
Totale d'infractions comis par les femmes : <?php echo $femme; ?> infraction.
</div>
<footer id="footer">
                     <div align="right">
                     <form action="accueil.php#stat" >
                      <button  id="gr"align="left" type="submit" ><font size="+1">RETOUR</font></button></form>
                     
                     </div>
                     
					</footer>
</body>
</html>     
