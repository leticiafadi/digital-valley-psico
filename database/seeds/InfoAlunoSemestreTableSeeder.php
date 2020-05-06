<?php

use App\Models\semestre\Semestre;
use App\Models\semestre\InfoSemestre;
use App\Models\aluno\Aluno;
use Illuminate\Database\Seeder;

class InfoAlunoSemestreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aluno = Aluno::first();
        $semestre = Semestre::first();
        InfoSemestre::create([
            "id_aluno" => $aluno->id,
            "id_semestre" => $semestre->id,
            "estado_civil" => "solteiro",
            "reside_com" => "sozinho",
            "reside_outros" => "não",
            "formacao_escolar" => "publica",
            "turno" => "integral",
            "semestre_atual" => "5",
            "forma_ingresso" => "cotas",
            "tipo_cotas" => "2",
            "cursos_concluidos" => "nenhum",
            "cursos_andamento" => "um",
            "possui_auxilio" => "0",
            "tipo_auxilio" => "nenhum",
            "possui_bolsa" => "0",
            "tipo_bolsa" => "nenhuma",
            "possui_filhos" => "1",
        ]);
    }
}