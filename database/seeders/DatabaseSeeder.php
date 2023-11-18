<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Questionnare;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
     public function run(): void
    {
        Questionnare::factory()->create([
            'title' => 'AUDIT'
        ]);
        $this->call(AlcoholQuestionSeeder::class);
        $this->call(AlcoholAnswerSeeder::class);
    }  
}
