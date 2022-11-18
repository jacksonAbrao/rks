<?php

namespace App\Http\Controllers\Web\Painel;

use App\Http\Controllers\Api\AulaArquivosController;
use App\Http\Controllers\Web\BaseWebController;
use App\Models\Evento\Evento;
use App\Servicos\ProdutoServico;
use Illuminate\Http\Request;

class EventoController extends BaseWebController
{
    public function __construct()
    {
        parent::__construct(
            Evento::class,
            'painel.evento.index',
            'painel.evento.novo',
            'painel.evento.edita'
        );
    }

    public function ObtemItensViewNovo(Request $request) {
        return array(
            'sessao' => $request['sessao']
        );
    }

    public function ObtemItensViewEdita(Request $request, $id) {
        $retorno =  $this->ObtemItensViewNovo($request);
        return $retorno;
    }
}
