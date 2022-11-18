<?php

namespace App\Http\Middleware;

use App\Servicos\LoginServico;
use Closure;

class VerificaSessaoWebPainel{
    
    public function handle($request, Closure $next){
        $token = session('Authorization', '');
        $sessao = LoginServico::ObtemSessao($token);
        
        if(isset($sessao)){
            if(LoginServico::UsuarioAdmin($sessao)){
                return $next($request->merge(['sessao' => $sessao]));
            }else{
                return redirect()->route('login.painel');    
            }
        }else{
            return redirect()->route('login.painel');
        }
    }
}