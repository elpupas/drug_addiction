<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AlcoholAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $respuestas = [
            // Respuestas para la primera pregunta sobre frecuencia con sus puntajes
            [
                ['respuesta' => 'Never', 'score' => 0],
                ['respuesta' => 'Monthly or less', 'score' => 1],
                ['respuesta' => '2–4 times a month', 'score' => 2],
                ['respuesta' => '2 to 3 times a week', 'score' => 3],
                ['respuesta' => '4 times a week or more', 'score' => 4],
            ],
            // Respuestas para la segunda pregunta sobre cantidad con sus puntajes
            [
                ['respuesta' => '1 or 2', 'score' => 0],
                ['respuesta' => '3 or 4', 'score' => 1],
                ['respuesta' => '5 or 6', 'score' => 2],
                ['respuesta' => '7 or 8', 'score' => 3],
                ['respuesta' => '10 or more', 'score' => 4],
            ],
            [
                ['respuesta' => 'Never', 'score' => 0],
                ['respuesta' => 'Less than monthly', 'score' => 1],
                ['respuesta' => 'Monthly', 'score' => 2],
                ['respuesta' => 'Weekly', 'score' => 3],
                ['respuesta' => 'Daily or almost daily', 'score' => 4],
            ],
            [
                ['respuesta' => 'Never', 'score' => 0],
                ['respuesta' => 'Less than monthly', 'score' => 1],
                ['respuesta' => 'Monthly', 'score' => 2],
                ['respuesta' => 'Weekly', 'score' => 3],
                ['respuesta' => 'Daily or almost daily', 'score' => 4],
            ],
            [
                ['respuesta' => 'Never', 'score' => 0],
                ['respuesta' => 'Less than monthly', 'score' => 1],
                ['respuesta' => 'Monthly', 'score' => 2],
                ['respuesta' => 'Weekly', 'score' => 3],
                ['respuesta' => 'Daily or almost daily', 'score' => 4],
            ],
            [
                ['respuesta' => 'Never', 'score' => 0],
                ['respuesta' => 'Less than monthly', 'score' => 1],
                ['respuesta' => 'Monthly', 'score' => 2],
                ['respuesta' => 'Weekly', 'score' => 3],
                ['respuesta' => 'Daily or almost daily', 'score' => 4],
            ],
            [
                ['respuesta' => 'Never', 'score' => 0],
                ['respuesta' => 'Less than monthly', 'score' => 1],
                ['respuesta' => 'Monthly', 'score' => 2],
                ['respuesta' => 'Weekly', 'score' => 3],
                ['respuesta' => 'Daily or almost daily', 'score' => 4],
            ],
            [
                ['respuesta' => 'Never', 'score' => 0],
                ['respuesta' => 'Less than monthly', 'score' => 1],
                ['respuesta' => 'Monthly', 'score' => 2],
                ['respuesta' => 'Weekly', 'score' => 3],
                ['respuesta' => 'Daily or almost daily', 'score' => 4],
            ],
            [
                ['respuesta' => 'No', 'score' => 0],
                ['respuesta' => 'Yes, but not in the last year', 'score' => 2],
                ['respuesta' => 'Yes, during the last year', 'score' => 4],
               
            ],
            [
                ['respuesta' => 'No', 'score' => 0],
                ['respuesta' => 'Yes, but not in the last year', 'score' => 2],
                ['respuesta' => 'Yes, during the last year', 'score' => 4],
               
            ],

        ];
       
            
        $preguntaIDs = DB::table('alcohol_questions')->pluck('id')->toArray();

        foreach ($respuestas as $indice => $respuestasPorPregunta) {
            foreach ($respuestasPorPregunta as $respuesta) {
                if (isset($preguntaIDs[$indice])) {
                    DB::table('alcohol_answers')->insert([
                        'answer' => $respuesta['respuesta'],
                        'question_id' => $preguntaIDs[$indice],
                        'score' => $respuesta['score'],
                    ]);
                } else {
                    break;
                }
            }
        }
    }
    
}
