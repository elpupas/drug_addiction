<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlcoholQuestion extends Model
{
    use HasFactory;

    protected $fillable =[
        'question'
    ];

    public function answer(){
        return $this->hasMany(AlcoholAnswer::class);
    }
}
