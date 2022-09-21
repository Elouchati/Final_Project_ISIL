$(document).ready(
				   function(){
                             $('#nom').keyup(
												  function(){
 	                                                         var nom = $('#nom').val();
 	                                                         nom=$.trim(nom);
 	                                                         if (nom!=""){
															                   $.post('post3.php',{nom},function(data){
																													      $('.feedback3').text(data);
																														  }
																					  );
																			   }
															else{$('.feedback3').text('saisie nom');}
															}
												);
							 }
		        );