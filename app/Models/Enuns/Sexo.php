<?php
namespace App\Models\Enuns;

class Sexo extends BaseEnum
{
    protected $enumeradores = [
        'masculino' => 'Masculino',
        'feminino' => 'Feminino',
        'outro' => 'Outro',
        'unissex' => 'Unissex',
        'naodefinido' => 'Não definido'
    ];

    const Masculino = 'masculino';
    const Feminino = 'feminino';
    const Outro = 'outro';
    const Unissex = 'unissex';
    const NaoDefinido = 'naodefinido';
}