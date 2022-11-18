<?php
if(!isset($titulo))
    $titulo = "Titulo";

if(!isset($itemTipo))
    $itemTipo = "item";

if(!isset($itemTipos))
    $itemTipos = "item";

if(!isset($urlNovo))
    $urlNovo = "#";

if(!isset($urlEditar))
    $urlEditar = $urlNovo;

if(!isset($urlDeletar))
    $urlDeletar = "#";

if(!isset($urlRestaurar))
    $urlRestaurar = "#";

if(!isset($ItensHeader))
    $ItensHeader = [];

if(!isset($mostrarEdicao))
    $mostrarEdicao = true;

if(!isset($mostrarExclusao))
    $mostrarExclusao = true;
    
if(!isset($nomeBotao))
    $nomeBotao = 'Novo Item';

?>

@extends('painel.layouts.painel')
@section('title', $titulo)

@section('content')

@if (isset($breadcrumb) && $breadcrumb != '' && $breadcrumb != null)    
    @component('painel.components.breadcrumb')
        @slot(
            'breadcrumb', $breadcrumb
            )
    @endcomponent
@endif

<section class="w-100 minvhtotal">
    <div class="container-fluid">
        <div class="row vertical-row-center margint20">
            <div class="col-lg-6">
                <h2 class="t-h2 c-base-blue bolder text-center-m">{{$titulo}}</h2>
            </div>
            <div class="col-lg-6 text-end text-center-m margintm20">
                <a href="{{$urlNovo}}" class="btn btn-novo-item margintm20">
                    <i class="uil uil-plus-circle"></i> {{$nomeBotao}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card margint20">
                    @include('painel.includes.view_header_table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    @foreach($ItensHeader as $item)
                                        <th class="text-start">{{$item['nome']}}</th>
                                    @endforeach
                                    <th class="text-center">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($itensIndex))
                                    @forelse($itensIndex as $item)
                                        <tr class="vertical-center">
                                            @foreach($ItensHeader as $chave)
                                                <td>
                                                    @if(!isset($chave['type']))
                                                        {{$item[$chave['index']]}}
                                                    @else
                                                        @if($chave['type'] == 'date')
                                                            @php
                                                                $data = date_create($item[$chave['index']]);
                                                                echo date_format($data,"d/m/Y H:m:i");
                                                            @endphp
                                                        @elseif($chave['type'] == 'baseEnum')
                                                            {{$chave['class']::GetString($item[$chave['index']])}}
                                                        @elseif($chave['type'] == 'money')
                                                            R$ {{ number_format($item[$chave['index']], 2, ',','.'); }}
                                                        @elseif($chave['type'] == 'imagem')
                                                            @if ($item[$chave['index']] == '' || $item[$chave['index']] == null)
                                                                <img src="{{asset('assets/img/admin/camera.svg')}}" alt="" style="height: 65px;">
                                                            @else
                                                                <img src="{{App\Utils\ArquivosStorage::GetUrlView($item[$chave['index']])}}" alt="" style="height: 65px;">
                                                            @endif
                                                        @endif
                                                    @endif
                                                </td>
                                            @endforeach
                                            <td align="center" style="width: 220px;">
                                                <div class="d-flex">
                                                    @if(isset($urlResumo))
                                                        <a href="{{$urlResumo.'/'.$item['id']}}" data-id="{{$item['id']}}" title="Resumo do {{$itemTipo}}">
                                                            <i class="far fa-file-alt"></i> Resumo
                                                        </a>
                                                    @else
                                                        <a href="{{$urlEditar.'/'.$item['id']}}" title="Editar {{$itemTipo}}" class="btn-editar">
                                                            <i class="uil uil-pen"></i> Editar
                                                        </a>
                                                    @endif
                                                        
                                                    <button data-id="{{$item['id']}}" title="Excluir {{$itemTipo}}" class="delete {{isset($_GET['trashed_only'])?'ocultar_trash':''}} btn-excluir">
                                                        <i class="uil uil-trash-alt"></i> Excluir                                                                      
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="{{count($ItensHeader)+1}}">Nenhum {{$itemTipo}} encontrado</td>
                                        </tr>
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>

                    @if(isset($itensIndex))
                        <?php
                            if($itensIndex->total() > 1) {
                                $itemTipoText = $itemTipos;
                            } else {
                                $itemTipoText = $itemTipo;
                            }
                        ?>

                        @include('painel.includes.view_paginacao', [
                            'currentPage' => $itensIndex->currentPage(),
                            'lastPage' => $itensIndex->lastPage(),
                            'total' => $itensIndex->total(),
                            'itemTipoText' => $itemTipoText
                        ])

                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@include('painel.includes.deletar')

@stop
