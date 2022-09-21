$(document).ready(
				   function(){
                             $('#date').keyup(
												  function(){
 	                                                         var date = $('#date').val();
 	                                                         date=$.trim(date);
 	                                                         if (date!=""){
															                   $.post('post7.php',{date},function(data){
																													      $('.feedback7').text(data);
																														  }
																					  );
																			   }
															else{$('.feedback7').text('Ajouter une date');}
															}
												);
							 }
		        );