<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $conditions= [
        ['type' => 'Bad'],
        ['type' => 'Okay'],
        ['type' => 'Good'],
        ['type' => 'Excellent']
    ];

    Condition::insert($conditions);
      
   }
}
