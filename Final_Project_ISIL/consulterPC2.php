<?php
mysql_connect("localhost", "root", ""	);
 mysql_select_db("AppRetraitPermisConduire");
 mysql_query("SET NAMES utf8");
 
 
 
 $output = '';  
 $sql = "SELECT * FROM PermisConduire ORDER BY nom ";  
 $result = mysql_query( $sql);  
 $output .= '  
      <div >  
           <table  border="1 ">  
                <tr>    
                     <th  width="5%"> 					Nom </th>  
                     <th  width="10%"> 					Prénom </th>
					 <th  width="5%">					Date de naissance </th> 
					 <th  width="5%">					lieu de naissance </th>
                     <th  width="5%"> 					Sexe </th>
					 <th  width="2%"> 					Groupe Sanguin </th> 
					 <th  width="20%">					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Adresse </th> 
					 <th  width="5%"> 					Commune </th>
                     <th  width="5%"> 					Wilaya </th> 
					 <th  width="10%"> 					Numéro du pérmis </th>
					 <th  width="6%"> 					Numéro d&#8217;imprimer </th> 
					 <th  width="7%">					Date de délivrance </th> 
					 <th  width="2%"> 					Catégorie </th>
					 <th  width="8%"> 					Nombre de procés</th> 
					 <th ></th>
                </tr>';  
				    
 if(mysql_num_rows($result) > 0)  
 {  
      while($row = mysql_fetch_array($result))  
      {  
           $output .= '  
                <tr class="w3-hover-opacity">     
                     <td class="nom w3-center" data-id1="'.$row["idPC"].'" contenteditable>  '.$row["nom"].'</td>
                     <td class="prenom w3-center" data-id2="'.$row["idPC"].'" contenteditable>  '.$row["prenom"].'</td>
					 <td class="dateNais w3-center" data-id3="'.$row["idPC"].'" contenteditable>  '.$row["dateNais"].'</td>
					 <td class="lieuNais w3-center" data-id4="'.$row["idPC"].'" contenteditable>  '.$row["lieuNais"].'</td>    
                     <td class="sexe w3-center" data-id5="'.$row["idPC"].'" contenteditable>  '.$row["sexe"].'</td>
					 <td class="groupeSanguin w3-center" data-id6="'.$row["idPC"].'" contenteditable>  '.$row["groupeSanguin"].'</td>
					 <td class="adresse w3-center" data-id7="'.$row["idPC"].'" contenteditable>  '.$row["adresse"].'</td>
					 <td class="commune w3-center" data-id8="'.$row["idPC"].'" contenteditable>  '.$row["commune"].'</td>  
					 <td class="wilaya w3-center" data-id9="'.$row["idPC"].'" contenteditable>  '.$row["wilaya"].'</td>
					 <td class="numPermis w3-center" data-id10="'.$row["idPC"].'" contenteditable>  '.$row["numPermis"].'</td> 
					 <td class="numImpr w3-center" data-id11="'.$row["idPC"].'" contenteditable>  '.$row["numImpr"].'</td>
					 <td class="dateDeDelivraison w3-center" data-id12="'.$row["idPC"].'" contenteditable>  '.$row["dateDeDelivraison"].'</td>
					 <td class="categorie w3-center" data-id13="'.$row["idPC"].'" contenteditable>  '.$row["categorie"].'</td>
					 <td class="nbPV w3-center" data-id14="'.$row["idPC"].'" contenteditable>  '.$row["nbPV"].'</td>
                     <td><button  type="button" name="delete_btn" data-id1="'.$row["idPC"].'"class="btn btn-xs btn-danger btn_delete"><font color=green> Historique </font></button></td>
                </tr>  
         
		   ';  
      }  
 }  
 else  {$output .= '<tr><td colspan="14">Aucun pérmis de conduire n&#8217;est éxictant dans le systéme.</td></tr>';}  
 
 $output .= '</table></div>';  
 echo $output;  
 ?>

