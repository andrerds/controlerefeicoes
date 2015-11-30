/**
 * @author Andre
 */
$(document).ready(function(){
	 
	var retorno_ml = $("#retorno_ml");
	var mes = retorno_ml.find("#mes");
	 
	var html = '';
	 
	$.getJSON ('http://houseon.ddns.net/app/ajax/webserver/carregar_mes.php', function(data){
	 	$.each(data, function(k, v){
		 html += v.mes ;
		  
	 		}); //fechando Foreach ou laço.
		mes.html(html);
	}); //fechando JSON
	
	 
});	//fechando document ready
