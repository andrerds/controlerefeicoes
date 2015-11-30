/**
 * @author Andre
 *//*
$(document).ready(function(){
	
	var row = $(".row");
	var tabela_total_mes = row.find("#tabela_total_mes");
	var html = '';
	 var m = 'Mês';
         var t = 'Total ml';
	$.getJSON ('http://houseon.ddns.net/app/ajax/listar_total_do_mes.php', 
        function(data){
	  html += '<thead>'; 
            html += '<th>'+ m +'</th>'; 
            html += '<th>'+ t +'</th>'; 
              html += '<thead>'; 
		$.each(data, function(k, v){
	 
		// html += v.mes ;
                //  html += v.total ;
                 
		 html += '<tr>';                 
                 html += '<td>'+ v.mes +'</td>';
                 html += '<td>'+ v.total    +'</td>';
                 html += '</tr>';
		
		
	
		}); //fechando Foreach ou laço.
		tabela_total_mes.html(html);
	}); //fechando JSON
});	//fechando document ready
/*
	
	var btn_total = $("#btn_total");
	var total_diario2 = btn_total.find("#total_diario2");
	var html = '';
	 
	$.getJSON ('http://houseon.ddns.net/app/ajax/total_diario.php', function(data){
	 
		$.each(data, function(k, v){
	 
		 html += v.ml_total ;
		 
		
		
	
		}); //fechando Foreach ou laço.
		total_diario2.html(html);
	}); //fechando JSON
//});	//fechando document ready */
function listar_total_mes(){
    var itens = "", url  = "http://houseon.ddns.net/app/ajax/webserver/listar_total_do_mes.php";
    $.ajax({
       url :url,
       cache: false,
       dataType: "json",
       beforeSend: function(){
           $("h5").html("<div class='alert alert-info'>Aguarde ... <img src='../img/loading.gif' /></p>"); //carregando
            },
            error: function(){
                $("h5").html("Exite algum problema com o Servidor ou Banco de dados ");
              },
              success: function(retorno){
                  if(retorno[0].erro){
                      $("h5").html(retorno[0].erro);
              }
              else{
                   for(var i = 0; i<retorno.length; i++){
                       itens += "<tr>";
                       itens += "<td>" + retorno[i].mes +"</td>";
                       itens += "<td>" + retorno[i].total +"</td>";
                   }
                   $("#tabela_total_mes tbody").html(itens);
                   $("h5").html('<div class="alert alert-success">Carregado com Sucesso !</p>');
                  
                  $("h5").fadeOut(3000);
              }
          }
          
    });
    
    
    
}
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
