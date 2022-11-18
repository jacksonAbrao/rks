<?php

namespace App\Http\Controllers\Web\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Login;
use App\Servicos\LoginServico;
use App\Utils\BaseRetornoApi;

class PainelController extends Controller {

    public function Home(Request $request){
        $teste = 'To aqui';

        return view('painel.home', compact('teste'));
    }

    public function login(Request $request){
        $token = session('Authorization', '');
        $sessao = LoginServico::ObtemSessao($token);
        if($sessao){
            return redirect()->route('home.painel');
        }
        return view('painel.login');
    }

    public function RealizarLogin(Request $request){
        $login = Login::Login($request);
        if($login->original[BaseRetornoApi::$CampoErro]){ // login incorreto
            return view('painel.login', Array('retorno'=>$login->original));
        }else{
            $request->session()->put('Authorization', $login->original['api_token']);
            $request->session()->put('usuarioNome', $login->original['name']);
            $request->session()->put('usuarioEmail', $login->original['email']);
            $request->session()->put('usuarioAvatar', $login->original['path_avatar']);
            return redirect()->route('home.painel');
        }
    }

    public function RealizarLogout(Request $request) {
        $token = session('Authorization', '');
        Login::LogoutToken($token);
        return redirect()->route('login.painel');
    }

    public function teste(Request $request) {
        return view('painel.eventos.edita');
    }
}
