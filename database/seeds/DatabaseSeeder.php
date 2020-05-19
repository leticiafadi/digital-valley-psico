<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(CidadeTableSeeder::class);
        $this->call(EnderecoTableSeeder::class);
        $this->call(CursoTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(LoginTableSeeder::class);
        $this->call(ItemLoginTableSeeder::class);
        $this->call(FuncionarioTableSeeder::class);
        $this->call(AlunoTableSeeder::class);
        $this->call(SemestreTableSeeder::class);
        $this->call(InfoAlunoSemestreTableSeeder::class);
        $this->call(ContatoTableSeeder::class);
        $this->call(SemanaTableSeeder::class);
        $this->call(HorarioSemanaTableSeeder::class);
    }
}
