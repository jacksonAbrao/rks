function MostrarLoad(){
    if($('#loader-wrapper').length) {
        $('#loader-wrapper').removeClass('stoped');
    } else {
        $('body').append('<div id="loader-wrapper"><div id="loader"></div><div class="loader-section section-left"></div><div class="loader-section section-right"></div></div>');
    }
    //console.log("Mostrando mensagem de load");
}

function PararLoad(ObjLoad){
    $('#loader-wrapper').addClass('stoped');
    //console.log("Parando mensagem de load");
}

function MostrarSucesso(RetornoSucessoAPI, funcaoAceite){
    console.log("Atividade realizada com sucesso");
    console.log(RetornoSucessoAPI);
}

function MostrarErro(RetornoErroAPI, mensagemError = '', type = null){
    console.log("Atividade realizada com erros");
    console.log(RetornoErroAPI);

    if(mensagemError == ''){
        let mensagemErroText = '';

        const errMsgIsUndef = msg => (msg === undefined || msg === "undefined" || msg === "null");
        
        if(RetornoErroAPI.responseJSON !== undefined && RetornoErroAPI.responseJSON.mensagenserro !== undefined) {
            $.each(RetornoErroAPI.responseJSON.mensagenserro, function(i, item){
                if (!errMsgIsUndef(item))
                    mensagemErroText += '<p>'+item+'</p>';
            });
        } else if(RetornoErroAPI.responseJSON !== undefined && !errMsgIsUndef(RetornoErroAPI.responseJSON.mensagem)) {
            mensagemErroText = '<p>'+RetornoErroAPI.responseJSON.mensagem+'</p>';
        } else if (RetornoErroAPI.status === 413) {
            mensagemErroText = '<p>Não foi possível realizar o upload do arquivo. <br> Ele ultrapassa o limite de upload máximo permitido.</p>';
        }

        if(!type) {
            Swal.fire({
                title: 'Erro!'
                , html: mensagemErroText
                , icon: 'error'
                , confirmButtonText: 'OK'
            });    
        } else {
            Swal.fire({
                title: 'Atenção!'
                , html: mensagemErroText
                , icon: 'warning'
                , confirmButtonText: 'OK'
            });
        }
        
    } else {
        if(!type) {
            Swal.fire({
                title: 'Erro!'
                , html: mensagemError
                , icon: 'error'
                , confirmButtonText: 'OK'
            });
        } else {
            Swal.fire({
                title: 'Atenção!'
                , html: mensagemError
                , icon: 'warning'
                , confirmButtonText: 'OK'
            });
        }
    }
}

jQuery(function($){
    function executarAtribuicoesFormulario(form, result = null) {
        if( form.attr('data-back') !== undefined && form.attr('data-back') !== ''){
            window.location = document.referrer;
        } else if( form.attr("data-reload") !== undefined && form.attr('data-reload') !== ''){
            window.location.reload();
        } else if(form.attr("data-redirect") !== undefined && form.attr('data-redirect') !== ''){
            window.location = form.attr("data-redirect");
        } else if(form.attr("data-redirectid") !== undefined && form.attr('data-redirectid') !== ''){
            window.location = form.attr("data-redirectid")+'/'+result['id'];
        }
    }

    function executaSubmitFormulario(form) {
        var data = form.serialize();
        var Authorization = "";
        if( form.attr('data-Authorization') !== undefined ){
            Authorization = form.attr('data-Authorization');
        }
        var load = MostrarLoad();

        $.ajax({
            url: form.attr('action'),
            data: data,
            dataType: 'JSON',
            type: form.attr('method'),
            headers:{
                'Authorization':Authorization
            },
            success: function(result){
                PararLoad(load);
                MostrarSucesso(result);

                if(form.attr('data-msgsuccess') !== undefined && form.attr('data-msgsuccess') !== '') {
                    Swal.fire({
                        title: "Sucesso!",
                        text: form.attr('data-msgsuccess'),
                        icon: "success",
                        type: "success"
                    }).then(function() {
                        executarAtribuicoesFormulario(form, result);
                    });
                } else {
                    executarAtribuicoesFormulario(form, result);
                }
            },
            error: function(err, resp, text) {
                PararLoad(load);
                MostrarErro(err);
            }
        });
    }

    $('.formAjax').on('submit', function(e){
        var form = $(this);
        if(form.attr('no-process') !== undefined && form.attr('no-process') !== ''){
            return true;
        }
        e.preventDefault();

        if(form.attr('data-needConfirm') !== undefined && form.attr('data-needConfirm') !== ''){
            var confirmText, confirmButtonText = '';

            if(form.attr('data-confirmText') !== undefined && form.attr('data-confirmText') !== ''){
                confirmText = form.attr('data-confirmText');
            } else {
                confirmText = "Deseja realmente excluir este item?";
            }

            if(form.attr('data-confirmButtonText') !== undefined && form.attr('data-confirmButtonText') !== ''){
                confirmButtonText = form.attr('data-confirmButtonText');
            } else {
                confirmButtonText = "Excluir item";
            }

            Swal.fire({
                title: 'Atenção!',
                text: confirmText,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: confirmButtonText,
                cancelButtonText: 'Cancelar',
                focusConfirm: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    executaSubmitFormulario(form);
                }
            })
        } else {
            executaSubmitFormulario(form);
        }
    });
});