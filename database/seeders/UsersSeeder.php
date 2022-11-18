<?php

namespace Database\Seeders;

use App\Models\Grupo;
use App\Models\Relacionamentos\UsuarioGrupo;
use App\Models\User;
use App\Utils\EnvConfig;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
    public function run()
    {
        $usuario = User::create(Array(
            'username' => 'kame',
            'name' => "kame",
            'email' => "lucassalvino1@gmail.com",
            'path_avatar' => User::$pathAvatarPadrao,
            'password' => hash(EnvConfig::HashSenha(), 'Mudar@1234!')
        ));
        
        $jackson = User::create(Array(
            'username' => 'Jackson',
            'name' => "Jackson",
            'email' => "jackson.comp1681@hotmail.com",
            'path_avatar' => User::$pathAvatarPadrao,
            'password' => hash(EnvConfig::HashSenha(), '123456')
        ));

        $wylker = User::create(Array(
            'username' => 'wylker',
            'name' => "Wylker Moreno da Silva",
            'email' => "wylkerxpz@gmail.com",
            'path_avatar' => User::$pathAvatarPadrao,
            'password' => hash(EnvConfig::HashSenha(), '593943')
        ));

        $grupoAdmin = Grupo::create(Array(
            'nome' => "Administradores",
            'slug' => "administradores"
        ));

        UsuarioGrupo::create(Array(
            'grupo_id' => $grupoAdmin->id,
            'usuario_id' => $usuario->id
        ));

        UsuarioGrupo::create(Array(
            'grupo_id' => $grupoAdmin->id,
            'usuario_id' => $wylker->id
        ));

        UsuarioGrupo::create(Array(
            'grupo_id' => $grupoAdmin->id,
            'usuario_id' => $jackson->id
        ));
    }
}