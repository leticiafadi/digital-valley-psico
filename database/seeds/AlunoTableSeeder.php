<?php

use App\Models\aluno\Aluno;
use App\Models\usuarios\Usuario;
use App\Models\curso\Curso;
use Illuminate\Database\Seeder;

class AlunoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aluno = Usuario::where("tipo", 'aluno')->first()->id;
        $cursos = (array) Curso::all();
        $key = array_rand($cursos);
        $curso = $cursos[$key][array_rand($cursos[$key])];
        Aluno::create([
            "matricula" => '123456',
            "semestre_matricula" => '2018.1',
            'id_curso' => $curso->id,
            'id_usuario' => $aluno
        ]);
    }
}
