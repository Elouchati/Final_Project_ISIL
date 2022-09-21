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
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
 
 
 
 $output = '';  
 $sql = "SELECT * FROM Infractions ORDER BY idType ";  
 $result = mysql_query( $sql);  
 $output .= '  
      <div >  
           <table border="1 ">  
                <tr>    
                     
               		 <th  width="10%">   		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><font size="+2">Type </font></a></th>
					 <th  width="30%"> <font size="+2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a>	    Nature d&#8217;infraction 	</a></font>	</th>
                     <th  width="15%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><font size="+2">Décret </font></a></th>
					 <th  width="15%">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><font size="+2">Punissable </font>						</a>	</th> 
					 <th  width="15%">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a><font size="+2">Observation 	</font>					</a>	</th> 
				   	 <th  width="15%">
					  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><font size="+2">Amende</font> </a> 						                      </th> 
				     <th  width="15%"> </th> 
                </tr>';  
				    
 if(mysql_num_rows($result) > 0)  
 {  
      while($row = mysql_fetch_array($result))  
      {  
           $output .= '  
                <tr >     
                   
                     <td class="prenom w3-center" data-id2="'.$row["inf"].'" >  '.$row["nomType"].'</td>
					 <td class="lieuNais w3-center" data-id4="'.$row["inf"].'" >  '.$row["natureInfraction"].'</td>    
                     <td class="sexe w3-center" data-id5="'.$row["inf"].'" >  '.$row["decretInfraction"].'</td>
					 <td class="groupeSanguin w3-center" data-id6="'.$row["inf"].'" >  '.$row["punissableInfraction"].'</td>
					 <td class="adresse w3-center" data-id7="'.$row["inf"].'" >  '.$row["observationInfraction"].'</td>
					 <td class="commune w3-center" data-id8="'.$row["inf"].'" >  '.$row["amendeInfraction"].'</td>  
					 
                <td><button type="button" name="delete_btn" data-id9="'.$row["inf"].'"class="btn btn-xs btn-danger btn_delete w3-center w3-green w3-text-black txt1"><b><font size="+2"  color="#3E9005">+</font></b></button></td> 
				</font> 
                </tr>  
         
		   ';  
      }  
 }  
 else  {$output .= '<tr><td colspan="9">Il n&#8217;éxicte aucune infraction dans le systéme .</td></tr>';}  
 
 $output .= '</table></div>';  
 echo $output;  
 ?>

