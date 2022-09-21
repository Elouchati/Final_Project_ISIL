$(document).ready(
				   function(){
                             $('#dateCommission').keyup(
												  function(){
 	                                                         var dateCommission = $('#dateCommission').val();
 	                                                         dateCommission=$.trim(dateCommission);
 	                                                         if (dateCommission!=""){
															                   $.post('post6.php',{dateCommission},function(data){
																													      $('.feedback6').text(data);
																														  }
																					  );
																			   }
															else{$('.feedback6').text('Saisie date de commission');}
															}
												);
							 }
		        );