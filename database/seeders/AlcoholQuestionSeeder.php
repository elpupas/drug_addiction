<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AlcoholQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preguntas = [
            'How often do you have a drink containing alcohol?',
            'How many standard drinks do you have on a day when you are drinking?',
            'How often do you have 6 or more standard drinks on one occasion?',
            'How often during the last year have you found that you were not able to stop drinking once you had started?',
            'How often during the last year have you failed to do what was normally expected of you because of your drinking?',
            'How often during the last year have you needed a drink in the morning to get you going after a heavy drinking session?',
            'How often during the last year have you had a feeling of guilt or regret after drinking?',
            'How often during the last year have you been unable to remember what happened the night before because you had been drinking?',
            'Have you or someone else been injured as a result of your drinking?',
            'Has a friend, relative, doctor or other health worker been concerned about your drinking or suggested you cut down?'

        ];

        foreach ($preguntas as $pregunta) {
            DB::table('alcohol_questions')->insert([
                'question' => $pregunta,
            ]);
        }
    }
}
