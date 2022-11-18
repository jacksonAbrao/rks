@extends('painel.includes.BaseseViews.novo',[
    'pagina' => 'eventos',
    'subpagina' => 'novoEvento',
    'urlSubmit' => route('evento.api.cadastra'),
    'titulo' => 'Cadastrar evento',
    'urlBack' => route('evento.index'),
    'msgSuccess' => 'Evento cadastrado com sucesso!',
    'redirectId' => route('evento.edita', ''),
    'breadcrumb' => [
        'Dashboard' => 'home.painel',
        'Eventos' => 'evento.index',
        'Cadastrar evento' => 'evento.novo'
    ]
])


@section('input_form')

<div class="row">
    <div class="col-lg-12">
        <div class="form-group nomargint">
            <label class="bold" for="nome">Nome*</label>
            <input class="form-control" type="text" name="nome"  data-error="Informação obrigatória" required>
            <div class="help-block with-errors"></div>
        </div>
    </div>
</div>

@stop