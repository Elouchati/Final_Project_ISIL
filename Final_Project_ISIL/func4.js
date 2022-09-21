$(document).ready(
				   function(){
                             $('#dateNais').keyup(
												  function(){
 	                                                         var dateNais = $('#dateNais').val();
 	                                                         dateNais=$.trim(dateNais);
 	                                                         if (dateNais!=""){
															                   $.post('post4.php',{dateNais},function(data){
																													      $('.feedback4').text(data);
																														  }
																					  );
																			   }
															else{$('.feedback4').text('Ajouter une date ');}
															}
												);
							 }
		        );