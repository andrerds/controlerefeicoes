/**
 * @author Andre
 */
(function ($) {
$(document).ready(function() {
	var janela = $('#janela');
	var conteudo = $('.modal-body');
	//************************************
	janela.click(function() {
		$.post('http://houseon.ddns.net/app/ajax/salvar_total_diario/painel.php',{
			acao : 'form_cad'
		}, function(retorno) {
			$('#myModal').modal({
				backdrop : 'static'
			});
			//carregando janela dinamicamente
			conteudo.html(retorno);
		});
	});
	//*************************************************
	
	//****************************************************************
	//BTN EDITAR, COMEÇA AQUI A REQUISIÇÃO DO BOTAO EDITAR
	$('table').on("click", '#btn_edit_rel_diario', function() {
		var id = $(this).attr('data-id');
			$.post('http://houseon.ddns.net/app/ajax/rel_diario/painel.php', {
			acao : 'form_edit',
			id : id
		}, function(retorno) {
			$('#myModal').modal({
				backdrop : 'static'
			});
			//carregando janela dinamicamente
			conteudo.html(retorno);
		});
		return false;
	});
	//00000000000000000000000000000000000000000000000000000000000000000000000000000000
	//btn ATUALIZAR - UPDATE
	$("#myModal").on("submit", 'form[name="form_edit"]', function() {
		var dados = $(this);
		var botao = dados.find(':button');
		$.ajax({
			url : 'http://houseon.ddns.net/app/ajax/rel_diario/controller.php',
			type : 'POST',
			data : 'acao=edit&' + dados.serialize(),
			beforeSend : function() {
				botao.attr('disabled', true);
				$('.load').fadeIn('slow');
			},
			success: function(retorno) {
				if (retorno === 'atualizou') {
					dados.fadeOut('slow', function() {
						msg('Registro Atualizado com Sucesso ... ', 'sucesso');
						listar('http://houseon.ddns.net/app/ajax/rel_diario/painel.php', 'listar', true);
					});
				} else {
					msg('Nenhum informação foi atualizado ...', 'alerta');
					
				$('.load').fadeOut('slow', function(){
					botao.attr('disabled', false);
				});
				}
			}
		});
		return false;
	});

	
	//BTN DELETAR
	$('table').on("click", '#btn_del_rel_diario', function(){
		var id = $(this).attr('data-id');
		if(confirm('Realmente quer excluir essa informação ?')){
		$.post('http://houseon.ddns.net/app/ajax/rel_diario/controller.php', {acao: 'excluir', id: id}, function(retorno){
			if(retorno === 'deletou'){
				alert('Anotação foi excluida :^) ! ');
				listar('http://houseon.ddns.net/app/ajax/rel_diario/painel.php', 'listar', true);
			}else{
				alert('Erro ao excluir Administrador ');
			}
		});
		}else{
			return false;
			} 
			});
	//------------------------------------------------------------------------------
	//LISTAR REGISTROS - funçoes gerais
	//REALIZA LISTAGEM DOS USUARIOS VIA JQUERY
	function listar(url, acao, atualiza) {
	$.post(url, {acao : acao}, function(retorno) {
			var tbody = $('.table-responsive').find('tbody');
			var load = tbody.find('.load');
			if (atualiza === true) {
				tbody.html(retorno);
			} else {
				load.fadeOut('slow', function() {
				tbody.html(retorno);
				});
			}
			});
	} 
	listar('http://houseon.ddns.net/app/ajax/rel_diario/painel.php', 'listar'); 
	//___
	
	
	 
 	//*************************************************************************
	//funçoes de Mensagem Erro, sucesso info etc
	//*************************************************************************
	function msg(msg, tipo) {
		var retorno = $('.retorno');
		var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('informe mensagens de sucesso, alerta, erro e info');

		retorno.empty().fadeOut('fast', function() {
			return $(this).html('<div class="alert alert-' + tipo + '">' + msg + '</div>').fadeIn('slow');
		});
		setTimeout(function() {
			retorno.fadeOut('slow').empty();
		}, 9000);
	} 
});
}(jQuery));