@extends('painel.layouts.painel')
@section('title', $titulo)

@section('content')

@php
    if(!isset($tabs) || $tabs == false){
        $tabs = false;
        $textoBotao = "Salvar";
        $textoCancelar = "Cancelar";
        $urlBack = "";
        $urlRedirect = "";
    }
@endphp

@if (isset($breadcrumb) && $breadcrumb != '' && $breadcrumb != null)    
    @component('painel.components.breadcrumb')
        @slot(
            'breadcrumb', $breadcrumb
            )
    @endcomponent
@endif

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row vertical-row-center margint20">
                    @if (isset($urlVisualizacao) && $urlVisualizacao != '')
                        <div class="col-lg-6">
                            <p class="t-h2 bolder c-base-blue text-start text-center-m">{{$titulo}}</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-end text-center-m">
                                <a href="{{$urlVisualizacao}}" class="btn margintm20"><i class="far fa-eye"></i> {{$nomeVisualizacao}}</a>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12">
                            <p class="margint20 t-h2 bolder c-base-blue text-center">{{$titulo}}</p>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card margint20">
                            @if ($tabs == false)
                                <form class="w-100 formFieldNormal formValidate formAjax" action="{{$urlSubmit}}" method="{{$verboSubmissao}}"
                                enctype="multipart/form-data" data-redirect="{{$urlRedirect}}" data-msgsuccess="{{$msgSuccess}}"
                                data-Authorization="{{session('Authorization','')}}">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @yield('input_form')
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex space-between">
                                                <a href="{{$urlBack}}" class="btn btn-grey">{{ $textoCancelar }}</a>
                                                <button type="submit" class="btn">{{ $textoBotao }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @else
                                @yield('input_form')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
