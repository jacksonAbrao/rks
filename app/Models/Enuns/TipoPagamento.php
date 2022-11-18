<?php
namespace App\Models\Enuns;

class TipoPagamento extends BaseEnum
{
    protected $enumeradores = [
        'pix' => 'PIX',
        'cartao_credito' => 'Cartão de Crédito',
        'boleto' => 'Boleto'
    ];

    const PIX = 'pix';
    const CartaoCredito = 'cartao_credito';
    const Boleto = 'boleto';
}