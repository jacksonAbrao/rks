<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Servicos\LoginServico;
use App\Utils\BaseRetornoApi;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerificaSessao{

    public function handle($request, Closure $next){
        $token = $request->header('Authorization');
        $sessao = LoginServico::ObtemSessao($token);
        if(isset($sessao)){
            $user = User::find($sessao['user_id']);
            Auth::login($user);
            $request->setUserResolver(function () use ($user) {
                return $user;
            });
            return $next($request->merge(['sessao'=>$sessao]));
        }else{
            return BaseRetornoApi::GetRetornoNaoAutorizado("Esse token não existe ou já foi deslogado");
        }
    }
}