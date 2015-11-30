/**
 * @author Andre
 */
$(document).ready(function(){
	
	var container = $("#retorno_ml");
	var total_ml = container.find("#total_ml");
	var html = '';
	 
	$.getJSON ('http://houseon.ddns.net/app/ajax/webserver/calc_listar_total_mes.php', function(data){
	 	$.each(data, function(k, v){
		 html += v.total ;
	 		}); //fechando Foreach ou laço.
		total_ml.html(html);
	}); //fechando JSON
});	//fechando document ready
