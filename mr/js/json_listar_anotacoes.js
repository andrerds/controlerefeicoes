$(document).ready(function(){
	
	var wrapper = $("#wrapper");
	var select_refeicao = wrapper.find("#select_refeicao");
	var html = '';
       
	html += '<select  name="refeicao" id="select_refeicao" data-mini="true">';
        
	$.getJSON ('http://houseon.ddns.net/app/ajax/webserver/anotacoes.php', function(data){
	  html += '<option value"Selecione">';
		$.each(data, function(k, v){
		 html += '<option>';
  		 html += v.anota;
	 
         html += '</option>';
		
		}); //fechando Foreach ou laço.
		select_refeicao.html(html);
	}); //fechando JSON
});	//fechando document ready
		
