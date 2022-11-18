<?php
namespace App\Models\Enuns\Evento;

use App\Models\Enuns\BaseEnum;

class StatusEvento extends BaseEnum
{
    protected $enumeradores = [
        // 'novo' => 'Novo',
        'rascunho' => 'Rascunho',
        'vendendo' => 'Vendendo',
        'fechado' => 'Fechado',
        'cancelado' => 'Cancelado'
    ];

    // const Novo = 'novo';
    const Rascunho = 'rascunho';
    const Vendendo = 'vendendo';
    const Fechado = 'fechado';
    const Cancelado = 'cancelado';
}