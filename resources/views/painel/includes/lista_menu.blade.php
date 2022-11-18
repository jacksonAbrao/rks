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
            'nome' => 'Eventos',
            'slug' => 'eventos',
            'icon' => '<i class="uil uil-calendar-alt"></i>',
            'itensAccordion' => [
                [
                    'nome' => 'Novo Evento',
                    'slug' => 'novoEvento',
                    'url' => 'evento.novo'
                ],
                [
                    'nome' => 'Meus Eventos',
                    'slug' => 'meusEventos',
                    'url' => 'evento.index'
                ]
            ]
        ]);
@endcomponent
@component('painel.components.sidebar.item_lista', ['pagina' => $pagina, 'subpagina' => $subpagina])
    @slot(
        'itemLista',
        [
            'nome' => 'Eventos',
            'slug' => 'evento',
            'icon' => '<i class="uil uil-setting"></i>',
            'url' => 'evento.index'
        ]);
@endcomponent