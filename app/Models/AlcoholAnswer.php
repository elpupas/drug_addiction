<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlcoholAnswer extends Model
{
    use HasFactory;

    protected $fillable =[
        'answer',
        'score'
    ];

    public function question()
    {
        return $this->belongsTo(AlcoholQuestion::class);
    }

}
