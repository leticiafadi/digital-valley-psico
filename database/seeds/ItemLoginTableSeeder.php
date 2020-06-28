<?php

use App\Models\usuarios\ItemLogin;
use App\Models\usuarios\Usuario;
use App\Models\usuarios\Login;
use Illuminate\Database\Seeder;

class ItemLoginTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionario = Usuario::where("tipo", 'funcionario')->first()->id;
        ItemLogin::create([
            "usuario" => "11/22112",
            'id_login' => Login::where("id_usuario", $funcionario)->first()->id
        ]);
        ItemLogin::create([
            "usuario" => "1234567",
            'id_login' => Login::where("id_usuario", $funcionario)->first()->id
        ]);
        ItemLogin::create([
            "usuario" => "usuario",
            'id_login' => Login::where("id_usuario", $funcionario)->first()->id
        ]);
    }
}
