<?php 
namespace App\Servicos\Evento;

use App\Models\Evento\Evento;
use App\Models\Pessoa\Endereco;
use App\Utils\BaseRetornoApi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoServico{
    function __construct(){
    }
    public function CadastraEvento(Request $request){
        try{
            DB::beginTransaction();
            $requisicao = $request->all();
            if(!is_null($request->get('endereco'))){
                $retornoEndereco = Endereco::CadastraElementoArray($request->get('endereco'));
                if(!Endereco::VerificaRetornoSucesso($retornoEndereco)){
                    return Endereco::GeraErro($retornoEndereco);
                }
            }
            if(isset($retornoEndereco)){
                $requisicao['endereco_id'] = $retornoEndereco;
            }
            $retornoEvento = Evento::CadastraElementoArray($requisicao);
            if(!Evento::VerificaRetornoSucesso($retornoEvento)){
                return Evento::GeraErro($retornoEvento);
            }
            DB::commit();
            return BaseRetornoApi::GetRetornoSucessoId("Evento Criado com sucesso", $retornoEvento);
        }catch(Exception $erro){
            DB::rollBack();
            return BaseRetornoApi::GetRetornoErroException($erro);
        }
    }

    public function AtualizaEvento(Request $request, $id){
        try{
            DB::beginTransaction();
            $atualizacao = Evento::AtualizaElemento($request, $id);
            if(!Evento::VerificaRetornoSucesso($atualizacao)){
                return $atualizacao;
            }
            if(!is_null($request->get('endereco'))){
                $enderecoId = Evento::query()->where('id', '=', $id)->first(['endereco_id']);
                $rend = null;
                if($enderecoId && !is_null($enderecoId->endereco_id)){
                    $ende = Endereco::query()->where('id', '=', $enderecoId->endereco_id)->first();
                    $rend = Endereco::AtualizaElementoArray($request->get('endereco'), $ende);
                }else{
                    $rend = Endereco::CadastraElementoArray($request->get('endereceo'));
                    if(Endereco::VerificaRetornoSucesso($rend)){
                        $evento = Evento::query()->where('id', '=', $id)->first();
                        $evento->endereco_id = $rend;
                        $evento->save();
                    }
                }
                if(!Endereco::VerificaRetornoSucesso($rend)){
                    return Endereco::GeraErro($rend);
                }
            }
            DB::commit();
            return $atualizacao;
        }catch(Exception $erro){
            DB::rollBack();
            return BaseRetornoApi::GetRetornoErroException($erro);
        }
    }
}