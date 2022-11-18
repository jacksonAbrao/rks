<?php

namespace App\Http\Controllers\Api\Evento;

use App\Http\Controllers\Controller;
use App\Models\Bases\IAPIController;
use App\Models\Evento\Evento;
use App\Servicos\Evento\EventoServico;
use Illuminate\Http\Request;

/**
 * @group Evento
 *
 * Endponits para gestão de eventos
 */
class EventoAPIController extends Controller implements IAPIController
{
    private $servico = null;
    function __construct(){
        $this->servico = new EventoServico();
    }

    /**
     * Atualiza Evento
     * @authenticated
     */
    function Atualiza(Request $request, $id){
        return $this->servico->AtualizaEvento($request, $id);
    }

    /**
     * Realiza o cadastro do evento
     * 
     * @response Retornos padrões
     */
    function Cadastra(Request $request){
        return $this->servico->CadastraEvento($request);
    }

    /**
     * Obtem Listagem de eventos
     * Possui todos os filtros padrão
     * 
     * @response padrões
     * 
     * @authenticated
     */
    function Listagem(Request $request){
        return Evento::ListagemElemento($request);
    }

    /**
     * Obtem Visualizao unica de evento
     * 
     * @authenticated
     */
    public function Detalhado(Request $request, $id){
        return  Evento::Detalhado($request, $id);
    }

    /**
     * Move o evento para a lixeira
     */
    function Deleta(Request $request, $id){
        return Evento::DeleteElemento($request, $id);
    }

    /**
     * Remove evento da lixeira
     */
    function Restaura(Request $request, $id){
        return Evento::RestoreElemento($request, $id);
    }

    public function ClonarRegistro (Request $request, $id){
        return Evento::ClonaRegistro($request, $id);
    }
}
