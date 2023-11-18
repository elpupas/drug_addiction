<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questionnare extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function questions ()
    {
        return $this->hasMany(Question::class);
    }
}
