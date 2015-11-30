/**
 * @author Andre
 */
$(document).ready(function(){
	
	var wrapper = $("#wrapper");
	var total_diario = wrapper.find("#total_diario");
	var html = '';
	 
	$.getJSON ('http://houseon.ddns.net/app/ajax/webserver/total_diario.php', function(data){
	 
		$.each(data, function(k, v){
	 
		 html += v.ml_total ;
		 
		
		
	
		}); //fechando Foreach ou laço.
		total_diario.html(html);
	}); //fechando JSON
});	//fechando document ready

	
	var btn_total = $("#btn_total");
	var total_diario2 = btn_total.find("#total_diario2");
	var html = '';
	 
	$.getJSON ('http://houseon.ddns.net/app/ajax/webserver/total_diario.php', function(data){
	 
		$.each(data, function(k, v){
	 
		 html += v.ml_total ;
		 
		
		
	
		}); //fechando Foreach ou laço.
		total_diario2.html(html);
	}); //fechando JSON
//});	//fechando document ready
