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
 
 
 
 $output = '';  
 $sql = "SELECT * FROM PermisConduire ORDER BY nom ";  
 $result = mysql_query( $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" border="1 ">  
                <tr>    
                     <th class="w3-center txt1 w3-text-black" width="10%"> <font size="+2"><a> Nom</a> </font></th>  
                     <th class="w3-center txt1 w3-text-black" width="10%"><font size="+2"> <a>Prénom</a></font> </th>
					 <th class="w3-center txt1 w3-text-black" width="10%"><font size="+1"><a>Date de naissance </a></font> </th> 
					 <th class="w3-center txt1 w3-text-black" width="10%"><font size="+1"> <a>lieu de naissance </a></font></th>
                     <th class="w3-center txt1 w3-text-black" width="10%"> <font size="+2"><a>Sexe</a></font> </th>
					 <th class="w3-center txt1 w3-text-black" width="10%"> <font size="+2"><a>Groupe Sanguin </a></font></th> 
					 <th class="w3-center txt1 w3-text-black" width="10%"> <font size="+2"><a>Adresse</a> </font></th> 
					 <th class="w3-center txt1 w3-text-black" width="10%"> <font size="+2"><a>Commune</a> </font></th>
                     <th class="w3-center txt1 w3-text-black" width="10%"> <font size="+2"><a>Wilaya</a> </font></th> 
					 <th class="w3-center txt1 w3-text-black" width="10%"><font size="+2"> <a>Numéro PC</a></font> </th>
					 <th class="w3-center txt1 w3-text-black" width="10%"><font size="+2"> <a>Numéro imprimer</a></font> </th> 
					 <th class="w3-center txt1 w3-text-black" width="10%"><font size="+2"> <a>Date de délivrance</a></font> </th> 
					 <th class="w3-center txt1 w3-text-black" width="10%"><font size="+2"> <a>Catégorie</a></font> </th> 
 					 <th class="w3-center txt1 w3-text-black" width="10%">  </th> 

                </tr>';  
				    
 if(mysql_num_rows($result) > 0)  
 {  
      while($row = mysql_fetch_array($result))  
      {  
           $output .= '  
		   
                <tr class="w3-hover-opacity">  
                     <td class="nom w3-center" data-id1="'.$row["idPC"].'" contenteditable><b>  '.$row["nom"].'</b></td>
                     <td class="prenom w3-center" data-id2="'.$row["idPC"].'" contenteditable> <b> '.$row["prenom"].'</b></td>
					 <td class="dateNais w3-center" data-id3="'.$row["idPC"].'" contenteditable>  '.$row["dateNais"].'</td>
					 <td class="lieuNais w3-center" data-id4="'.$row["idPC"].'" contenteditable>  '.$row["lieuNais"].'</td>    
                     <td class="sexe w3-center" data-id5="'.$row["idPC"].'" contenteditable> <b>  '.$row["sexe"].'</b></td>
					 <td class="groupeSanguin w3-center" data-id6="'.$row["idPC"].'" contenteditable>  '.$row["groupeSanguin"].'</td>
					 <td class="adresse w3-center" data-id7="'.$row["idPC"].'" contenteditable>  '.$row["adresse"].'</td>
					 <td class="commune w3-center" data-id8="'.$row["idPC"].'" contenteditable>  '.$row["commune"].'</td>  
					 <td class="wilaya w3-center" data-id9="'.$row["idPC"].'" contenteditable> <b> '.$row["wilaya"].'</b></td>
					 <td class="numPermis w3-center" data-id10="'.$row["idPC"].'" contenteditable> <b> '.$row["numPermis"].'</b></td> 
					 <td class="numImpr w3-center" data-id11="'.$row["idPC"].'" contenteditable>  '.$row["numImpr"].'</td>
					 <td class="dateDeDelivraison w3-center" data-id12="'.$row["idPC"].'" contenteditable>  '.$row["dateDeDelivraison"].'</td>
					 <td class="categorie w3-center" data-id13="'.$row["idPC"].'" contenteditable>  '.$row["categorie"].'</td>
                <td><button type="button" name="delete_btn" data-id15="'.$row["idPC"].'"class="btn btn-xs btn-danger btn_delete w3-center w3-red w3-text-black txt1"><font color=red>x</font></button></td>  
                </tr>  
         
		   ';  
      }  
 }  
 else  {$output .= '<tr><td colspan="15">Y a aucun permis de conduire dans le systéme !! </td></tr>';}  
 
 $output .= '</table></div>';  
 echo $output;  
 ?>

