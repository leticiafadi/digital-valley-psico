<?php

use Carbon\Carbon;
use App\Models\horarios\Semana;
use App\Models\horarios\HorarioSemana;
use Illuminate\Database\Seeder;

class HorarioSemanaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semanas = Semana::all();
        $horarios = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'];
        foreach ($semanas as $semana) {
            $dia = Carbon::createFromFormat('Y-m-d', $semana->data_inicio);
            while (!$dia->isSaturday()) {
                foreach ($horarios as $horario) {
                    HorarioSemana::create([
                        'dia' => $dia->format('Y-m-d'),
                        'horario' => $horario,
                        'id_semana' => $semana->id
                    ]);
                }
                $dia->addDay();
            }
        }
    }
}
