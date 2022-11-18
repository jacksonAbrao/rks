<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Servicos\LoginServico;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerificaSessaoWeb{
    public function handle($request, Closure $next){
        $token = session('Authorization', '');
        $sessao = LoginServico::ObtemSessao($token);
        if(isset($sessao)){
            $user = User::find($sessao['user_id']);
            Auth::login($user);
            $request->setUserResolver(function () use ($user) {
                return $user;
            });
            return $next($request->merge(['sessao'=>$sessao]));
        }else{
            return redirect()->route('site.login');
        }
    }
}