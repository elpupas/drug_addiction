<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\AlcoholAnswer;
use App\Models\AlcoholQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QuestionController extends Controller
{

    public function obtenerPreguntas()
    {
     
        $preguntas = [ AlcoholQuestion::all()
          
        ];

        return response()->json($preguntas);
    }

    public function calcularPuntajeTotal(Request $request)
    {
        $respuestas = $request->input('respuestas'); // Obtener las respuestas enviadas
        $totalScore = 0;

        foreach ($respuestas as $respuestaId) {
            $respuesta = AlcoholAnswer::with('answer')->find($respuestaId);

            if ($respuesta && $respuesta->question) {
                $totalScore += $respuesta->question->score; 
        }

        return response()->json(['total_score' => $totalScore]);
    }
}

}
