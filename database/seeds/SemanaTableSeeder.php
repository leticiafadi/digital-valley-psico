<?php

use Carbon\Carbon;
use App\Models\usuarios\Usuario;
use App\Models\horarios\Semana;
use Illuminate\Database\Seeder;

class SemanaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionario = Usuario::where("tipo", 'funcionario')->first()->id;
        $anoAtual = Carbon::now();
        $proximoAno = Carbon::createFromDate($anoAtual->year, 1, 1)->addYear();
        $semana = Carbon::createFromDate($anoAtual->year,1,1);
        while($semana->isBefore($proximoAno)){
            Semana::create([
                'ano' => $anoAtual->year,
                'numero_semana' => $semana->format('W'),
                'data_inicio' => $semana->startOfWeek()->format('Y-m-d'),
                'id_funcionario' => $funcionario
            ]);
            $semana->addWeek();
        }
    }
}
