 $(document).ready(
				   function(){
                             $('#numImpr').keyup(
												  function(){
 	                                                         var numImpr = $('#numImpr').val();
 	                                                         numImpr=$.trim(numImpr);
 	                                                         if (numImpr!=""){
															                   $.post('post2.php',{numImpr},function(data){
																													      $('.feedback2').text(data);
																														  }
																					  );
																			   }
															else{$('.feedback2').text('Saisie numéro de l imprime du permis de conduire');}
															}
												);
							 }
		        );