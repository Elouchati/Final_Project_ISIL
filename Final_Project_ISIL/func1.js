$(document).ready(
				   function(){
                             $('#numPermis').keyup(
												  function(){
 	                                                         var numPermis = $('#numPermis').val();
 	                                                         numPermis=$.trim(numPermis);
 	                                                         if (numPermis!=""){
															                   $.post('post.php',{numPermis},function(data){
																													      $('.feedback').text(data);
																														  }
																					  );
																			   }
															else{$('.feedback').text('Saisie numéro permis de conduire');}
															}
												);
							 }
		        );