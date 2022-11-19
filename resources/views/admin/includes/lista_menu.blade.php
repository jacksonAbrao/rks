@php
    if (!isset($pagina)) {   
        $pagina = '';
    }
    if (!isset($subpagina)) {   
        $subpagina = '';
    }
@endphp
@component('painel.components.sidebar.item_lista', ['pagina' => $pagina, 'subpagina' => $subpagina])
    @slot(
        'itemLista',
        [
            'nome' => 'Usuários',
            'slug' => 'usuarios',
            'icon' => '<i class="fas fa-users"></i>',
            'itensAccordion' => [
                [
                    'nome' => 'Usuários',
                    'slug' => 'usuarios',
                    'url' => 'admin:usuario.index'
                ],
                [
                    'nome' => 'Grupos',
                    'slug' => 'grupos',
                    'url' => 'admin:grupousuarios.index'
                ],
                [
                    'nome' => 'Permissões',
                    'slug' => 'permicoes',
                    'url' => 'admin:construindo'
                ],
            ]
        ]);
@endcomponent
@component('painel.components.sidebar.item_lista', ['pagina' => $pagina, 'subpagina' => $subpagina])
    @slot(
        'itemLista',
        [
            'nome' => 'CMS',
            'slug' => 'cms',
            'icon' => '<i class="fas fa-globe"></i>',
            'itensAccordion' => [
                [
                    'nome' => 'SEO',
                    'slug' => 'seo',
                    'url' => 'admin:home.seo'
                ],
                [
                    'nome' => 'Banners',
                    'slug' => 'banners',
                    'url' => 'admin:cms.banner'
                ],
            ]
        ]);
@endcomponent
@component('painel.components.sidebar.item_lista', ['pagina' => $pagina, 'subpagina' => $subpagina])
    @slot(
        'itemLista',
        [
            'nome' => 'Configurações',
            'slug' => 'configuracoes',
            'icon' => '<i class="fas fa-tools"></i>',
            'itensAccordion' => [
                [
                    'nome' => 'API Key',
                    'slug' => 'apiKey',
                    'url' => 'admin:tokenapi.index'
                ],
            ]
        ]);
@endcomponent
@component('painel.components.sidebar.item_lista', ['pagina' => $pagina, 'subpagina' => $subpagina])
    @slot(
        'itemLista',
        [
            'nome' => 'Monitoramento Servidor',
            'slug' => 'monitoramentoServidor',
            'icon' => '<i class="fas fa-cogs"></i>',
            'itensAccordion' => [
                [
                    'nome' => 'Cache',
                    'slug' => 'cache',
                    'url' => 'admin:monitora-cache'
                ],
            ]
        ]);
@endcomponent
{{-- @component('painel.components.sidebar.item_lista', ['pagina' => $pagina, 'subpagina' => $subpagina])
    @slot(
        'itemLista',
        [
            'nome' => 'Eventos',
            'slug' => 'evento',
            'icon' => '<i class="uil uil-setting"></i>',
            'url' => 'evento.index'
        ]);
@endcomponent --}}