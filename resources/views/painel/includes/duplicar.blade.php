<?php
    if(!isset($itemTipo))
        $itemTipo = "item";
?>

<script>
    $(document).ready(function() {
        $('.duplica').on('click', function(e) {
            e.preventDefault();
            id = $(this).data('id');
            $('#id-duplicar').data('id', id);
            urlduplicar = "{{$urlDuplicar}}/" + id;
            urlRedirect = "{{$url_redirect_duplicar}}";

            Swal.fire({
                title: 'Atenção!'
                , text: "Deseja realmente duplicar este {{$itemTipo}}?"
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonText: 'Duplicar {{$itemTipo}}'
                , cancelButtonText: 'Cancelar'
                , focusConfirm: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: urlduplicar
                        , type: "POST"
                        , headers: {
                            'Authorization': "{{session('Authorization','')}}"
                        }
                        , success: function(result) {
                            let retorno = result;
                            Swal.fire({
                                title: 'Sucesso!'
                                , text: `${retorno.mensagem}`
                                , icon: 'success'
                                , confirmButtonText: 'OK'
                                /*, timer: 1500*/
                            }).then(function() {
                                window.location = urlRedirect+'/'+result['id'];
                            });
                            $("#form_equip").trigger("reset");
                            $('#id-duplicar').prop("disabled", false);
                        }
                        , error: function(err, resp, text) {
                            let erro = err.responseJSON;
                            let msgs = erro.mensagenserro;
                            let lista = $("#lista")
                            lista.empty();
                            $.each(msgs, function(i, e) {
                                lista.append(`<li>${e}</li>`)
                            })
                            Swal.fire({
                                title: 'Erro!'
                                , text: erro.mensagem
                                , icon: 'error'
                                , confirmButtonText: 'OK'
                            })
                            $("#card_error").fadeIn("Slow");
                            setTimeout(function() {
                                $("#card_error").fadeOut();
                            }, 5000);
                            $('#id-duplicar').prop("disabled", false);
                        }
                    });
                }
            })
        });
    });

</script>