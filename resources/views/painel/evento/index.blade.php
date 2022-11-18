@extends('painel.includes.BaseseViews.index', [
    'pagina' => 'eventos',
    'subpagina' => 'meusEventos',
    'titulo' => 'Eventos',
    'itemTipo' => 'Evento',
    'itemTipos' => 'Eventos',
    'urlNovo' => route('evento.novo'),
    'urlEditar' => route('evento.edita', ''),
    'urlDeletar' => route('evento.api.deleta', ''),
    'nomeBotao' => 'Novo Evento',
    'ItensHeader' => 
        [
            [
                'nome' => 'Nome',
                'index' => 'nome'
            ],
    ],
    'breadcrumb' => [
        'Dashboard' => 'home.painel',
        'Eventos' => 'evento.index',
    ]
])