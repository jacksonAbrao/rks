<?php
namespace App\Http\Controllers\Web;

use App\Models\Bases\BaseModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class BaseWebController extends Controller{
    protected $model = null;
    protected $viewIndex = "";
    protected $viewNovo = "";
    protected $viewEdita = "";
    protected $filters = array();
    protected $guidempty = "00000000-0000-0000-0000-000000000000";

    public function __construct($model = null, $viewIndex = null, $viewNovo = null, $viewEdita = null, $filters = array()) {
        $this->model = $model;
        $this->viewIndex = $viewIndex;
        $this->viewNovo = $viewNovo;
        $this->viewEdita = $viewEdita;
        $this->filters = $filters;
    }

    public function ObtemItensViewNovo(Request $request){
        return Array();
    }

    public function ObtemItensViewEdita(Request $request, $id){
        return $this->ObtemItensViewNovo($request);
    }

    public function ObtemElementoEditarVisualizar(Request $request, $id){
        $retorno = null;
        if($id != $this->guidempty)
            $retorno = $this->model::Detalhado($request, $id);
        return $retorno;
    }

    public function Index(Request $request){
        if(is_array($this->filters) and count($this->filters) > 0) {
            foreach($this->filters as $key => $value) {
                $request[$key] = $value;
            }
        }
        $itensIndex = $this->model::ListagemElemento($request);
        return view( $this->viewIndex, compact('itensIndex'));
    }

    public function Novo(Request $request){
        $itensView = $this->ObtemItensViewNovo($request);
        return view( $this->viewNovo, compact('itensView'));
    }

    public function Edita(Request $request, $id = "00000000-0000-0000-0000-000000000000"){
        $item = $this->ObtemElementoEditarVisualizar($request, $id);
        $itensView = $this->ObtemItensViewEdita($request, $id);
        if(is_null($item))
            return $this->Novo($request);
        return view($this->viewEdita, compact('item', 'itensView'));
    }

    public static function ObtemDadosAPIRest(Array $filtros, $sessao, $url){
        return BaseModel::GetPadrao($filtros, $sessao, $url);
    }
}
