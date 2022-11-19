<!doctype html>
<html lang="pt-BR">
<head>
    @include('admin.includes.header')
</head>
@php
    $theme = json_decode(session('customizacao_ui'), true);
    $theme = !is_null($theme) ? $theme['tema'] : 'light';
@endphp
<body class="{{$theme}}">
    <header>
        <nav class="navbar hidden-m">
            <div class="align-menu">
                <div class="toggle-menu">
                    <a class="navbar-brand" href="{{ route('admin:home') }}">
                        <img class="logo_light" src="{{asset('assets/img/admin/logoCit.png')}}">
                    </a>
                </div>

                <div class="nav-content hidden-m">
                    {{-- @include('painel.includes.dark_mode') --}}
                    <div class="dropdown nav-user-dropdown">
                        <div class="dropdown-toggle nav-user-header" id="dropdownNavUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar">
                                <img src="{{ session('usuarioAvatar','')}}">
                            </div>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownNavUser">
                            <div class="nav-user-content">
                                <div class="avatar">
                                    <img src="{{ session('usuarioAvatar','')}}">
                                </div>
                                <div class="content">
                                    <p class="name max_line max_line_1">
                                        {{ session('usuarioNome', '') }}
                                    </p>
                                </div>
                            </div>
                            <ul>
                                <li><a href="{{route('fazer.logout')}}"><i class="uil uil-sign-out-alt"></i> Sair da Conta</a></li>
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
                    @include('admin.includes.lista_menu')
                </ul>
            </div>
        </nav>
    </header>
    <main class="dashboard">
        @include('admin.includes.sidebar')
        <div class="content content_painel">
            <div class="d-flex d-column w-100">
                @yield('content')
            </div>
        </div>
    </main>
</body>

<script>
    $('.hamburguer').on('click', function() {
		$('nav.mobile').toggleClass('open');
	});
</script>
</html>
