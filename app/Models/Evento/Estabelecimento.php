<?php
namespace App\Models\Evento;

use App\Models\Bases\BaseModel;

Class Estabelecimento extends BaseModel{
    protected $table = 'estabelecimento';
    protected $fillable = [
        'id', 'nome', 'capacidade', 'path_mapa', 'endereco_id'
    ];

    public function GetValidadorCadastro($request){
        return [
            'nome' => 'required|max:255',
            'capacidade' => 'required|integer',
            'path_mapa' => 'max:300',
            'endereco_id' => 'exists:endereco,id'
        ];
    }
}