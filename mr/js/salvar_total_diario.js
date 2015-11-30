/**
 * @author Andre
 */
$(document).ready(function() {
	var btn_total = $('#btn_total');
	var conteudo = $('.modal-body');
	//************************************
	btn_total.click(function() {
		$.post('http://houseon.ddns.net/app/ajax/salvar_total_diario/painel.php', {
			acao : 'form_cad'
		}, function(retorno) {
			$('#modal_total_diario').modal({
				backdrop : 'static'
			});
			//carregando janela dinamicamente
			conteudo.html(retorno);
		});
	});
	//*************************************************
	$("#modal_total_diario").on("submit", 'form[name="form_cad"]', function() {
		var form = $(this);
		var botao = form.find(':button');
		$.ajax({
			url : 'http://houseon.ddns.net/app/ajax/salvar_total_diario/controller.php',
			type : 'POST',
			data : 'acao=cadastro&' + form.serialize(),
			beforeSend : function() {
				botao.attr('disabled', true);
				$('.load').fadeIn('slow');
			},
			success : function(retorno) {
				botao.attr('disabled', false);
				$('.load').fadeOut('slow');
				if (retorno === 'cadastrou') {
					form.fadeOut('slow', function() {
						msg('Anotação gravada com sucesso !', 'sucesso');
						 
					});
				} else {
					msg('Error Ao cadastrar verifique o log', 'erro');
				}
			}
		}); 
		return false;
	});
	 
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