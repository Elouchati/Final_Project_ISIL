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
 
 $output .= '  
      <div class="table-responsive">  
           <table  width="10%"  class="table table-bordered" border="1 ">  
                <tr>    
                     <th > <font size="+2"><a> Categorie </a> </font></th>  
 					 <th class="w3-center txt1 w3-text-black" width="10%">  </th> 

                </tr>'; 
		$categories=0;		 
while($categories<8)	{	
		   if($categories==0){$mwaswis='A1';}
		   else if($categories==1){$mwaswis='A2';}
		   else if($categories==2){$mwaswis='B';}
		   else if($categories==3){$mwaswis='C1';}
		   else if($categories==4){$mwaswis='C2';}
		   else if($categories==5){$mwaswis='D';}
		   else if($categories==6){$mwaswis='E';}
		   else if($categories==7){$mwaswis='F';}
  $output .= ' <tr class="w3-hover-opacity">  
                     <td ><b>'.$mwaswis.'</b></td>
                <td><button type="button" name="delete_btn" data-id15="'.$row["idPC"].'"class="btn btn-xs btn-danger btn_delete"><font color=green>+</font></button></td>  
                </tr> 
				</tr>';
				$categories=$categories+1; }
         
		  $output .= ' </table></div>';  
 echo $output;  
 ?>

