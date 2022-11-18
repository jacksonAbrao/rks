<?php
if(!isset($titulo))
    $titulo = "Titulo";

if(!isset($urlSubmit))
    $urlSubmit = "#";

if(!isset($urlBack))
    $urlBack = "#";

if(!isset($textoBotao))
    $textoBotao = "Cadastrar";

if(!isset($verboSubmissao))
    $verboSubmissao = 'POST';

if(!isset($exibirBtnSbmit))
    $exibirBtnSbmit = true;

if(!isset($exibirBtnBack))
    $exibirBtnBack = true;

if(!isset($redirect))
    $redirect = '';

if(!isset($msgSuccess)) {
    $msgSuccess = '';
}

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

<section class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <p class="t-h2 bolder text-center c-base-blue margint20">{{$titulo}}</p>
                <div class="card margint20">
                    <form class="w-100 formFieldNormal formValidate formAjax" action="{{$urlSubmit}}" method="{{$verboSubmissao}}"
                        enctype="multipart/form-data" data-onsubmit data-back data-redirect="{{$redirect}}" data-msgsuccess="{{$msgSuccess}}"
                        data-redirectid="{{$redirectId}}"
                        data-Authorization="{{session('Authorization','')}}">
                        @yield('input_form')
                        @if($exibirBtnSbmit)
                            <div class="row vertical-row-center">
                                <div class="col-6">
                                    @if($urlBack != "#")
                                        <a class="btn btn-grey" href="{{$urlBack}}">Cancelar</a>
                                    @endif
                                </div>
                                <div class="col-6 text-end">
                                    <button type="submit" id="btn-submit" class="btn btn-primary pl-4 pr-4"> {{ $textoBotao }} </button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
