<?php
namespace App\Models\Enuns\Evento;

use App\Models\Enuns\BaseEnum;

class TipoIngresso extends BaseEnum
{
    protected $enumeradores = [
        'normal' => 'Normal',
        'gratuidade' => 'Gratuidade',
        'cortesia' => 'Cortesia',
        'promocional' => 'Promocional',
        'crianca' => 'Criança',
        'patrocionador' => 'Patrocionador',
        'feminino' => 'Feminino',
        'meia' => 'Meia'
    ];

    const Normal = 'normal';
    const Gratuidade = 'gratuidade';
    const Cortesia = 'cortesia';
    const Promocional = 'promocional';
    const Crianca = 'crianca';
    const Patrocionador = 'patrocionador';
    const Feminino = 'feminino';
    const Meia = 'meia';
}