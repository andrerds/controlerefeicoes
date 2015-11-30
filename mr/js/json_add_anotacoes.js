 $(document).ready(function () {
     
     /* ****************************************
     * *********** MODAIS DO SITE *************
     * ****************************************
     */

    /** Emcapsula a div modal */
    var modal = $('.modal');

    /**
     * Esta funÃ§Ã£o Ã© responsÃ¡bel por exibe a modal
     * 
     * @param {STRING} title
     * @param {STRING} mensagem
     * @param {STRING} classe - sucesso :: erro :: info :: alert
     * @returns {undefined}
     */
    var open_modal = function(title, mensagem, classe) {
   // Cria o conteÃºdo da modal
        var modalcontainer = '<div class="modal-box modal-sm modal-' + classe + '"><div class="modal-header">' + title + '</div><div class="modal-container"><div class="modal-body"><p>' + mensagem + '</p></div></div><div class="modal-footer"><a href="#" title="Fechar" class="btn j_fechar">Fechar</a></div></div>';

        // Exibe a modal e centraliza a mesma
        modal.fadeIn(function() {
            var modalbox = modal.html(modalcontainer).find('.modal-box');
            modalbox.css({
                'margin-top': -modalbox.height() / 2,
                'margin-left': -modalbox.width() / 2
            }).fadeIn('slow');
        });
    };

    /** Fecha a modal */
    modal.on('click', '.j_fechar', function() {
        $('.modal-box').fadeOut(function() {
            modal.fadeOut();
        });
        return false;
    });
 /** FormulÃ¡rio de contato */
    $('form[name="form1"]').submit(function(event){
        var form_cadastro_refeicao = $(this);
        event.preventDefault();
        var refeicao = form_cadastro_refeicao.find("#refeicao").val();
        var ml = form_cadastro_refeicao.find("#ml").val();
        var data = form_cadastro_refeicao.find("#data").val();
        var horas = form_cadastro_refeicao.find("#horas").val();

 

	 if (data.length === 0) {
             open_modal('Opsss! Campo Data em branco!', 'Você está esquecendo a Data, por favor informe a Data.', 'alerta');
        } else if (horas.length === 0) {
               open_modal('Opsss! Campo Hora em branco!','Opa... Agora Só Faltou as Horas.', 'info');
        } else 
        	
        	 


        $.ajax({
            url: 'http://houseon.ddns.net/app/ajax/add/add.php',
            data: form_cadastro_refeicao.serialize(),
            type: 'POST',
            beforeSend: function() {
                form_cadastro_refeicao.find('.btn').text('Aguarde...').attr('disabled', 'disabled');
                form_cadastro_refeicao.find('.load').fadeIn('fast');
            },
            
            success: function(retorno) {

                /** Exibe a mensagem de retorno do envio do comentÃ¡rio */
                if ($.trim(retorno) === 'empty') {
                    open_modal('Opsss! Campos em branco!', 'Para enviar seu contato, Ã© necessÃ¡rio preencher todos os campos!', 'alerta');
                } else if ($.trim(retorno) === 'erroremail') {
                    open_modal('E-mail invÃ¡lido!', 'O e-mail informado Ã© invÃ¡lido!</p><p>Por favor, verifique o mesmo e tente novamente!', 'info');
                } else if ($.trim(retorno) === 'errortime') {
                    open_modal('Aguarde um instante!', 'Para enviar uma nova mensagem, Ã© necessÃ¡rio aguardar <b>10 minutos</b>.', 'alerta');
                } else if ($.trim(retorno) === 'cadastrou') {
                    open_modal('Que Show !', 'Anotação adiciona com sucesso.', 'sucesso');
                    form_cadastro_refeicao[0].reset();
                } else {
                    open_modal('Erro inesperado!', 'Nosso sistema se comportou de maneira inesperada</p><p>Por favor, tente mais tarde!', 'error');
                }

            },
            complete: function() {
                form_cadastro_refeicao.find('.btn').text('Salvo	!').removeAttr('disabled');
                form_cadastro_refeicao.find('.load').fadeOut('fast');
            }
        });

        return false;
    });

});

/** Exibe as mensagens apÃ³s o site ter carregado */
$(window).load(function() {
    $('.j_loadimg').fadeIn();
});





/*$(document).ready(function () {
	
    var wrapper = $("#wrapper");
    var form_cadastro_refeicao = wrapper.find("#form_cadastro_refeicao");
    var botao_submit = form_cadastro_refeicao.find("#botao_submit");
    var retorno = wrapper.find("#retorno");

    //####### inicio da funcao clicar e cadastra ######//
    	
    	botao_submit.on('click', function (event) {
        event.preventDefault();
        var refeicao = form_cadastro_refeicao.find("#refeicao").val();
        var ml = form_cadastro_refeicao.find("#ml").val();
        var data = form_cadastro_refeicao.find("#data").val();
        var horas = form_cadastro_refeicao.find("#horas").val();
        //######depois de captura campos ############///
        
       
    		
         if (data.length === 0) {
            retorno.html, msg('Você está esquecendo a Data, por favor informe a Data.', 'alerta');
        } else if (horas.length === 0) {
            retorno.html, msg('Opa... Agora Só Faltou as Horas.', 'info');
        } else {
            $.ajax({
                url: 'http://houseon.ddns.net/app/ajax/add/add.php',//###################################################################################################################################
                type: 'post',
                data: form_cadastro_refeicao.serialize(),
                beforeSend: function () {
                    retorno.html, msg('Registrando informação espere...', 'sucesso');
                },
                success: function (retorno) {
                    if (retorno === 'cadastrou') {
                        msg('Informações adicionadas com Sucesso ', 'sucesso');
                    } else if (retorno === 'erro_cadastrar') {
                        msg('Estamos com algum problema', 'erro');

                    } else { //se passar por tudo e tiver correto ira direcionar.
                        form_cadastro_refeicao.fadeOut('fast', function () {
                            //msg('Login efetuado com Sucesso , aguarde...', 'sucesso');
                            $('#load').fadeIn('slow', function () {

                            });
                        });
                        setTimeout(function () {
                            $(location).attr('href', 'rel_diario.php');
                        }, 3000);
                    }
                }
            });

        }
        ;
    });
    
    /*Funcoes de mensagens */
   
    	/*	
    function msg(msg, tipo) {
        
        var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('informe mensagens de sucesso, alerta, erro e info');
        retorno.empty().fadeOut('fast', function () {
            return $(this).html('<div class="alert alert-' + tipo + '">' + msg + '</div>').fadeIn('slow');
        });
        setTimeout(function () {
            retorno.fadeOut('slow').empty();
        }, 7000);
    }
});*/