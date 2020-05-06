<?php

use App\Models\curso\Curso;
use Illuminate\Database\Seeder;

class CursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursos = [
            "Engenharia de Software",
            "Ciencia da Computação",
            "Engenharia de Produção",
            "Engenharia Civil",
            "Engenharia Mecanica"
        ];
        for($i=0;$i<count($cursos);$i++)
            Curso::create([
                "nome" => $cursos[$i],
                "ativo" => 1
            ]);
    }
}
