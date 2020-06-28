<?php

use Illuminate\Database\Seeder;
use App\Models\usuarios\Login;
use App\Models\usuarios\Usuario;

class LoginTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Login::create([
            "senha" => "senha1234",
            'id_usuario' => Usuario::where("tipo", 'funcionario')->first()->id
        ]);
    }
}
