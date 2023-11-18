<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\AlcoholAnswer;
use App\Models\AlcoholQuestion;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QuestionController extends Controller
{
    public function index()
    {
        $preguntas = [
            AlcoholQuestion::all('id', 'question')
        ];

        return response()->json($preguntas);
    }


    public function calculateScore(Request $request)
    {
        $userAnswers = $request->input('answers');


        $totalScore = 0;

        foreach ($userAnswers as $userAnswer) {
            $answer = AlcoholAnswer::find($userAnswer['answer_id']);

            if ($answer) {
                $totalScore += $answer->score;
            }
          
        }
        $risk = $this->evalueRisk($totalScore);

       $feedback= $this->obtenerFeedback($risk);
      


        return response()->json([
            'total_score' => $totalScore,
            'risk' => $risk,
            'feedback' => $feedback
        ]);
    }

    public function evalueRisk($score)
    {
        

        if ($score >= 15) {
            return "alto riesgo";
        } elseif ($score >= 8 && $score <= 14) {
            return "Riesgo peligroso o perjudicial";
        } else {
            return "Bajo Riesgo";
        }
    }
    function obtenerFeedback($nivelRiesgo) {
        switch ($nivelRiesgo) {
            case 'Bajo Riesgo':
                return [
                    "Feedback Reafirmante: ¡Excelente! Basado en tus respuestas, parece que tienes un bajo riesgo en relación con el consumo de alcohol. Es importante seguir manteniendo hábitos saludables y beber de manera responsable.",
                    "Consejo Preventivo: Tu puntaje indica un bajo riesgo en tu relación con el alcohol. Asegúrate de mantener este comportamiento equilibrado y recuerda que beber con moderación es clave para mantener un estilo de vida saludable.",
                    "Apoyo Continuo: Es alentador ver que tu puntaje refleja un bajo riesgo. Si alguna vez te sientes incómodo con tu consumo de alcohol o si notas algún cambio, no dudes en buscar apoyo o asesoramiento para mantener este nivel de bajo riesgo."
                ];
                break;
            
            case 'Riesgo peligroso o perjudicial':
                return [
                    "Advertencia con Apoyo: Tu puntaje sugiere un riesgo peligroso o perjudicial en tu relación con el alcohol. Es importante ser consciente de cómo el consumo puede afectar tu salud y bienestar. Considera buscar asesoramiento profesional para comprender y controlar mejor tu consumo  "  ,
                    
                    "Recomendación de Intervención: El puntaje indica un nivel preocupante de riesgo. Te recomendamos encarecidamente buscar ayuda o consejo para manejar y reducir tu consumo. Es vital abordar esta situación para evitar posibles problemas a largo plazo.",
                    "Apoyo para Cambios Positivos: El riesgo identificado es una señal para considerar cambios en tu relación con el alcohol. Busca apoyo de profesionales o grupos de apoyo para trabajar en estrategias que te ayuden a reducir el riesgo y mejorar tu bienestar general."
                ];
                break;
            
            case 'alto riesgo':
                return [
                    "Llamada Urgente a la Acción: Tu puntaje indica un alto riesgo de dependencia. Es crucial buscar ayuda de inmediato para abordar este nivel de riesgo. Considera contactar a profesionales especializados para recibir apoyo y tratamiento.",
                    "Priorización de Asistencia Profesional: El puntaje identifica un alto riesgo de dependencia. Se recomienda encarecidamente buscar ayuda profesional. No ignores esta situación, ya que la asistencia adecuada puede marcar la diferencia en tu bienestar a largo plazo.",
                    "Apoyo y Comprensión: Reconocemos que tu puntaje refleja un alto riesgo de dependencia. Este es un momento crucial para buscar apoyo y asesoramiento profesional. Recuerda que no estás solo/a en este proceso y hay recursos disponibles para ayudarte."
                ];
                break;
    
            default:
                return ["Nivel de riesgo no reconocido. Por favor, verifica el nivel de riesgo identificado."];
        }
    }
    
}
