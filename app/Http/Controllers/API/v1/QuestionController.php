<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\AlcoholAnswer;
use App\Models\AlcoholQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QuestionController extends Controller
{

    public function questions()
    {

        $preguntas = [
            AlcoholQuestion::all('id', 'question')

        ];

        return response()->json($preguntas);
    }

 /*    public function calcularPuntajeTotal(Request $request)
    {
        $respuestas = $request->input('users_answers'); // Obtener las respuestas enviadas
        $totalScore = 0;

        foreach ($respuestas as $respuestaId) {
            $respuesta = AlcoholAnswer::with('answer')->find($respuestaId);

            if ($respuesta && $respuesta->question) {
                $totalScore += $respuesta->question->score;
            }

            return response()->json(['total_score' => $totalScore]);
        }
    } */
    public function calculateScore(Request $request)
    {
        $userAnswers = $request->input('user_answers');
        if(!$userAnswers){
            return response()->json(['messag' => $userAnswers]);
        }

        $totalScore = 0;

        foreach ($userAnswers as $userAnswer) {
            $answer = AlcoholAnswer::find($userAnswer['answer_id']);

            if ($answer) {
                $totalScore += $answer->score;
            }
        }

        // Proporcionar feedback basado en el puntaje total
        $feedback = '';

        // Lógica de feedback basado en el puntaje total
        // ... (puedes definir tus propios rangos y mensajes de feedback aquí)

        // Devolver el puntaje total y el feedback al frontend
        return response()->json([
            'total_score' => $totalScore,
            'feedback' => $feedback
        ]);
    }
}
