@php
    if(count($breadcrumb) > 1) {
        $routeVoltar = count($breadcrumb) - 2;
        $voltar = $breadcrumb[array_keys($breadcrumb)[$routeVoltar]];
    }
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card margint20 margintm100">
                <nav class="breadcrumb-container" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @foreach($breadcrumb as $nome => $rota)
                            @if(end($breadcrumb) == $rota)
                                <li class="breadcrumb-item active">
                                    {{$nome}}
                                </li>
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{route($rota)}}">{{$nome}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ol>
                    @if(isset($voltar))
                        <a href="{{route($voltar)}}" class="btn btn-grey margintm10"><i class="uil uil-arrow-left"></i> Voltar</a>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</div>
