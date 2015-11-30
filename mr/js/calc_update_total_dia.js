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
    $('form[name="form_cad_dia"]').submit(function(event){
        var form_cad_dia_total = $(this);
        event.preventDefault();
        var data = form_cad_dia_total.find("#data").val();
       // var ml = form_cadastro_refeicao.find("#ml").val();
      //  var data = form_cadastro_refeicao.find("#data").val();
       // var horas = form_cadastro_refeicao.find("#horas").val();

 

	 if (data.length === 0) {
             open_modal('Opsss! Campo Data em branco!', 'Você está esquecendo de preencher o campo data.', 'alerta');
        }   else 
        $.ajax({
            url: 'http://houseon.ddns.net/app/ajax/script_cal/calc_update_total_diario.php',
            data: form_cad_dia_total.serialize(),
            type: 'POST',
            beforeSend: function() {
                form_cad_dia_total.find('.btn').text('Atualizando...').attr('disabled', 'disabled');
                form_cad_dia_total.find('.load_dia').fadeIn('fast');
            },
            
            success: function(retorno) {

                /** Exibe a mensagem de retorno do envio do comentÃ¡rio */
                if ($.trim(retorno) === 'empty') {
                    open_modal('Opsss! Campos em branco!', 'Para enviar seu contato, Ã© necessÃ¡rio preencher todos os campos!', 'alerta');
                } else if ($.trim(retorno) === 'erroremail') {
                    open_modal('E-mail invÃ¡lido!', 'O e-mail informado Ã© invÃ¡lido!</p><p>Por favor, verifique o mesmo e tente novamente!', 'info');
                } else if ($.trim(retorno) === 'errortime') {
                    open_modal('Aguarde um instante!', 'Para enviar uma nova mensagem, Ã© necessÃ¡rio aguardar <b>10 minutos</b>.', 'alerta');
                } else if ($.trim(retorno) === 'Atualizou') {
                    open_modal('Que Show !', 'A Data Foi atualizado , clique no botao refresh.', 'sucesso');
                    form_cad_dia_total[0].reset();
                } else {
                    open_modal('Erro inesperado!', 'Nosso sistema se comportou de maneira inesperada</p><p>Por favor, tente mais tarde!', 'error');
                }

            },
            complete: function() {
                form_cad_dia_total.find('.btn').text('atualizado').removeAttr('disabled');
                form_cad_dia_total.find('.load_dia').fadeOut('fast');
            }
        });

        return false;
    });

});