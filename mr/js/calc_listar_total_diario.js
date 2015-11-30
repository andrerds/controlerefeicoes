/**
 * @author Andre
 */
$(document).ready(function(){
	
	var retorno_ml_diario = $("#retorno_ml_diario");
	var total_ml_diario = retorno_ml_diario.find("#total_ml_diario");
	 
	var html = '';
	 
	$.getJSON ('http://houseon.ddns.net/app/ajax/webserver/calc_listar_total_diario.php', function(data){
	 	$.each(data, function(k, v){
		 html += v.total ;
		  
	 		}); //fechando Foreach ou laço.
		total_ml_diario.html(html);
	}); //fechando JSON
	
	/*
	var dml = $("#dml");
	var ml_diario = retorno_ml_diario.find("#ml_diario");
	var html = '';
	$.getJSON ('http://houseon.ddns.net/app/ajax/webserver/calc_listar_total_ml_diario.php', function(data){
	 	$.each(data, function(k, v){
		 
		  html += v.data ;
	 		}); //fechando Foreach ou laço.
		ml_diario.html(html);
	}); //fechando JSON
	*/
});	//fechando document ready
