<?php

namespace App\Contracts;

use Illuminate\Http\Request;


interface AsnwerAlcoholInterface
{
    public function calculateScore(Request $request);
    public function evalueRisk($score);
    public function obtenerFeedback($nivelRiesgo);
}
