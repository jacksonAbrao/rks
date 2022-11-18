<?php
namespace App\Models\Evento;

use App\Models\Bases\BaseModel;

Class EventoIngresso extends BaseModel{
    protected $table = 'evento_ingresso';
    protected $fillable = [
        'id', 'nome', 'quantidade', 'comprimento_codigo_barras', 'valor',
        'sexo', 'tipo_ingresso', 'inicio_vendas', 'fim_vendas', 'permitir_compra',
        'taxa_conveniencia_ativa', 'exige_cpf', 'quantidade_por_usuario',
        'quantidade_por_usuario_pdv', 'quantidade_entradas_permitidas',
        'necessario_aprovacao_imagem', 'order', 'evento_id'
    ];
}