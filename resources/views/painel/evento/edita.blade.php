
@extends('painel.includes.BaseseViews.edicao',[
    'titulo' => 'Editar evento',
    'pagina' => 'eventos',
    'subpagina' => 'meusEventos',
    'nomeVisualizacao' => 'Ver evento',
    'tabs' => true,
    'urlVisualizacao' => '"evento.edita", {{$item->id}}',
    'breadcrumb' => [
        'Dashboard' => 'home.painel',
        'Eventos' => 'evento.index',
        $item->nome => '"evento.edita", {{$item->id}}',
    ],
])

@php
    $verboSubmissao = 'PUT';
    $urlSubmit = route('evento.api.editar', $item->id);
    $msgSuccess = 'Evento editado com sucesso';
    $user_id = $itensView['sessao']->user_id;
    $tipoStatus = App\Models\Enuns\Evento\StatusEvento::GetAllEnum();
@endphp

@section('input_form')

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link <?php if(!isset($_GET['tab']) or $_GET['tab'] == 'informacoes') : echo 'active'; endif; ?>" id="nav-informacoes-tab" data-bs-toggle="tab" data-bs-target="#nav-informacoes" type="button" role="tab" aria-controls="nav-informacoes" aria-selected="false">Informações</button>
        <button class="nav-link <?php if(isset($_GET['tab']) and $_GET['tab'] == 'imagens') : echo 'active'; endif; ?>" id="nav-imagens-tab" data-bs-toggle="tab" data-bs-target="#nav-imagens" type="button" role="tab" aria-controls="nav-imagens" aria-selected="false">Imagens</button>
    </div>
</nav>
<div class="tab-content margint20" id="nav-tabContent">
    <div class="tab-pane fade <?php if(!isset($_GET['tab']) or $_GET['tab'] == 'informacoes') : echo 'show active'; endif; ?>" id="nav-informacoes" role="tabpanel" aria-labelledby="nav-informacoes-tab" tabindex="0">
        <form class="w-100 formFieldNormal formValidate formAjax" action="{{$urlSubmit}}" method="{{$verboSubmissao}}"
        enctype="multipart/form-data" data-redirect="{{route('evento.edita', $item->id)}}" data-msgsuccess=""
        data-Authorization="{{session('Authorization','')}}">
            <input type="hidden" name="usuario_id" value="{{$user_id}}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nome">Nome<span class="required">*</span></label>
                        <input class="form-control" type="text" name="nome" value="{{$item->nome}}" data-error="Informação obrigatória" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="descricao">Descricao</label>
                        <textarea class="form-control" name="descricao" id="summernote">{{$item->descricao}}</textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="tipo_aula_url" class="form-control">
                            @foreach($tipoStatus as $key => $value)
                                <option value="{{$key}}"
                                    @if($item->status == $key)
                                        selected
                                    @endif
                                    >{{$value}}
                                </option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary pl-4 pr-4"> Salvar </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="tab-pane fade <?php if(isset($_GET['tab']) && $_GET['tab'] == 'imagens') : echo 'show active'; endif; ?>" id="nav-imagens" role="tabpanel" aria-labelledby="nav-imagens-tab" tabindex="0">
        <form class="w-100 formFieldNormal formValidate formAjax" action="{{$urlSubmit}}" method="{{$verboSubmissao}}"
        enctype="multipart/form-data" data-redirect="{{route('evento.edita', $item->id)}}" data-msgsuccess="{{$msgSuccess}}"
        data-Authorization="{{session('Authorization','')}}">
        imagens
        </form>
    </div>
</div>

{{-- {{dd($item);}} --}}



@endsection