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
        factory(Aluno::class, 150)->create();
    }
}
