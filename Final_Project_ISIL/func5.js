$(document).ready(
				   function(){
                             $('#dateDeDelivraison').keyup(
												  function(){
 	                                                         var dateDeDelivraison = $('#dateDeDelivraison').val();
 	                                                         dateDeDelivraison=$.trim(dateDeDelivraison);
 	                                                         if (dateDeDelivraison!=""){
															                   $.post('post5.php',{dateDeDelivraison},function(data){
																													      $('.feedback5').text(data);
																														  }
																					  );
																			   }
															else{$('.feedback5').text('Ajouter une date ');}
															}
												);
							 }
		        );