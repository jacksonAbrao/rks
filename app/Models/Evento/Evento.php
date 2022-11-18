<?php
namespace App\Models\Evento;

use App\Models\Bases\BaseModel;
use App\Models\Enuns\Evento\StatusEvento;
use App\Rules\ValidaEnum;
use App\Utils\AuxCarbon;
use Illuminate\Support\Facades\Auth;

Class Evento extends BaseModel{
    protected $table = 'evento';
    protected $fillable = [
        'id', 'nome', 'descricao', 'data_evento', 'inicio_vendas', 'fim_vendas',
        'tipos_pagamento', 'quantidade_parcelas', 'taxa_conveniencia', 
        'quantidade_por_usuario', 'status', 'path_imagem', 'palavras_chave',
        'estabelecimento_id', 'usuario_id', 'endereco_id'
    ];

    public function GetValidadorCadastro($request){
        return [
            'nome' => 'required|max:300',
            'descricao' => '',
            'data_evento' => 'date|after:now',
            'inicio_vendas' => 'date|before:data_evento',
            'fim_vendas' => 'date|after:inicio_vendas|before_or_equal:data_evento',
            'tipos_pagamento' => '',
            'quantidade_parcelas' => 'integer|max:12|min:1',
            'taxa_conveniencia' => 'numeric|max:100|min:0',
            'quantidade_por_usuario' => 'integer|min:1',
            'status' => ['required', new ValidaEnum(StatusEvento::class)],
            'path_imagem' => 'max:300',
            'estabelecimento_id' => 'exists:estabelecimento,id',
            'endereco_id' => 'exists:endereco,id',
            'usuario_id' => 'exists:users,id',
        ];
    }

    public function NormalizaDados(&$dados, $atualizacao = false){
        if(array_key_exists('sessao', $dados) && !$atualizacao && !array_key_exists('usuario_id', $dados)){
            $dados['usuario_id'] = Auth::id();
        }
        $formatdata = ['data_evento', 'inicio_vendas', 'fim_vendas'];
        foreach($formatdata as $form){
            if(array_key_exists($form, $dados)){
                $dados[$form] = AuxCarbon::ObtenhaDataTimeBanco($dados[$form]);
            }
        }

        if(array_key_exists('tipos_pagamento', $dados)){
            $dados['tipos_pagamento'] = json_encode($dados['tipos_pagamento']);
        }
        
        if(!array_key_exists('status', $dados)){
            $dados['status'] = StatusEvento::Rascunho;
        }

        if(array_key_exists('path_imagem_base64', $dados) && array_key_exists('path_imagem_tipo', $dados)){
            $dados['path_imagem'] = Evento::SalvaImagem(
                $dados['path_imagem_base64'],
                $dados['path_imagem_tipo'],
                isset($dados['usuario_id']) ? $dados['usuario_id'] : null
            );
        }
    }
}