<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        @hasSection('title')
            {{config('app.name')}} - @yield('title')
        @else
            {{config('app.name')}}
        @endif
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    {{-- Estilo para plufin file upload --}}
    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('assets/css/4SeletIcons.css')}}">

    <link href="{{asset('assets/css/jquery.datetimepicker.css')}}" rel="stylesheet"/>

    {{-- Estilo de fontes ionicons
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> --}}

    <!-- summemote -->

    <link rel="stylesheet" href="{{asset('assets/css/summernote.css')}}?v=0.1">
    <script src="{{asset('assets/js/summernote.js')}}?v=0.1"></script>
    <script src="{{asset('assets/js/summernote-clear.js')}}"></script>
    


    <!-- colorpicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/monolith.min.css" />
    <script src="{{asset('assets/js/painel-novo/colorPicker.js')}}?v=1.0"></script>

    {{-- Estilos Datatables --}}
    <link href="{{asset('assets/css/dataTables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dataTables/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dataTables/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dataTables/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dataTables/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/default.css')}}?v=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/painel/main.css')}}?v=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('assets/js/validator.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.maskMoney.js')}}"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js" integrity="sha512-nKZDK+ztK6Ug+2B6DZx+QtgeyAmo9YThZob8O3xgjqhw2IVQdAITFasl/jqbyDwclMkLXFOZRiytnUrXk/PM6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/js/plugins/piexif.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/js/plugins/sortable.min.js" type="text/javascript"></script>


    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/js/fileinput.min.js"></script>

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.7/js/locales/pt-BR.js"></script>

    <script src="{{asset('assets/js/jquery.datetimepicker.js')}}?v=1.0"></script>

    <script src="{{asset('assets/js/requisicaoformulario.js')}}?v=1.0"></script>

    {{-- Scripts Datatables --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/sp-1.0.1/datatables.min.js"></script> --}}

    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/sp-1.0.1/datatables.min.js"></script>
    <script type="text/javascript" src="{{asset('assets/js/datatables/buttons.html5.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    
    
    <!-- --------- Crop Images --------- -->
    <script src="{{asset('assets/js/painel/crop_image.js')}}"></script>
    <link rel="stylesheet" href="{{'assets/css/crop_image.css'}}">

    <script src="{{asset('assets/js/painel/main.js')}}?v=1.4"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
    
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <meta name="format-detection" content="telephone=no">

    @yield('headeradcional')
</head>

@php
    $theme = json_decode(session('customizacao_ui'), true);
    if(!is_null($theme)) {
        $theme = $theme['tema'];
    } else {
        $theme = 'light';
    }

    // dd($theme);
@endphp


<body class="{{$theme}}">

@php
  $mostaracoes = (intval(session('aprovado_venda')) == 2);
@endphp

<nav class="navbar navbar-expand-lg w-100 hidden-m">
    <div class="align-menu">
        <div class="toggle-menu">
            <a class="navbar-brand" href="{{ route('home.painel') }}">
                <img class="logo_light" src="{{asset('assets/img/logos/Colorida-black.png')}}">
                {{-- <img class="logo_dark" src="{{asset('assets/img/logos/Colorida-Offwhite.png')}}"> --}}
            </a>
        </div>

        <div class="nav-content">
            {{-- @include('painel.includes.dark_mode') --}}
            <div class="dropdown nav-user-dropdown">
                <div class="dropdown-toggle nav-user-header" id="dropdownNavUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar">
                        @if(Session::has('usuarioAvatar') && urlExists(Session::get('usuarioAvatar')))
                            <img src="{{ Session::get('usuarioAvatar')}}">
                        @endif
                    </div>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownNavUser">
                    <div class="nav-user-content">
                        @if(Session::has('usuarioAvatar') && urlExists(Session::get('usuarioAvatar')))
                            <img src="{{ Session::get('usuarioAvatar')}}">
                        @endif
                        <div class="content">
                            <p class="name max_line max_line_1">
                                @if(Session::has('usuarioNome'))
                                    {{ Session::get('usuarioNome')}}
                                @endif
                            </p>
                            <p class="email max_line max_line_1 max_line_block">
                                @if(Session::has('usuarioEmail'))
                                    {{ Session::get('usuarioEmail')}}
                                @endif
                            </p>
                        </div>
                    </div>
                    <ul>
                        <li><a href="{{route('fazer.logout.painel')}}"><i class="uil uil-sign-out-alt"></i> Sair da Conta</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<nav class="visible-m mobile">
    <div class="container">
        <a class="logo navbar-brand" href="{{route('home.painel')}}">
            {{-- <img class="logo_light" src="{{asset('assets/img/logos/Colorida-black.png')}}"> --}}
            <img class="logo_dark" src="{{asset('assets/img/logos/Colorida-Offwhite.png')}}">
        </a>
        <div class="menu-darkmode-mobile">
            {{-- @include('painel.includes.dark_mode') --}}
            <div class="hamburguer">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </div>
    <div class="dropdown-mobile accordion sidebar-accordion">
        <ul>
            <li class="c-white link-sidebar acordeao <?php if(isset($pagina) && $pagina == 'perfil') : echo 'active'; endif ;?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
                    <div class="auxiliar">
                        <i class="uil uil-user"></i>
                    </div>
                    <p class="t-link">Perfil</p>
                </button>
            </li>
            <div class="accordion-item">
                <div id="collapseZero" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent=".sidebar-accordion">
                    <div class="accordion-body">
                        <ul>
                            <li class="c-white link-sidebar  <?php if(isset($subpagina) && $subpagina == 'logout') : echo 'active'; endif ;?>">
                                <a href="{{ route('fazer.logout') }}">
                                    <div class="auxiliar">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                    <p class="t-link">Sair da Conta</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @include('painel.includes.lista_menu')
        </ul>
    </div>
</nav>

<script>
    $('.hamburguer').on('click', function() {
		$('nav.mobile').toggleClass('open');
	});
</script>