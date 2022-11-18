@extends('painel.layouts.painel')
@section('title', 'Painel')

@section('content')
@component('painel.components.breadcrumb')
    @slot(
        'breadcrumb', 
        [
            'Dashboard' => 'fazer.login.painel',
            'Carteira' => 'home.painel'
        ]);
@endcomponent
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center bolder t-h2 margint20 c-base-blue">Dashboard</h2>
        </div>
    </div>
</div>

@endsection